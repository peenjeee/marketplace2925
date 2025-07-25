<?php

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();
        $this->load->view('header');
        $this->load->view('kategori_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id = NULL)
    {
        if (!$id) {
            redirect('kategori', 'refresh');
        }
        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->detail($id);
        $data['produk'] = $this->Mkategori->produk($id);
        $this->load->view('header');
        $this->load->view('kategori_produk', $data);
        $this->load->view('footer');
    }

    function cari()
    {
        $this->load->model('Mkategori');
        $keyword = $this->input->get('keyword');
        $data['kategori'] = $this->Mkategori->cari($keyword);
        $data['keyword'] = $keyword;
        $this->load->view('header');
        $this->load->view('kategori_cari', $data);
        $this->load->view('footer');
    }

    function cari_produk()
    {
        $this->load->model('Mproduk');
        $this->load->model('Mkategori');
        $id_kategori = $this->uri->segment(3);
        $keyword = $this->input->get('keyword');
        $data['kategori'] = $this->Mkategori->detail($id_kategori);
        $data['keyword'] = $keyword;
        $data['produk'] = array();
        
        if (!empty($data['kategori'])) {
            $data['produk'] = $this->Mproduk->cari_kategori($id_kategori, $keyword);
        }

        $this->load->view('header');
        $this->load->view('kategori_cari_produk', $data);
        $this->load->view('footer');
    }
}
