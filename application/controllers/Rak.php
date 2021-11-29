<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rak_model');
	}

    public function index()
	{
		if($this->session->userdata('id_user')){
			$data['title'] = 'Lokasi Rak';
			$data['header'] = 'temp/header';
			$data['content'] = 'rak/page-rak';
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Rak_model->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {

            $no++;
            $row = array();
            $row[] = $no.".";
			$row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						<a class='dropdown-item edit' href='#' data-bs-toggle='modal' data-bs-target='#modalEdit' id_rak='".$field->id_rak."'  nama_rak='".$field->nama_rak."' lokasi_rak='".$field->lokasi_rak."'><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item btnHapus' data-id='".$field->id_rak."' href='javascript:void(0)'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
            $row[] = $field->nama_rak;
            $row[] = $field->lokasi_rak;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rak_model->count_all(),
            "recordsFiltered" => $this->Rak_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function insert(){
		$this->Rak_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('rak');
		// }
	}

	public function edited(){
		$this->Rak_model->edit_not_with_file();
		$this->session->set_flashdata('message','Data berhasil diperbarui!');
		redirect('rak');
	}

	public function delete($id_rak){
		$this->Rak_model->delete($id_rak);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('rak');
	}
}