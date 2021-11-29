<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

    public function pengembalianBuku(){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'id_peminjaman' => $this->input->post('id_peminjaman'),
            'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
            'denda' => $this->input->post('totalDenda'),
            'id_buku' => $this->input->post('kode_buku'),
            'id_siswa' => $this->input->post('id_siswa_pinjaman'),
            'created' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('perpus_m_pengembalian',$data);
        $this->tambahStok($this->input->post('kode_buku'));
        $this->updatePinjamanBuku();
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updatePinjamanBuku(){
        $data = array(
            'tanggal_kembali' => $this->input->post('tanggal_pengembalian'),
        );
        $this->db->where('id_peminjaman', $this->input->post('id_peminjaman'));
        $this->db->update('perpus_m_peminjaman',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function tambahStok($id_buku){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $query = $this->db->query("UPDATE perpus_m_buku set stok = stok + 1, dipinjam = dipinjam - 1 WHERE id_buku = '$id_buku'");
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function kurangStok($id_buku){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $query = $this->db->query("UPDATE perpus_m_buku set stok = stok - 1, dipinjam = dipinjam + 1 WHERE id_buku = '$id_buku'");
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function cariSiswa(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $search = $this->input->post('search');
        $query = $this->db->query("SELECT * FROM siswa where id_sekolah = '$id_sekolah' AND nis LIKE '%$search%' OR id_sekolah = '$id_sekolah' AND nama_lengkap LIKE '%$search%'");
        return $query->result_array();
    }

    public function settingPerpus(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT * FROM perpus_setting where id_sekolah = '$id_sekolah' AND deleted IS NULL");
        return $query->result_array();
    }

    public function cariBuku(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $search = $this->input->post('search');
        $query = $this->db->query("SELECT * FROM perpus_m_buku where id_sekolah = '$id_sekolah' AND id_buku = '$search' AND deleted IS NULL");
        return $query->result_array();
    }

    public function listPinjamanBuku(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $id_siswa = $this->input->post('id_siswa');
        $query = $this->db->query("SELECT a.*, b.* FROM perpus_m_peminjaman a LEFT JOIN perpus_m_buku b ON a.id_buku = b.id_buku where a.id_sekolah = '$id_sekolah' AND a.id_siswa = '$id_siswa' AND a.tanggal_kembali IS NULL AND a.deleted IS NULL");
        return $query->result_array();
    }

    public function detailPinjamanBuku(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $id_peminjaman = $this->input->post('id_peminjaman');
        $query = $this->db->query("SELECT a.*, b.*, c.*, d.* FROM perpus_m_peminjaman a 
        LEFT JOIN perpus_m_buku b ON a.id_buku = b.id_buku
        LEFT JOIN siswa c ON a.id_siswa = c.id_siswa
        LEFT JOIN perpus_setting d ON a.id_sekolah = d.id_sekolah
        where a.id_sekolah = '$id_sekolah' AND a.id_peminjaman = '$id_peminjaman' AND a.tanggal_kembali IS NULL AND a.deleted IS NULL");
        return $query->row();
    }

    public function detail($id_peminjaman){
        $this->db->where('id_peminjaman',$id_peminjaman);
        return $this->db->get('perpus_m_peminjaman')->row_array();
    }

    public function listRak(){
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        $this->db->where('deleted', NULL);
        return $this->db->get('perpus_m_rak')->result_array(); 
    }
    
    public function delete($id_peminjaman){
        $this->db->where('id_peminjaman',$id_peminjaman);
        $this->db->delete('perpus_m_peminjaman');
    }
}