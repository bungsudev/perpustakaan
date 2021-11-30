<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengumuman_m');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			$data['title'] = 'Daftar Pengumuman';
			$data['header'] = 'temp/header';
			$data['content'] = 'pengumuman/page-pengumuman';
			// $data['list'] = $this->Dapok_model->list();
			$this->load->view('layout', $data);
		} else {
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get()
	{
		$list = $this->Pengumuman_m->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$author = $this->db->get_where('user', array('id_user' => $field->created_by))->row();
			if ($field->lampiran == null) {
				$file = "<a class='dropdown-item'><s><i class='uil-clipboard-notes mr-1'></i> Tidak ada file</s></a>";
			} else {
				$file = "<a href='upload/pengumuman/" . $field->lampiran . "' class='dropdown-item' target='_blank'><i class='uil-clipboard-notes mr-1'></i> Lihat File</a>";
			}
			$no++;
			$row = array();

			$row[] = $no . ".";
			$row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						$file
						<a class='dropdown-item' href='pengumuman/edit/" . encrypt_url($field->id_pengumuman) . "'><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item hapus' href='#' data-id='" . $field->id_pengumuman . "'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
			$row[] = $field->judul;
			$row[] = date('d M Y', strtotime($field->created_date));
			$row[] = $author->nama;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Pengumuman_m->count_all(),
			"recordsFiltered" => $this->Pengumuman_m->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function insert()
	{
		$config['upload_path'] = './upload/pengumuman/';
		$config['allowed_types'] = 'pdf|doc';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('lampiran');
		$file = $this->upload->data('file_name');
		$this->Pengumuman_m->tambah($file);
		$this->session->set_flashdata('message', 'Data berhasil di tambahkan!');
		redirect('pengumuman');
	}

	public function add()
	{
		if ($this->session->userdata('email')) {
			$data['title'] = 'Tambah Pengumuman';
			$data['header'] = 'temp/header';
			$data['content'] = 'pengumuman/add-pengumuman';
			$data['kategori'] = $this->Pengumuman_m->getKategori();
			$this->load->view('layout', $data);
		} else {
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('email')) {
			$data['title'] = 'Edit Pengumuman';
			$data['header'] = 'temp/header';
			$data['content'] = 'pengumuman/edit-pengumuman';
			$data['detail'] = $this->Pengumuman_m->detail(decrypt_url($id));
			$data['kategori'] = $this->Pengumuman_m->getKategori();
			$this->load->view('layout', $data);
		} else {
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edited()
	{
		$id = $this->input->post('id_pengumuman');
		$path = $this->input->post("id_ft");
		if ($_FILES['lampiran']['name'] == '') {
			$this->Pengumuman_m->edit_not_with_file();
			$this->session->set_flashdata('message', 'Data berhasil diperbarui!');
			redirect('pengumuman');
		} else {
			unlink("./upload/pengumuman/" . $path);
			$config['upload_path'] = './upload/pengumuman/';
			$config['allowed_types'] = 'pdf|doc';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('lampiran');
			$file = $this->upload->data('file_name');
			$this->Pengumuman_m->edit_with_file($file);
			$this->session->set_flashdata('message', 'Data berhasil diperbarui!');
			redirect('pengumuman');
		}
	}

	public function delete($id_pengumuman)
	{
		$this->Pengumuman_m->delete($id_pengumuman);
		$this->session->set_flashdata('message', 'Data berhasil di Hapus!');
		redirect('pengumuman');
	}
}
