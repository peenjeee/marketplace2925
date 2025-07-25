<?php

class Mmember extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('member');
        $d = $q->result_array();
        return $d;
    }

    function detail($id_member)
    {
        $this->db->where('id_member', $id_member);
        $q = $this->db->get('member');
        $d = $q->row_array();
        return $d;
    }

    function jumlah_member_distrik()
    {
        $q = $this->db->query("SELECT COUNT(*) as jumlah, nama_distrik_member FROM member GROUP BY nama_distrik_member");
        $d = $q->result_array();
        return $d;
    }

    public function login($inputan)
    {
        $email_member = $inputan['email_member'];
        $password_member = sha1($inputan['password_member']);
        $this->db->where('email_member', $email_member);
        $this->db->where('password_member', $password_member);
        $q = $this->db->get('member');
        $cekmember = $q->row_array();

        if (!empty($cekmember)) {
            $this->session->set_userdata('id_member', $cekmember['id_member']);
            $this->session->set_userdata('email_member', $cekmember['email_member']);
            $this->session->set_userdata('nama_member', $cekmember['nama_member']);
            $this->session->set_userdata('alamat_member', $cekmember['alamat_member']);
            $this->session->set_userdata('wa_member', $cekmember['wa_member']);
            $this->session->set_userdata('kode_distrik_member', $cekmember['kode_distrik_member']);
            $this->session->set_userdata('nama_distrik_member', $cekmember['nama_distrik_member']);
            return "ada";
        } else {
            return "gak ada";
        }
    }

    function ubah($inputan, $id_member)
    {
        if (!empty($inputan['password_member'])) {
            $inputan['password_member'] = sha1($inputan['password_member']);
        } else {
            unset($inputan['password_member']);
        }

        $this->db->where('id_member', $id_member);
        $this->db->update('member', $inputan);
        $this->db->where('id_member', $id_member);
        $q = $this->db->get('member');
        $cekmember = $q->row_array();
        $this->session->set_userdata([
            'id_member' => $cekmember['id_member'],
            'email_member' => $cekmember['email_member'],
            'nama_member' => $cekmember['nama_member'],
            'alamat_member' => $cekmember['alamat_member'],
            'wa_member' => $cekmember['wa_member'],
            'kode_distrik_member' => $cekmember['kode_distrik_member'],
            'nama_distrik_member' => $cekmember['nama_distrik_member']
        ]);
    }

    function register($m) {
        $this->db->insert('member', $m);
    }
}
