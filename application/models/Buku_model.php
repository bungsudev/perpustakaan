<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku_model extends CI_Model {

    //server side
    var $table = 'perpus_m_buku'; //nama tabel dari database
    var $column_order = array(null, null, null,'perpus_m_buku.id_buku', 'perpus_m_buku.judul_buku', 'perpus_m_rak.lokasi_rak', 'perpus_m_buku.stok', 'perpus_m_buku.dipinjam'); //field yang ada di table user
    var $column_search = array('perpus_m_buku.id_buku', 'perpus_m_buku.isbn_buku', 'perpus_m_buku.judul_buku', 'perpus_m_rak.lokasi_rak', 'perpus_m_buku.penulis_buku', 'perpus_m_buku.penerbit_buku', 'perpus_m_buku.tahun_penerbit', 'perpus_m_buku.stok'); //field yang diizin untuk pencarian 
    var $order = array('perpus_m_buku.id_buku' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('perpus_m_buku.*, perpus_m_rak.id_rak, perpus_m_rak.lokasi_rak, perpus_m_rak.nama_rak');
        $this->db->from('perpus_m_buku');
        $this->db->join('perpus_m_rak','perpus_m_buku.id_rak = perpus_m_rak.id_rak','left');
        $this->db->where('perpus_m_buku.id_sekolah', $id_sekolah);
        $this->db->where('perpus_m_buku.deleted', NULL);
 
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

    public function simpan($file){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'isbn_buku' => $this->input->post('isbn_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'tahun_penerbit' => $this->input->post('tahun_penerbit'),
            'keterangan' => $this->input->post('keterangan'),
            'stok' => $this->input->post('stok'),
            'id_rak' => $this->input->post('id_rak'),
            'images' => $file,
            'created' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('perpus_m_buku',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function edit($nama_gambar, $id)
    {
        $data = [
            'isbn_buku' => $this->input->post('isbn_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'tahun_penerbit' => $this->input->post('tahun_penerbit'),
            'keterangan' => $this->input->post('keterangan'),
            'stok' => $this->input->post('stok'),
            'id_rak' => $this->input->post('id_rak'),
            'edited' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        ];

        //cek update tanpa gambar
        (!empty($nama_gambar))? $data = array_merge($data, ["images" => $nama_gambar]): '';

        $this->db->where('id_buku', $id);
        $this->db->update('perpus_m_buku', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function tambah(){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'isbn_buku' => $this->input->post('isbn_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'tahun_penerbit' => $this->input->post('tahun_penerbit'),
            'keterangan' => $this->input->post('keterangan'),
            'stok' => $this->input->post('stok'),
            'id_rak' => $this->input->post('id_rak'),
            'created' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('perpus_m_buku',$data);
        return;
    }

    public function edit_not_with_file(){
        $data = array(
            'isbn_buku' => $this->input->post('isbn_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis_buku' => $this->input->post('penulis_buku'),
            'penerbit_buku' => $this->input->post('penerbit_buku'),
            'tahun_penerbit' => $this->input->post('tahun_penerbit'),
            'keterangan' => $this->input->post('keterangan'),
            'stok' => $this->input->post('stok'),
            'id_rak' => $this->input->post('id_rak'),
            'edited' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_buku', $this->input->post('id_buku'));
        $this->db->update('perpus_m_buku',$data);
        return;
    }

    public function detail($id_buku){
        $this->db->where('id_buku',$id_buku);
        return $this->db->get('perpus_m_buku')->row_array();
    }

    public function listRak(){
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        $this->db->where('deleted', NULL);
        return $this->db->get('perpus_m_rak')->result_array(); 
    }
    
    public function delete($id_buku){
        $this->db->where('id_buku',$id_buku);
        $this->db->delete('perpus_m_buku');
    }
}