<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_member')) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $id_member = $this->session->userdata('id_member');
        $this->load->model('Mproduk');

        $data['produk'] = $this->Mproduk->produk_member($id_member);

        $this->load->view('header');
        $this->load->view('seller/produk_tampil', $data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->load->model('Mkategori');
        $this->load->model('Mproduk');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();

        if ($inputan) {
            $this->Mproduk->simpan($inputan);
            $this->session->set_flashdata('pesan_sukses', 'Produk Tersimpan');
            redirect('seller/produk', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('seller/produk_tambah', $data);
        $this->load->view('footer');
    }

    function edit($id_produk)
    {
        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->detail($id_produk);

        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();

        if ($inputan) {
            $this->Mproduk->ubah($inputan, $id_produk);
            $this->session->set_flashdata('pesan_sukses', 'Produk Tersimpan');
            redirect('seller/produk', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('seller/produk_edit', $data);
        $this->load->view('footer');
    }

    function hapus($id_produk)
    {
        $this->load->model('Mproduk');
        $this->Mproduk->hapus($id_produk);
        $this->session->set_flashdata('pesan_sukses', 'Produk telah dihapus');
        redirect('seller/produk', 'refresh');
    }

    function laporan_terjual()
    {
        $this->load->model('Mproduk');

        $tglm = date("Y-m-01");
        $tgls = date("Y-m-t");
        $status = 'selesai';
        if ($this->input->post('tglm') && $this->input->post('tgls')) {
            $tglm = $this->input->post('tglm');
            $tgls = $this->input->post('tgls');
            $status = $this->input->post('status');
        }

        $data['laporan_terjual'] = $this->Mproduk->laporan_terjual($tglm, $tgls, $status);
        $data['tglm'] = $tglm;
        $data['tgls'] = $tgls;
        $data['status'] = $status;

        $this->load->view('header');
        $this->load->view('seller/produk_laporan_terjual', $data);
        $this->load->view('footer');
    }
}
