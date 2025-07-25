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
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required|numeric');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi');
        $this->form_validation->set_message('numeric', '%s harus berupa angka');
        $inputan = $this->input->post();

        if ($this->form_validation->run() == TRUE) {
            $this->Mproduk->simpan($inputan);
            $this->session->set_flashdata('pesan_sukses', 'Produk Tersimpan');
            redirect('seller/produk', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('seller/produk_tambah', $data);
        $this->load->view('footer');
    }

    function edit($id_produk = NULL)
    {
        if (!$id_produk) {
            redirect('seller/produk', 'refresh');
        }

        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->detail($id_produk);
        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required|numeric');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi');
        $this->form_validation->set_message('numeric', '%s harus berupa angka');
        $inputan = $this->input->post();

        if ($this->form_validation->run() == TRUE) {
            $this->Mproduk->ubah($inputan, $id_produk);
            $this->session->set_flashdata('pesan_sukses', 'Produk Tersimpan');
            redirect('seller/produk', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('seller/produk_edit', $data);
        $this->load->view('footer');
    }

    function hapus($id_produk = NULL)
    {
        if (!$id_produk) {
            redirect('seller/produk', 'refresh');
        }

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

    function galeri($id_produk = NULL)
    {
        if (!$id_produk) {
            redirect('seller/produk', 'refresh');
        }

        $this->load->model('Mproduk');

        $data['produk'] = $this->Mproduk->detail($id_produk);
        $data['galeri'] = $this->Mproduk->get_galeri($id_produk);

        $this->load->view('header');
        $this->load->view('seller/galeri_foto_produk', $data);
        $this->load->view('footer');
    }

    function tambah_galeri($id_produk = NULL)
    {
        if (!$id_produk) {
            redirect('seller/produk', 'refresh');
        }

        $this->load->model('Mproduk');

        if (!empty($_FILES['file_foto']['name'])) {
            $config['upload_path']   = $this->config->item('assets_produk');
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_foto')) {
                $file_data = $this->upload->data();
                $data_simpan = [
                    'id_produk' => $id_produk,
                    'file_foto' => $file_data['file_name']
                ];
                $this->Mproduk->simpan_galeri($data_simpan);
                $this->session->set_flashdata('pesan_sukses', 'Foto berhasil diunggah!');
            } else {
                $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
            }
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Anda belum memilih file untuk diunggah.');
        }
        redirect('seller/produk/galeri/' . $id_produk, 'refresh');
    }

    function hapus_galeri($id_foto = NULL, $id_produk = NULL)
    {
        if (!$id_foto or !$id_produk) {
            redirect('seller/produk', 'refresh');
        }

        $this->load->model('Mproduk');
        $foto = $this->Mproduk->get_foto($id_foto);
        if ($foto) {
            $file_path = $this->config->item('assets_produk') . $foto['file_foto'];
            if (file_exists($file_path)) {
                @unlink($file_path); 
            }
        }

        $this->Mproduk->hapus_foto($id_foto);
        $this->session->set_flashdata('pesan_sukses', 'Foto galeri telah dihapus!');
        redirect('seller/produk/galeri/' . $id_produk, 'refresh');
    }

    function hapus_semua_galeri($id_produk = NULL)
    {
        if (!$id_produk) {
            redirect('seller/produk', 'refresh');
        }

        $this->load->model('Mproduk');
        $semua_foto = $this->Mproduk->get_galeri($id_produk);

        if (!empty($semua_foto)) {
            foreach ($semua_foto as $foto) {
                $file_path = $this->config->item('assets_produk') . $foto['file_foto'];
                if (file_exists($file_path)) {
                    @unlink($file_path);
                }
            }

            $this->Mproduk->hapus_semua_foto_db($id_produk);
            $this->session->set_flashdata('pesan_sukses', 'Seluruh galeri produk telah dihapus!');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Tidak ada foto galeri untuk dihapus.');
        }
        redirect('seller/produk/galeri/' . $id_produk, 'refresh');
    }
}