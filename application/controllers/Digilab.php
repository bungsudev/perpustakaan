<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Digilab extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Digilab_model');
	}

	public function index()
	{
		if($this->session->userdata('id_user')){
			$data['title'] = 'Beranda';
			$data['header'] = 'temp/header';
			$data['content'] = 'digilab/page-digilab';
			$data['buku'] = $this->Digilab_model->listBuku();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth');
		}
	}
	public function search($search)
	{
		if($this->session->userdata('id_user')){
			$data['title'] = 'Beranda';
			$data['header'] = 'temp/header';
			$data['search'] = $search;
			$data['content'] = 'digilab/page-digilab-search';
			$data['buku'] = $this->Digilab_model->listBukuSearch($search);
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth');
		}
	}

	public function listPinjamanBuku(){
		echo json_encode($this->Dashboard_model->listPinjamanBuku());
	}

	function get(){
		$list = $this->Dashboard_model->listPinjamanBuku();
        foreach ($list as $field) {

            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = "<b>Kode : ".$field->id_buku."</b> <br />
				".$field->judul_buku."<br /><br />
				ISBN : ".$field->isbn_buku."<br />"." 
				Penulis : ".$field->penulis_buku."<br />"." 
				Penerbit : ".$field->penerbit_buku."<br />"." 
				Tahun Penerbit : ".date("d/m/Y", strtotime($field->tahun_penerbit));
            $row[] = $field->lokasi_rak.' - Rak '.$field->nama_rak;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Buku_model->count_all(),
            "recordsFiltered" => $this->Buku_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

}
