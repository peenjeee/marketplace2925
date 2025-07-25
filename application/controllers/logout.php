<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function index()
    {
        $this->session->unset_userdata('id_member');
        $this->session->unset_userdata('email_member');
        $this->session->unset_userdata('nama_member');
        $this->session->unset_userdata('alamat_member');
        $this->session->unset_userdata('wa_member');
        $this->session->unset_userdata('kode_distrik_member');
        $this->session->unset_userdata('nama_distrik_member');
        $this->session->set_flashdata('pesan_sukses', 'Anda telah logout');
        redirect('/', 'refresh');
    }
}
