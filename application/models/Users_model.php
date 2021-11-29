<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
    
    public function get($email){
        $this->db->where('email', $email);
        $result = $this->db->get('user')->row();
        return $result;
    }

    public function auto_id()
    {
        $query = $this->db->query("SELECT MAX(id_user) as idanggota from user");
        $hasil = $query->row();
        return $hasil->idanggota;
    }

    function fetch_pass($session_id){
        $fetch_pass=$this->db->query("select * from user where id_user='$session_id'");
        $res=$fetch_pass->result();
    }
    
	function change_pass($session_id,$new_pass){
	    $update_pass=$this->db->query("UPDATE user set password='$new_pass'  where id_user='$session_id'");
	}

    public function log_login($id_sekolah, $id_user, $nama, $browser, $level, $os){
        $data = array(
            "id_sekolah" => $id_sekolah,
            "id_user" => $id_user,
            "nama" => $nama,
            "level" => $level,
            "browser" => $browser,
            "ip_address" => $this->input->ip_address(),
            "os" => $os,
            "created" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata('id_user')
        );
        $this->db->insert('log_login',$data);
        return;
    }

    public function list_user(){
        $this->db->order_by('id_user','DESC');
        return $this->db->get('user')->result_array();
    }

    public function tambahuser($foto){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'nohp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat'),
            'status' => 'Aktif',
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'image' => $foto,
            'level' => $this->input->post('level')
        );
        $this->db->insert('user',$data);
        return;
    }

    public function edit_user(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'nohp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat'),
            'status' => $this->input->post('status'),
            'email' => $this->input->post('email'),
            'level' => $this->input->post('level')
        );
        $this->db->where('id_user',$this->input->post('id_user'));
        $this->db->update('user',$data);
        return;
    }

    public function edit_user_withfoto($foto){
        $data = array(
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'nohp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat'),
            'status' => $this->input->post('status'),
            'email' => $this->input->post('email'),
            'image' => $foto,
            'level' => $this->input->post('level')
        );
        $this->db->where('id_user',$this->input->post('id_user'));
        $this->db->update('user',$data);
        return;
    }

    public function detail_user(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get()->row_array();
    }

    function is_email_available($email)  
      {  
          $this->db->where('email', $email);  
          $query = $this->db->get("user");  
          if($query->num_rows() > 0)  
          {  
              return true;  
          }  
          else  
          {  
              return false;  
          }  
    } 
    public function getCurrentUser(){
        $this->db->where('email', $_SESSION['email']);
        $result = $this->db->get('user')->row_array();
        return $result;
    }
    
}