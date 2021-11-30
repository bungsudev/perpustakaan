<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleri extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Galleri_m');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Daftar Galleri';
			$data['header'] = 'temp/header';
			$data['content'] = 'galleri/page-galleri';
			// $data['list'] = $this->Dapok_model->list();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Galleri_m->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {
            $author = $this->db->get_where('user', array('id_user'=> $field->created_by))->row();
            $no++;
            $row = array();
            
            $row[] = $no.".";
            $row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='galleri/edit/".encrypt_url($field->id_galleri)."'><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item hapus' href='#' data-id='".$field->id_galleri."'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
            $row[] = "<img src='".base_url('assets/img/galleri')."/".$field->images."' class='img-fluid'/ width='80' style='border-radius:5px; object-fit: cover;height: 50px;'>";
            $row[] = $field->caption;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Galleri_m->count_all(),
            "recordsFiltered" => $this->Galleri_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    public function insert(){
		$config['upload_path'] = './assets/img/galleri/';
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('images');
		$file = $this->upload->data('file_name');
		$this->Galleri_m->tambah($file);
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('galleri');
	}

	public function add()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Tambah Galleri';
			$data['header'] = 'temp/header';
			$data['content'] = 'galleri/add-galleri';
			$data['kategori'] = $this->Galleri_m->getKategori();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edit($id)
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Edit Galleri';
			$data['header'] = 'temp/header';
			$data['content'] = 'galleri/edit-galleri';
			$data['detail'] = $this->Galleri_m->detail(decrypt_url($id));
            $data['kategori'] = $this->Galleri_m->getKategori();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edited(){
		$id = $this->input->post('id_galleri');
		$path = $this->input->post("id_ft");
		if ($_FILES['images']['name'] == '') {
			$this->Galleri_m->edit_not_with_file();
			$this->session->set_flashdata('message','Data berhasil diperbarui!');
			redirect('galleri');
		}else{
			unlink("./assets/img/galleri/".$path);
			$config['upload_path'] = './assets/img/galleri/';
			$config['allowed_types'] = 'jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('images');
			$file = $this->upload->data('file_name');
			$this->Galleri_m->edit_with_file($file);
			$this->session->set_flashdata('message','Data berhasil diperbarui!');
			redirect('galleri');

		}
	}

	public function delete($id_galleri)
	{
		$this->Galleri_m->delete($id_galleri);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('galleri');
	}
}