<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		if ($this->session->userdata('id_user')) {
			redirect('dashboard');
		}else{
			$data['title'] = 'Log In | Perpuskaan';
			$this->load->view('auth/page-login', $data);
		}
	}

	function check_email_avalibility()
	{
		if (!filter_var($_POST["email"], FILTER_VALIDATE_DOMAIN)) {
			echo '<label class="text-danger"><span class="feather-x"></span> Invalid email</span></label>';
		} else {
			if ($this->Users_model->is_email_available($_POST["email"])) {
				echo '<label class="text-danger"><span class="feather-x"></span> email Already register</label>';
			} else {
				echo '<label class="text-success"><span class="feather-check"></span> email Available</label>';
			}
		}
	}

	public function proses_tambah()
	{
		$this->Users_model->insert_user();
		$this->session->set_flashdata('success', 'Berhasil Menambahkan Data.');
		redirect(base_url() . 'auth');
	}

	public function proses_hapus()
	{
		$this->Users_model->hapus_user($this->input->get('id'));
		$this->session->set_flashdata('success', 'Berhasil Menghapus Data.');
		redirect(base_url('auth'));
	}

	// public function proses_edit(){
	// 	$this->Users_model->edit_user();
	// 	$this->session->set_flashdata('success','Berhasil Mengedit Data.');
	// 	redirect(base_url('auth/profile'));
	// }

	public function changepass()
	{
		if ($this->session->userdata('email')) {
			$data['header'] = 'temp/header';
			$data['title'] = 'Ganti Password';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('old_password', 'Password Lama', 'required|trim');
			$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim');

			if ($this->form_validation->run() == false) {
				$data['content'] = "auth/change-pass";
				$this->load->view('layout', $data);
			} else {
				$old_password = md5($this->input->post('old_password'));
				$new_password = md5($this->input->post('new_password'));

				if ($old_password != $data['user']['password']) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password lama salah!</div>');
					redirect('auth/changepass');
				} else {
					if ($old_password == $new_password) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Lama dan Baru tidak boleh sama!</div>');
						redirect('auth/changepass');
					} else {
						$password_hash =  md5($this->input->post('new_password'));
						$this->db->set('password', $password_hash);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('user');

						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password berhasil diganti!</div>');
						redirect('auth/changepass');
					}
				}
			}
		} else {
			redirect('auth/login');
		}
	}

	public function profile()
	{
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['getuser'] = $this->Users_model->detail_user();
			$data['title'] = 'Profil User';
			$data['header'] = 'temp/header';
			$data['content'] = 'auth/profile-user';
			$this->load->view('layout', $data);
		} else {
			redirect('auth/login');
		}
	}

	public function oldlogin()
	{
		$this->load->library('user_agent');
		$browser = "" . $this->agent->browser() . " " . $this->agent->version() . "";
		$os = $this->agent->platform();
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$user = $this->db->query("SELECT * FROM user where email ='$email'")->row_array();
		$desa = $this->db->query("SELECT * FROM identitas_sekolah where id_sekolah ='" . $user['id_sekolah'] . "'")->row_array();
		//  echo var_dump($desa);
		// echo !isset($user);
		if ($user) {
			if ($password == $user['password']) {
				$session = [
					'id_user' => $user['id_user'],
					'id_sekolah' => $user['id_sekolah'],
					'email' => $user['email'],
					'nama' => $user['nama'],
					'level' => $user['level'],
					'image' => $user['image'],
					'status' => $desa['status']
				];
				$this->session->set_userdata($session);
				if ($desa['status'] == 'Aktif' && $user['status'] == 'Aktif' && $user['level'] == 'Administrator') {
					$this->Users_model->log_login($user['id_sekolah'], $user['id_user'], $user['nama'], $browser, $user['level'], $os);
					$this->session->set_flashdata('message', '' . $user['nama'] . '!');
					redirect('dashboard');
				} else if ($desa['status'] != 'Aktif') {
					$this->session->set_flashdata('message', 'Maaf! Akses desa anda telah "Diblokir" <br> Silahkan hubungi admin untuk perbaikan.');
					redirect('auth');
				} else if ($user['status'] != 'Aktif') {
					$this->session->set_flashdata('message', 'Maaf! Akun anda "Tidak Aktif" <br> Silahkan hubungi Admin/Kepala desa.');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 'Password yang anda masukan salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 'Email tidak ditemukan!');
			redirect('auth');
		}
	}

	public function login()
	{
		$this->load->library('user_agent');
		$browser = "" . $this->agent->browser() . " " . $this->agent->version() . "";
		$os = $this->agent->platform();
		$email = $this->input->post('email');
		$sebagai = $this->input->post('sebagai');
		$password = md5($this->input->post('password'));
		if ($sebagai == 'Admin') {
			$data_user = $this->db->query("SELECT * FROM user where email ='$email'")->row_array();
		}elseif ($sebagai == 'Siswa'){
			$data_user = $this->db->query("SELECT akun_siswa.*, siswa.*, akun_siswa.status as status_akun, siswa.status as status_siswa, akun_siswa.email as email_akun from akun_siswa INNER JOIN siswa ON akun_siswa.nisn = siswa.nisn where akun_siswa.status = 'Aktif' AND siswa.status = 'Aktif' AND akun_siswa.nisn ='$email'")->row_array();
		// }elseif ( $sebagai == 'Alumni'){
		// 	$data_user = $this->db->query("SELECT akun_siswa.*, siswa.*, akun_siswa.status as status_akun, siswa.status as status_siswa from akun_siswa INNER JOIN siswa ON akun_siswa.nisn = siswa.nisn where akun_siswa.status = 'Aktif' AND siswa.status = 'lulus' AND akun_siswa.email ='$email'")->row_array();
		}else{
			$this->session->set_flashdata('message', 'Pilih login sebagai apa terlebih dahulu!');
			redirect('auth');
		}
		// echo json_encode($data_user); die(); 
		if ($data_user) {
			if ($password == $data_user['password']) {
				if ($sebagai == "Admin") {
					$session = [
						'id_user' => $data_user['id_user'],
						'nisn' => $data_user['nisn'],
						'email' => $data_user['email'],
						'id_sekolah' => $data_user['id_sekolah'],
						'nama' => $data_user['nama'],
						'image' => $data_user['image'],
						'status' => $data_user['status'],
						'level' => $sebagai
					];
				}elseif($sebagai == "Siswa"){
					$session = [
						'id_user' => $data_user['id_user'],
						'id_siswa' => $data_user['id_siswa'],
						'email' => $data_user['email_akun'],
						'id_sekolah' => $data_user['id_sekolah'],
						'nama' => $data_user['nama'],
						'image' => $data_user['image'],
						'status' => $data_user['status'],
						'level' => $sebagai
					];
				}
				$this->session->set_userdata($session);
				// print_r($session); die();
				if ($data_user['status'] == 'Aktif') {
					// $this->Users_model->log_login($data_user['id_sekolah'], $data_user['id_user'], $penduduk['nama_lengkap'], $browser, $os);
					$this->session->set_flashdata('message', '' . $data_user['nama'] . '!');
					redirect('dashboard');
				} else if ($data_user['status'] != 'Aktif') {
					$this->session->set_flashdata('message', 'Maaf! Akses Anda anda telah "Diblokir" <br> Silahkan hubungi admin untuk perbaikan.');
					redirect('auth');
				} else if ($data_user['status'] != 'Aktif') {
					$this->session->set_flashdata('message', 'Maaf! Akun anda "Tidak Aktif" <br> Silahkan hubungi Admin.');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 'Password yang anda masukan salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 'Akun tidak ditemukan!');
			redirect('auth');
		}
	}

	public function edit_user()
	{
		if ($this->session->userdata('email')) {
			$id = $this->input->post('id_user');
			$path_foto = $this->input->post("id_ft");
			if ($_FILES['foto']['name'] == '') {
				$this->Users_model->edit_user();
				$this->session->set_flashdata('message', 'Profile berhasil diperbarui!');
				redirect('auth/profile/');
			} else {
				// echo "/assets/img/foto_anggota/".$path_foto; die();
				unlink("./assets/img/foto_anggota/" . $path_foto);
				$config['upload_path'] = './assets/img/foto_anggota';
				$config['allowed_types'] = 'jpg|gif|png';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo "upload gagal";
					echo $this->upload->display_errors();
				} else {
					$foto = $this->upload->data('file_name');

					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/img/foto_anggota/' . $foto;
					$config['maintain_ratio'] = FALSE;
					$config['width']    = '100%';
					$config['height']   = '100%';

					$this->load->library('image_lib');
					$this->image_lib->initialize($config);
					$this->image_lib->resize();


					$this->Users_model->edit_user_withfoto($foto);
					$this->session->set_flashdata('message', 'Profile berhasil diperbarui!');
					redirect('auth/profile/');
				}
			}
		} else {
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', 'Berhasil logout!');
		redirect('auth');
	}
}
