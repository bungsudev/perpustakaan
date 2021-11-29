<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Peminjaman_model');
	}

    public function index()
	{
		if($this->session->userdata('id_user')){
			$data['title'] = 'Peminjaman Buku';
			$data['header'] = 'temp/header';
			$data['content'] = 'peminjaman/page-peminjaman';
			$data['lokasi'] = $this->Peminjaman_model->listRak();
			// print_r($data['lokasi']); die();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function cariSiswa(){
		echo json_encode($this->Peminjaman_model->cariSiswa());
	}
	public function cariBuku(){
		echo json_encode($this->Peminjaman_model->cariBuku());
	}
	public function listPinjamanBuku(){
		echo json_encode($this->Peminjaman_model->listPinjamanBuku());
	}
	public function tambahPinjaman(){
		echo json_encode($this->Peminjaman_model->tambah());
	}
	public function hapusBuku(){
		echo json_encode($this->Peminjaman_model->hapusBuku());
	}

	function get(){
		$list = $this->Peminjaman_model->get_datatables();
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
						id_peminjaman='".$field->id_peminjaman."'  
						><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item btnHapus' data-id='".$field->id_peminjaman."' href='javascript:void(0)'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
            $row[] = "<b>ISBN : ".$field->isbn_peminjaman."</b> <br /><b>".$field->judul_peminjaman."</b> <br /> Penulis : ".$field->penulis_peminjaman."<br />"." <br /> Penerbit : ".$field->penerbit_peminjaman."<br />"." Tahun Penerbit : ".date("d/m/Y", strtotime($field->tahun_penerbit));
            $row[] = $field->lokasi_rak;
            $row[] = $field->stok;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Peminjaman_model->count_all(),
            "recordsFiltered" => $this->Peminjaman_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function insert(){
		$this->Peminjaman_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('peminjaman');
		// }
	}

	public function edit(){
		echo json_encode($this->Peminjaman_model->edit_not_with_file());
		// $this->session->set_flashdata('message','Data berhasil diperbarui!');
		// redirect('peminjaman');
	}

	public function delete($id_peminjaman){
		$this->Peminjaman_model->delete($id_peminjaman);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('peminjaman');
	}
}