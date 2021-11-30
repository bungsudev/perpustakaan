<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Artikel_model');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Daftar Artikel';
			$data['header'] = 'temp/header';
			$data['content'] = 'artikel/page-artikel';
			// $data['list'] = $this->Dapok_model->list();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Artikel_model->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {
            $author = $this->db->get_where('user', array('id_user'=> $field->created_by))->row();
			$tags = explode(',',$field->id_tag);
            $nama_tags = '';
            foreach($tags as $row){
                $list_tags = $this->db->get_where('tag', array('id_tag'=> $row))->row_array();
                $nama_tags = $nama_tags .' - '. $list_tags['nama_tag'];
            }
            $no++;
            $row = array();
            
            $row[] = $no.".";
            $row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='artikel/edit/".encrypt_url($field->id_artikel)."'><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item hapus' href='#' data-id='".$field->id_artikel."'><i class='uil-trash-alt mr-1'></i> Hapus</a>
					</div>
				</div>
			";
            $row[] = "<img src='".base_url('assets/img/artikel')."/".$field->images."' class='img-fluid'/ width='80' style='border-radius:5px;'>";
            $row[] = $field->judul;
            $row[] = $field->nama_kategori;
            $row[] = ltrim($nama_tags, ' - ');
            $row[] = date('d M Y', strtotime($field->created_date));
            $row[] = $author->nama;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Artikel_model->count_all(),
            "recordsFiltered" => $this->Artikel_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    public function insert(){
		$config['upload_path'] = './assets/img/artikel/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('images');
		$file = $this->upload->data('file_name');
		$this->Artikel_model->tambah($file);
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('artikel');
	}

	public function add()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Tambah Artikel';
			$data['header'] = 'temp/header';
			$data['content'] = 'artikel/add-artikel';
			$data['kategori'] = $this->Artikel_model->getKategori();
            $data['tags'] = $this->Artikel_model->getTag();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edit($id)
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Edit Artikel';
			$data['header'] = 'temp/header';
			$data['content'] = 'artikel/edit-artikel';
			$data['detail'] = $this->Artikel_model->detail(decrypt_url($id));
            $data['kategori'] = $this->Artikel_model->getKategori();
            $data['tags'] = $this->Artikel_model->getTag();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function edited(){
		$id = $this->input->post('id_artikel');
		$path = $this->input->post("id_ft");
		if ($_FILES['images']['name'] == '') {
			$this->Artikel_model->edit_not_with_file();
			$this->session->set_flashdata('message','Data berhasil diperbarui!');
			redirect('artikel');
		}else{
			unlink("./assets/img/artikel/".$path);
			$config['upload_path'] = './assets/img/artikel/';
			$config['allowed_types'] = 'jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('images');
			$file = $this->upload->data('file_name');
			$this->Artikel_model->edit_with_file($file);
			$this->session->set_flashdata('message','Data berhasil diperbarui!');
			redirect('artikel');

		}
	}

	public function delete($id_artikel)
	{
		$this->Artikel_model->delete($id_artikel);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('artikel');
	}
}