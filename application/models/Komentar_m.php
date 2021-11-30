<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar_m extends CI_Model {

    //server side
    var $table = 'komentar'; //nama tabel dari database
    var $column_order = array(null, null, 'artikel.judul','komentar.nama','komentar.komentar','komentar.status');
    
    var $column_search = array(null, null, 'artikel.judul','komentar.nama','komentar.komentar','komentar.status'); 
    
    var $order = array('komentar.status' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->join('artikel','artikel.id_artikel = komentar.id_artikel','left');
        $this->db->where('komentar.id_sekolah', $id_sekolah);
 
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

    public function updateStatus(){
        $data = array(
            'status' => $this->input->post('status'),
            'edited' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_komentar', $this->input->post('id_komentar'));
        $this->db->update('komentar',$data);
        return;
    }
}