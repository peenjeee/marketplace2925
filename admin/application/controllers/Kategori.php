<?php

class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }

    public function index()
    {

       
        $this->load->model('Mkategori');

        $data['kategori'] = $this->Mkategori->tampil();

        $this->load->view('header');
        $this->load->view('kategori_tampil', $data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $inputan = $this->input->post();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');


        $this->form_validation->set_message('required', '%s wajib diisi');

        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Mkategori');
            $this->Mkategori->simpan($inputan);

            $this->session->set_flashdata('pesan_sukses', 'Data kategori tersimpan');

            redirect('kategori', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('kategori_tambah');
        $this->load->view('footer');
    }

    function hapus($id_kategori)
    {
        $this->load->model('Mkategori');
        $this->Mkategori->hapus($id_kategori);

        $this->session->set_flashdata('pesan_sukses', 'Kategori telah terhapus');

        redirect('kategori', 'refresh');
    }

    function edit($id_kategori)
    {

        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->detail($id_kategori);

        $inputan = $this->input->post();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');


        $this->form_validation->set_message('required', '%s wajib diisi');

        if ($this->form_validation->run() == TRUE) {
            $this->Mkategori->edit($inputan, $id_kategori);

            $this->session->set_flashdata('pesan_sukses', 'Kategori telah diubah');

            redirect('kategori', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('kategori_edit', $data);
        $this->load->view('footer');
    }
}
