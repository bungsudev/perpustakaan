<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Buku_model');
	}

    public function index()
	{
		if($this->session->userdata('id_user')){
			$data['title'] = 'Buku';
			$data['header'] = 'temp/header';
			$data['content'] = 'buku/page-buku';
			$data['lokasi'] = $this->Buku_model->listRak();
			// print_r($data['lokasi']); die();
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function print_barcode($id_buku){
		require_once './vendor/autoload.php';
		// $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$mpdf= new \Mpdf\Mpdf(['mode' => 'utf-8','format' => [100, 100],'margin_left' => 10,'margin_right' => 10,'margin_top' => 8,'margin_bottom' => 15,'margin_header' => 0,'margin_footer' => 0]); 
		$data['title'] = 'Barcode Buku - '. $id_buku;
		$data['id_buku'] = $id_buku;
		$html = $this->load->view('barcode_detail',$data,true);
		$mpdf->SetTitle('Perhitungan Penghasilan dan Pengeluaran SDM - '.$id_outlet);
		$mpdf->WriteHTML($html);
		$mpdf->Output('Perhitungan Penghasilan dan Pengeluaran SDM ('.$periode.') - '.$id_outlet.'.pdf', 'I');
    }

	function simpan_buku($act, $id = ''){
		$error = '';
        $config['upload_path']="./assets/img/buku";
        $config['allowed_types']='jpg|png|jpeg|JPEG';
		$config['max_size']=2000;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($act == 'tambah' && !empty($_FILES['images']['name'])) {
			if ( ! $this->upload->do_upload('images')){
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			}else{
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Buku_model->simpan($data['file_name']), 
					'msg' =>  'Data di tambahkan'
				]);
			}
		} else if ($act == 'tambah' && empty($_FILES['images']['name'])) {
			echo json_encode([
				'res' => $this->Buku_model->simpan('default.jpg'), 
				'msg' =>  'Data di tambahkan tanpa gambar'
			]);
		}else if ($act == 'edit' && !empty($_FILES['images']['name'])){
			if ( ! $this->upload->do_upload('images')){
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			}else{
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Buku_model->edit($data['file_name'], $id), 
					'msg' =>  'Data telah di edit dan gambar di rubah'
				]);
			}
		}else if ($act == 'edit' && empty($_FILES['images']['name'])){
			echo json_encode([
				'res' => $this->Buku_model->edit(NULL, $id), 
				'msg' =>  'Data telah di edit'
			]);
		}else{
			echo json_encode([
				'res' => false, 
				'msg' =>  'Error'
			]);
		}
	}


	function get(){
		$list = $this->Buku_model->get_datatables();
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
						id_buku='".$field->id_buku."'  
						isbn_buku='".$field->isbn_buku."' 
						judul_buku='".$field->judul_buku."' 
						penulis_buku='".$field->penulis_buku."' 
						penerbit_buku='".$field->penerbit_buku."'
						tahun_penerbit='".$field->tahun_penerbit."'
						keterangan='".$field->keterangan."'
						stok='".$field->stok."'
						id_rak='".$field->id_rak."'
						images='".$field->images."'
						><i class='uil-edit-alt mr-1'></i> Edit</a>
						<a class='dropdown-item btnHapus' data-id='".$field->id_buku."' href='javascript:void(0)'><i class='uil-trash-alt mr-1'></i> Hapus</a>
						<a class='dropdown-item' href='".base_url()."barcode/barcode.php/?text=".$field->id_buku."&print=true' target='_blank'><i class='uil-trash-alt mr-1'></i> Barcode</a>
					</div>
				</div>
			";
			$row[] = "<img src='".base_url()."assets/img/buku/".$field->images."' alt='".$field->judul_buku."' width='130'>";
            $row[] = "<b>Kode : ".$field->id_buku."</b> <br />
				".$field->judul_buku."<br /><br />
				ISBN : ".$field->isbn_buku."<br />"." 
				Penulis : ".$field->penulis_buku."<br />"." 
				Penerbit : ".$field->penerbit_buku."<br />"." 
				Tahun Penerbit : ".date("d/m/Y", strtotime($field->tahun_penerbit));
            $row[] = $field->lokasi_rak.' - Rak '.$field->nama_rak;
            $row[] = $field->stok;
            $row[] = $field->dipinjam;
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

	public function insert(){
		$this->Buku_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('buku');
		// }
	}

	public function edit(){
		echo json_encode($this->Buku_model->edit_not_with_file());
		// $this->session->set_flashdata('message','Data berhasil diperbarui!');
		// redirect('buku');
	}

	public function delete($id_buku){
		$this->Buku_model->delete($id_buku);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('buku');
	}
}