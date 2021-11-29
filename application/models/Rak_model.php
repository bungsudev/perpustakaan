<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rak_model extends CI_Model {

    //server side
    var $table = 'perpus_m_rak'; //nama tabel dari database
    var $column_order = array(null, 'perpus_m_rak.nama_rak'); //field yang ada di table user
    var $column_search = array('perpus_m_rak.nama_rak'); //field yang diizin untuk pencarian 
    var $order = array('perpus_m_rak.id_rak' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('*');
        $this->db->from('perpus_m_rak');
        $this->db->where('perpus_m_rak.id_sekolah', $id_sekolah);
 
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
            'nama_rak' => $this->input->post('nama_rak'),
            'lokasi_rak' => $this->input->post('lokasi_rak'),
            'created' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('perpus_m_rak',$data);
        return;
    }

    public function edit_not_with_file(){
        $data = array(
            'nama_rak' => $this->input->post('nama_rak'),
            'lokasi_rak' => $this->input->post('lokasi_rak'),
            'edited' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_rak', $this->input->post('id_rak'));
        $this->db->update('perpus_m_rak',$data);
        return;
    }

    public function detail($id_rak){
        $this->db->where('id_rak',$id_rak);
        return $this->db->get('perpus_m_rak')->row_array();
    }

    public function listRak(){
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        $this->db->where('deleted', NULL);
        return $this->db->get('perpus_m_rak')->result_array(); 
    }
    
    public function delete($id_rak){
        $this->db->where('id_rak',$id_rak);
        $this->db->delete('perpus_m_rak');
    }
}