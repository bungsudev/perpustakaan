<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    //server side
    var $table = 'artikel'; //nama tabel dari database
    var $column_order = array(null, 'artikel.id_artikel','artikel.judul','artikel.slug','artikel.konten'); //field yang ada di table user
    var $column_search = array('artikel.id_artikel','artikel.judul','artikel.slug','artikel.konten'); //field yang diizin untuk pencarian 
    var $order = array('artikel.id_artikel' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori','left');
        $this->db->where('artikel.id_sekolah', $id_sekolah);
 
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

    public function tambah($file){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_tag' => implode(',',$this->input->post('id_tag')),
            'judul' => $this->input->post('judul'),
            'slug' => $this->input->post('slug'),
            'konten' => $this->input->post('konten'),
            'images' => $file,
            'created_by' => $this->session->userdata('id_user'),
            'created_date' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('artikel',$data);
        return;
    }

    public function edit_not_with_file(){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_tag' => implode(',',$this->input->post('id_tag')),
            'judul' => $this->input->post('judul'),
            'slug' => $this->input->post('slug'),
            'konten' => $this->input->post('konten'),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_artikel', $this->input->post('id_artikel'));
        $this->db->update('artikel',$data);
        return;
    }

    public function edit_with_file($file){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_tag' => implode(',',$this->input->post('id_tag')),
            'judul' => $this->input->post('judul'),
            'slug' => $this->input->post('slug'),
            'konten' => $this->input->post('konten'),
            'images' => $file,
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_artikel',$this->input->post('id_artikel'));
        $this->db->update('artikel',$data);
        return;
    }

    public function detail($id_artikel){
        $this->db->where('id_artikel',$id_artikel);
        return $this->db->get('artikel')->row_array();
    }

    public function delete($id_artikel){
        $this->db->where('id_artikel',$id_artikel);
        $this->db->delete('artikel');

    }

    public function getKategori(){
        $this->db->order_by('nama_kategori','desc');
        return $this->db->get('kategori')->result_array();
    }

    public function getTag(){
        $this->db->order_by('nama_tag','desc');
        return $this->db->get('tag')->result_array();
    }
}