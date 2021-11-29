<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_m extends CI_Model
{

    public function dataIdentitassekolah()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT * FROM identitas_sekolah where id_sekolah = '$id_sekolah'");
        return $query->row();
    }

    public function edit($nama_gambar, $id)
    {
        $data = [
            "nama_sekolah" => $this->input->post('nama_sekolah'),
            "npsn" => $this->input->post('npsn'),
            "kode_pos" => $this->input->post('kode_pos'),
            "alamat" => $this->input->post('alamat'),
            "email" => $this->input->post('email'),
            "telepon" => $this->input->post('telepon'),
            "website" => $this->input->post('website'),
            "tentang" => $this->input->post('tentang'),
            "maps" => $this->input->post('maps'),
            "edited" => date("Y-m-d H:i:s"),
        ];

        //cek update tanpa gambar
        (!empty($nama_gambar)) ? $data = array_merge($data, ["lambang_sekolah" => $nama_gambar]) : '';

        $this->db->where('id_sekolah', $id);
        $this->db->update('identitas_sekolah', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
