<?php

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->tampil();
        $this->load->view('header');
        $this->load->view('produk_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_produk = NULL)
    {
        if (!$id_produk) {
            redirect('produk', 'refresh');
        }
        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->detail_umum($id_produk);
        $inputan = $this->input->post();

        if ($inputan) {
            $this->load->model('Mkeranjang');
            $this->Mkeranjang->simpan($inputan, $id_produk);
            $this->session->set_flashdata('pesan_sukses', 'Produk masuk ke keranjang belanja');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        $this->load->view('header');
        $this->load->view('produk_detail', $data);
        $this->load->view('footer');
    }

    function cari()
    {
        $this->load->model('Mproduk');
        $keyword = $this->input->get('keyword');
        $data['produk'] = $this->Mproduk->cari($keyword);
        $data['keyword'] = $keyword;
        $this->load->view('header');
        $this->load->view('produk_cari', $data);
        $this->load->view('footer');
    }
}
