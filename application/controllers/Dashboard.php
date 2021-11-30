<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		if($this->session->userdata('email')){
			$data['artikel'] = $this->Dashboard_model->artikel();
			$data['pengumuman'] = $this->Dashboard_model->pengumuman();
			$data['log_login'] = $this->Dashboard_model->log_login();
			$data['komentar'] = $this->Dashboard_model->komentar();

			$data['title'] = 'Beranda';
			$data['header'] = 'temp/header';
			$data['content'] = 'temp/dashboard';
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth');
		}
	}

	public function grafik_visitor()
	{
		echo json_encode($this->Dashboard_model->grafik_visitor());
	}
}
