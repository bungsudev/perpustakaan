<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->id_sekolah = $this->session->userdata('id_sekolah');
    }

    public function listPinjamanBuku(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $id_siswa = $this->input->post('id_siswa');
        $query = $this->db->query("SELECT a.*, b.*, c.nama_lengkap, d.nama_rak, d.lokasi_rak FROM perpus_m_peminjaman a 
        LEFT JOIN perpus_m_buku b ON a.id_buku = b.id_buku 
        LEFT JOIN siswa c ON a.id_siswa = c.id_siswa 
        LEFT JOIN perpus_m_rak d ON b.id_rak = d.id_rak 
        where a.id_sekolah = '$id_sekolah' AND a.id_siswa = '$id_siswa' AND a.tanggal_kembali IS NULL AND a.deleted IS NULL");
        return $query->result_array();
    }

    public function artikel()
    {
        $this->db->where('id_sekolah', $this->id_sekolah);
        return $this->db->get('artikel')->num_rows();
    }

    public function pengumuman()
    {
        $this->db->where('id_sekolah', $this->id_sekolah);
        return $this->db->get('pengumuman')->num_rows();
    }


    public function log_login()
    {
        $this->db->where('id_sekolah', $this->id_sekolah);
        $this->db->order_by('id_log_login', 'desc');
        $this->db->limit(20);
        return $this->db->get('log_login')->result_array();
    }

    public function komentar()
    {
        $this->db->where('id_sekolah', $this->id_sekolah);
        return $this->db->get('komentar')->num_rows();
    }

    public function grafik_visitor()
    {
        $qry = $this->db->query("SELECT created, visitor FROM `visitor`  WHERE YEAR(created) = YEAR(CURDATE())");
        return  $qry->result_array();
    }
}
