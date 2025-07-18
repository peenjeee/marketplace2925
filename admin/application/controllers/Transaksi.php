<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    function index()
    {
        $this->load->model('Mtransaksi');
        $data['transaksi'] = $this->Mtransaksi->tampil();
        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi = NULL)
    {
        if (!$id_transaksi) {
            redirect('transaksi', 'refresh');
        }

        $this->load->model('Mtransaksi');
        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);
        $data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);

        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }
}
