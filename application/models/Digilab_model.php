<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Digilab_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->id_sekolah = $this->session->userdata('id_sekolah');
    }

    public function listBuku(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT a.*, b.* FROM perpus_m_buku a 
        LEFT JOIN perpus_m_rak b ON a.id_rak = b.id_rak 
        where a.id_sekolah = '$id_sekolah' AND a.deleted IS NULL");
        return $query->result_array();
    }
    public function listBukuSearch($search){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT a.*, b.* FROM perpus_m_buku a 
        LEFT JOIN perpus_m_rak b ON a.id_rak = b.id_rak 
        where a.id_sekolah = '$id_sekolah' AND a.deleted IS NULL AND judul_buku LIKE '%$search%'");
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
