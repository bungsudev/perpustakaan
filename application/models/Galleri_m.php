<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galleri_m extends CI_Model {

    //server side
    var $table = 'galleri'; //nama tabel dari database
    var $column_order = array(null, 'galleri.id_galleri','galleri.caption'); //field yang ada di table user
    var $column_search = array('galleri.id_galleri','galleri.caption'); //field yang diizin untuk pencarian 
    var $order = array('galleri.id_galleri' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('*');
        $this->db->from('galleri');
        $this->db->where('galleri.id_sekolah', $id_sekolah);
 
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
            'caption' => $this->input->post('caption'),
            'images' => $file,
            'created_by' => $this->session->userdata('id_user'),
            'created_date' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('galleri',$data);
        return;
    }

    public function edit_not_with_file(){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'caption' => $this->input->post('caption'),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_galleri', $this->input->post('id_galleri'));
        $this->db->update('galleri',$data);
        return;
    }

    public function edit_with_file($file){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'caption' => $this->input->post('caption'),
            'images' => $file,
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_galleri',$this->input->post('id_galleri'));
        $this->db->update('galleri',$data);
        return;
    }

    public function detail($id_galleri){
        $this->db->where('id_galleri',$id_galleri);
        return $this->db->get('galleri')->row_array();
    }

    public function delete($id_galleri){
        $this->db->where('id_galleri',$id_galleri);
        $this->db->delete('galleri');

    }

    public function getKategori(){
        return $this->db->get('kategori')->result_array();
    }
}