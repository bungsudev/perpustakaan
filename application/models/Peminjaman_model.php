<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    //server side
    var $table = 'perpus_m_peminjaman'; //nama tabel dari database
    // var $column_order = array(null, 'perpus_m_peminjaman.kode_peminjaman', 'perpus_m_peminjaman.judul_peminjaman', 'perpus_m_rak.lokasi_rak', 'perpus_m_peminjaman.penulis_peminjaman', 'perpus_m_peminjaman.penerbit_peminjaman', 'perpus_m_peminjaman.tahun_penerbit', 'perpus_m_peminjaman.stok'); //field yang ada di table user
    var $column_order = array(null, 'perpus_m_peminjaman.kode_peminjaman', 'perpus_m_peminjaman.judul_peminjaman', 'perpus_m_rak.lokasi_rak', 'perpus_m_peminjaman.stok'); //field yang ada di table user
    var $column_search = array('perpus_m_peminjaman.kode_peminjaman', 'perpus_m_peminjaman.judul_peminjaman', 'perpus_m_rak.lokasi_rak', 'perpus_m_peminjaman.penulis_peminjaman', 'perpus_m_peminjaman.penerbit_peminjaman', 'perpus_m_peminjaman.tahun_penerbit', 'perpus_m_peminjaman.stok'); //field yang diizin untuk pencarian 
    var $order = array('perpus_m_peminjaman.id_peminjaman' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('perpus_m_peminjaman.*, perpus_m_rak.id_rak, perpus_m_rak.lokasi_rak, perpus_m_rak.nama_rak');
        $this->db->from('perpus_m_peminjaman');
        $this->db->join('perpus_m_rak','perpus_m_peminjaman.id_rak = perpus_m_rak.id_rak','left');
        $this->db->where('perpus_m_peminjaman.id_sekolah', $id_sekolah);
        $this->db->where('perpus_m_peminjaman.deleted', NULL);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->get_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->get_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // end server side

    public function tambah(){
        $id_sekolah =  $this->session->userdata('id_sekolah');
        $qry = $this->db->query("SELECT * FROM perpus_setting where id_sekolah = '$id_sekolah'")->row();
        $date = strtotime("+".$qry->max_hari." day");
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'tanggal_pinjam' => date("Y-m-d"),
            'maks_tanggal_pinjam' => date('Y-m-d', $date),
            'id_buku' => $this->input->post('id_buku'),
            'id_siswa' => $this->input->post('id_siswa'),
            'created' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('perpus_m_peminjaman',$data);
        $this->kurangStok($this->input->post('id_buku'));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function hapusBuku(){
        $data = array(
            'deleted' => date("Y-m-d H:i:s").' - '.$this->session->userdata('id_user')
        );
        $this->db->where('id_peminjaman', $this->input->post('id_peminjaman'));
        $this->db->update('perpus_m_peminjaman',$data);
        $this->tambahStok($this->input->post('id_buku'));
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