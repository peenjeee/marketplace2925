<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{
    public function login($inputan)
    {
        $username = $inputan['username'];
        $password = sha1($inputan['password']);
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        if (!empty($cekadmin)) {
            $this->session->set_userdata('id_admin', $cekadmin['id_admin']);
            $this->session->set_userdata('username', $cekadmin['username']);
            $this->session->set_userdata('nama', $cekadmin['nama']);
            return "ada";
        } else {
            return "gak ada";
        }
    }

    function ubah($inputan, $id_admin)
    {
        if (!empty($inputan['password'])) {
            $inputan['password'] = sha1($inputan['password']);
        } else {
            unset($inputan['password']);
        }

        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $inputan);
        $this->db->where('id_admin', $id_admin);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();
        $this->session->set_userdata('id_admin', $cekadmin['id_admin']);
        $this->session->set_userdata('username', $cekadmin['username']);
        $this->session->set_userdata('nama', $cekadmin['nama']);
    }
}
