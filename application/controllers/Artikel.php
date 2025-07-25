<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Martikel');
        $data['artikel'] = $this->Martikel->tampil_artikel();
        $this->load->view('header');
        $this->load->view('artikel_tampil', $data);
        $this->load->view('footer');
    }

    public function detail($id_artikel = NULL)
    {
        if (!$id_artikel) {
            redirect('artikel', 'refresh');
        }
        $this->load->model('Martikel');
        $data['artikel'] = $this->Martikel->tampil_artikel_detail($id_artikel);
        $this->load->view('header');
        $this->load->view('artikel_detail', $data);
        $this->load->view('footer');
    }

    function cari()
    {
        $this->load->model('Martikel');
        $keyword = $this->input->get('keyword');
        $data['artikel'] = $this->Martikel->cari($keyword);
        $data['keyword'] = $keyword;
        $this->load->view('header');
        $this->load->view('artikel_cari', $data);
        $this->load->view('footer');
    }
}
