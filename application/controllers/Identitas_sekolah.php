<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_sekolah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth');
		}
		$this->load->model('Identitas_m');
	}

	//identitas sekolah
	public function index()
	{
		$data['title'] = 'Pengaturan';
		$data['header'] = 'temp/header';
		$data['content'] = 'info-sekolah/page-identitas';
		$this->load->view('layout', $data);
	}

	public function dataIdentitassekolah()
	{
		echo json_encode($this->Identitas_m->dataIdentitassekolah());
	}

	function simpan($act, $id = '')
	{
		$error = '';
		$config['upload_path'] = "./assets/img/";
		$config['allowed_types'] = 'jpg|png|jpeg|JPEG';
		$config['max_size'] = 500;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($act == 'Tambah') {
			if (!$this->upload->do_upload('lambang_sekolah')) {
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			} else {
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Identitas_m->simpan($data['file_name']),
					'msg' =>  'Data di tambahkan'
				]);
			}
		} else if ($act == 'Edit' && !empty($_FILES['lambang_sekolah']['name'])) {
			if (!$this->upload->do_upload('lambang_sekolah')) {
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			} else {
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Identitas_m->edit($data['file_name'], $id),
					'msg' =>  'Data telah di edit'
				]);
			}
		} else if ($act == 'Edit' && empty($_FILES['lambang_sekolah']['name'])) {
			echo json_encode([
				'res' => $this->Identitas_m->edit(NULL, $id),
				'msg' =>  'Data telah di edit'
			]);
		} else {
			echo json_encode([
				'res' => false,
				'msg' =>  'Error'
			]);
		}
	}
	//end identitas sekolah
}
