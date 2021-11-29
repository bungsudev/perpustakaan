<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Pengembalian_model');
	}

    public function index()
	{
		if($this->session->userdata('id_user')){
			$data['title'] = 'Pengembalian Buku';
			$data['header'] = 'temp/header';
			$data['content'] = 'pengembalian/page-pengembalian';
			$data['lokasi'] = $this->Pengembalian_model->listRak();
			// print_r($data['lokasi']); die();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function cariSiswa(){
		echo json_encode($this->Pengembalian_model->cariSiswa());
	}
	public function cariBuku(){
		echo json_encode($this->Pengembalian_model->cariBuku());
	}
	public function listPinjamanBuku(){
		echo json_encode($this->Pengembalian_model->listPinjamanBuku());
	}
	public function detailPinjamanBuku(){
		echo json_encode($this->Pengembalian_model->detailPinjamanBuku());
	}
	public function pengembalianBuku(){
		echo json_encode($this->Pengembalian_model->pengembalianBuku());
	}
	public function hapusBuku(){
		echo json_encode($this->Pengembalian_model->hapusBuku());
	}

	function get(){
		$list = $this->Pengembalian_model->get_datatables();
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
						<a class='dropdown-item edit' href='#' data-bs-toggle='modal' data-bs-target='#modalEdit' 
						id_pengembalian='".$field->id_pengembalian."'  
						><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item btnHapus' data-id='".$field->id_pengembalian."' href='javascript:void(0)'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
            $row[] = "<b>ISBN : ".$field->isbn_pengembalian."</b> <br /><b>".$field->judul_pengembalian."</b> <br /> Penulis : ".$field->penulis_pengembalian."<br />"." <br /> Penerbit : ".$field->penerbit_pengembalian."<br />"." Tahun Penerbit : ".date("d/m/Y", strtotime($field->tahun_penerbit));
            $row[] = $field->lokasi_rak;
            $row[] = $field->stok;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pengembalian_model->count_all(),
            "recordsFiltered" => $this->Pengembalian_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function insert(){
		$this->Pengembalian_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('pengembalian');
		// }
	}

	public function edit(){
		echo json_encode($this->Pengembalian_model->edit_not_with_file());
		// $this->session->set_flashdata('message','Data berhasil diperbarui!');
		// redirect('pengembalian');
	}

	public function delete($id_pengembalian){
		$this->Pengembalian_model->delete($id_pengembalian);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('pengembalian');
	}
}