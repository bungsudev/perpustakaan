<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sambutan_model extends CI_Model
{

    public function edit_not_with_file()
    {
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'konten' => $this->input->post('konten'),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_sambutan', $this->input->post('id_sambutan'));
        $this->db->update('sambutan', $data);
        return;
    }

    public function edit_with_file($file)
    {
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'konten' => $this->input->post('konten'),
            'images' => $file,
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_sambutan', $this->input->post('id_sambutan'));
        $this->db->update('sambutan', $data);
        return;
    }

    public function detail()
    {
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        return $this->db->get('sambutan')->row_array();
    }
}
