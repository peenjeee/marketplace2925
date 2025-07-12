<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Keranjang extends CI_Controller
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
        $this->load->model('Mkeranjang');

        $data['keranjang'] = $this->Mkeranjang->tampil();

        $this->load->view('header');
        $this->load->view('keranjang', $data);
        $this->load->view('footer');
    }

    function hapus($id_keranjang)
    {
        $this->load->model('Mkeranjang');
        $this->Mkeranjang->hapus($id_keranjang);

        $this->session->set_flashdata('pesan_sukses', 'Produk telah dihapus dari keranjang');
        redirect('keranjang', 'refresh');
    }

    function checkout($id_member_jual)
    {
        $this->load->model('Mkeranjang');
        $totalberat = 0;
        $data['keranjang'] = $this->Mkeranjang->tampil_member_jual($id_member_jual);

        foreach ($data['keranjang'] as $k => $pk) {
            $berat = $pk['jumlah'] * $pk['berat_produk'];
            $totalberat += $berat;
        }


        $this->load->model('Mmember');
        $data['member_jual'] = $this->Mmember->detail($id_member_jual);
        $data['member_beli'] = $this->Mmember->detail($this->session->userdata('id_member'));


        $origin = $data['member_jual']['kode_distrik_member'];
        $destination = $data['member_beli']['kode_distrik_member'];
        $this->load->model('Mongkir');
        $data['biaya'] = $this->Mongkir->biaya($origin, $destination, $totalberat);

        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi');
        if ($this->form_validation->run() == TRUE) {
            $ongkir =  $this->input->post('ongkir');
            $ongkirterpilih = $data['biaya']['costs'][$ongkir];


            $id_transaksi = $this->Mkeranjang->checkout($data['keranjang'], $data['member_jual'], $data['member_beli'], $data['biaya']['name'], $ongkirterpilih);

            // $this->session->set_flashdata('pesan_sukses', 'Transaksi berhasil');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
        }

        $this->load->view('header');
        $this->load->view('checkout', $data);
        $this->load->view('footer');
    }
}
