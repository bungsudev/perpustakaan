<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Profil_m');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Daftar Profil';
			$data['header'] = 'temp/header';
			$data['content'] = 'profil/page-profil';
			// $data['list'] = $this->Dapok_model->list();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Profil_m->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            
            $row[] = $no.".";
            $row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='profil/edit/".encrypt_url($field->id_profil)."'><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item hapus' href='#' data-id='".$field->id_profil."'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
            $row[] = $field->page_name;
            $row[] = $field->slug;
            $row[] = date('d M Y', strtotime($field->created_date));
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Profil_m->count_all(),
            "recordsFiltered" => $this->Profil_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    public function insert(){
		$this->Profil_m->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('profil');
	}

	public function add()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Tambah Profil';
			$data['header'] = 'temp/header';
			$data['content'] = 'profil/add-profil';
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edit($id)
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Edit Profil';
			$data['header'] = 'temp/header';
			$data['content'] = 'profil/edit-profil';
			$data['detail'] = $this->Profil_m->detail(decrypt_url($id));
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edited(){
        $this->Profil_m->edit_not_with_file();
        $this->session->set_flashdata('message','Data berhasil diperbarui!');
        redirect('profil');
	}

	public function delete($id_profil)
	{
		$this->Profil_m->delete($id_profil);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('profil');
	}
}