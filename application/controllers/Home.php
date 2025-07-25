<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_member')) {
            redirect('/', 'refresh');
        }
    }

    public function index()
    {
        $this->load->model('Mtransaksi');
        $this->load->model('Mproduk');
        $this->load->model('Mmember');
        $data['jumlah_member_distrik'] = $this->Mmember->jumlah_member_distrik();
        $id_member = $this->session->userdata('id_member');
        $data['produk'] = $this->Mproduk->produk_member($id_member);
        $data['jual'] = $this->Mtransaksi->transaksi_member_jual($id_member);
        $data['beli'] = $this->Mtransaksi->transaksi_member_beli($id_member);
        $this->load->view('header');
        $this->load->view('home', $data);
        $this->load->view('footer');
    }
}
