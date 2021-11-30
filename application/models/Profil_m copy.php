<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil_m extends CI_Model {

    //server side
    var $table = 'profil'; //nama tabel dari database
    var $column_order = array(null, 'profil.id_profil','profil.page_name','profil.slug','profil.konten'); //field yang ada di table user
    var $column_search = array('profil.id_profil','profil.page_name','profil.slug','profil.konten'); //field yang diizin untuk pencarian 
    var $order = array('profil.id_profil' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('*');
        $this->db->from('profil');
        $this->db->where('profil.id_sekolah', $id_sekolah);
 
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
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'page_name' => $this->input->post('page_name'),
            'slug' => $this->input->post('slug'),
            'konten' => $this->input->post('konten'),
            'created_by' => $this->session->userdata('id_user'),
            'created_date' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('profil',$data);
        return;
    }

    public function edit_not_with_file(){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'page_name' => $this->input->post('page_name'),
            'slug' => $this->input->post('slug'),
            'konten' => $this->input->post('konten'),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_profil', $this->input->post('id_profil'));
        $this->db->update('profil',$data);
        return;
    }

    public function detail($id_profil){
        $this->db->where('id_profil',$id_profil);
        return $this->db->get('profil')->row_array();
    }

    public function delete($id_profil){
        $this->db->where('id_profil',$id_profil);
        $this->db->delete('profil');

    }

    public function getKategori(){
        return $this->db->get('kategori')->result_array();
    }
}