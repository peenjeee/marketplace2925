<?php

class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_member')) {
        //     redirect('/', 'refresh');
        // }
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
}
