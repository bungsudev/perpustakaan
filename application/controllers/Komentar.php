<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Komentar_m');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Daftar Komentar';
			$data['header'] = 'temp/header';
			$data['content'] = 'komentar/page-komentar';
			// $data['list'] = $this->Dapok_model->list();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Komentar_m->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {

            if($field->status == 'publish'){
                $status = '<span class="badge rounded-pill bg-success">Publish</span>';
            }else if($field->status == 'pending'){
                $status = '<span class="badge rounded-pill bg-warning">Pending</span>';
            }else{
                $status = '<span class="badge rounded-pill bg-danger">Hide</span>';
            }

            $no++;
            $row = array();
            $row[] = $no.".";
			$row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						<a class='dropdown-item status' href='#' data-id='".$field->id_komentar."' data-status='publish'><i class='uil-eye mr-1'></i> Publish</a>
						<a class='dropdown-item status' href='#' data-id='".$field->id_komentar."' data-status='hide'><i class='uil-eye-slash mr-1'></i> Hide</a>
					</div>
				</div>
			";
            $row[] = $field->judul;
            $row[] = "$field->nama <br> $field->email <br> $field->created";
            $row[] = $field->komentar;
            $row[] = $status;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Komentar_m->count_all(),
            "recordsFiltered" => $this->Komentar_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    public function updateStatus(){
        $this->Komentar_m->updateStatus();
		$this->session->set_flashdata('message','Status Komentar berhasil diperbarui!');
    }
}