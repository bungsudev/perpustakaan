<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Kategori_model');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Kategori Artikel';
			$data['header'] = 'temp/header';
			$data['content'] = 'kategori/page-kategori';
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Kategori_model->get_datatables();
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
						<a class='dropdown-item edit' href='#' data-bs-toggle='modal' data-bs-target='#modalEdit' id_kategori='".$field->id_kategori."'  nama_kategori='".$field->nama_kategori."'><i class='uil-edit-alt mr-1'></i> Edit</a>
					</div>
				</div>
			";
            $row[] = $field->nama_kategori;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kategori_model->count_all(),
            "recordsFiltered" => $this->Kategori_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function insert(){
		$this->Kategori_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('kategori');
		// }
	}

	public function edited(){
		$this->Kategori_model->edit_not_with_file();
		$this->session->set_flashdata('message','Data berhasil diperbarui!');
		redirect('kategori');
	}

	public function delete($id_kategori){
		$this->Kategori_model->delete($id_kategori);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('kategori');
	}
}