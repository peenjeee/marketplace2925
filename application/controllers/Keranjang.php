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
        $this->load->model('Mkeranjang');
        $this->load->model('Mkupon');
    }

    public function index()
    {
        $this->session->unset_userdata('kupon_terpakai');
        $data['keranjang'] = $this->Mkeranjang->tampil();
        $this->load->view('header');
        $this->load->view('keranjang', $data);
        $this->load->view('footer');
    }

    function checkout($id_member_jual = NULL)
    {
        if (!$id_member_jual) {
            redirect('keranjang', 'refresh');
        }

        $totalberat = 0;
        $data['keranjang'] = $this->Mkeranjang->tampil_member_jual($id_member_jual);
        $data['totalbelanja'] = 0;

        foreach ($data['keranjang'] as $k => $pk) {
            $berat = $pk['jumlah'] * $pk['berat_produk'];
            $totalberat += $berat;
            $data['totalbelanja'] += $pk['jumlah'] * $pk['harga_produk'];
        }

        $this->load->model('Mmember');
        $data['member_jual'] = $this->Mmember->detail($id_member_jual);
        $data['member_beli'] = $this->Mmember->detail($this->session->userdata('id_member'));
        $origin = isset($data['member_jual']['kode_distrik_member']) ? $data['member_jual']['kode_distrik_member'] : null;
        $destination = $data['member_beli']['kode_distrik_member'];
        $this->load->model('Mongkir');
        $data['biaya'] = $this->Mongkir->biaya($origin, $destination, $totalberat);
        $data['kupon_terpakai'] = $this->session->userdata('kupon_terpakai');
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi');

        if ($this->form_validation->run() == TRUE) {
            $ongkir = $this->input->post('ongkir');
            $ongkirterpilih = $data['biaya'][$ongkir];
            $kupon_data = $this->session->userdata('kupon_terpakai');
            $id_transaksi = $this->Mkeranjang->checkout($data['keranjang'], $data['member_jual'], $data['member_beli'], $ongkirterpilih, $kupon_data);
            $this->session->unset_userdata('kupon_terpakai');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
        }

        $this->load->view('header');
        $this->load->view('checkout', $data);
        $this->load->view('footer');
    }

    public function apply_coupon()
    {
        $kode_kupon = $this->input->post('kode_kupon');
        $id_member_jual = $this->input->post('id_member_jual');

        if (empty($kode_kupon) || empty($id_member_jual)) {
            echo json_encode(['status' => 'error', 'message' => 'Kode kupon tidak boleh kosong.']);
            return;
        }

        $keranjang = $this->Mkeranjang->tampil_member_jual($id_member_jual);
        $total_belanja = 0;
        foreach ($keranjang as $item) {
            $total_belanja += $item['jumlah'] * $item['harga_produk'];
        }

        $kupon = $this->Mkupon->cek_kupon($kode_kupon, $total_belanja);

        if ($kupon) {
            $diskon = 0;
            if ($kupon['jenis_kupon'] == 'persen') {
                $diskon = ($kupon['nilai_kupon'] / 100) * $total_belanja;
            } else {
                $diskon = $kupon['nilai_kupon'];
            }

            $kupon_data = [
                'id_kupon' => $kupon['id_kupon'],
                'kode_kupon' => $kupon['kode_kupon'],
                'diskon' => $diskon
            ];
            $this->session->set_userdata('kupon_terpakai', $kupon_data);

            echo json_encode([
                'status' => 'success',
                'message' => 'Kupon berhasil digunakan!',
                'diskon' => $diskon,
                'diskon_formatted' => 'Rp. ' . number_format($diskon)
            ]);
        } else {
            $this->session->unset_userdata('kupon_terpakai');
            echo json_encode(['status' => 'error', 'message' => 'Kupon tidak valid atau tidak memenuhi syarat.']);
        }
    }

    function hapus($id_keranjang = NULL)
    {
        if (!$id_keranjang) {
            redirect('keranjang', 'refresh');
        }
        $this->Mkeranjang->hapus($id_keranjang);
        $this->session->set_flashdata('pesan_sukses', 'Produk telah dihapus dari keranjang');
        redirect('keranjang', 'refresh');
    }

    function update($id_keranjang = NULL)
    {
        if (!$id_keranjang) {
            redirect('keranjang', 'refresh');
        }
        $jumlah = $this->input->post('jumlah');
        if ($jumlah < 1) {
            $this->session->set_flashdata('pesan_gagal', 'Jumlah tidak boleh kurang dari 1');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        $this->Mkeranjang->update($id_keranjang, $jumlah);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    function all()
    {
        $this->Mkeranjang->hapus_semua();
        $this->session->set_flashdata('pesan_sukses', 'Semua produk telah dihapus dari keranjang');
        redirect('keranjang', 'refresh');
    }

    function member($id_member_jual = NULL)
    {
        if (!$id_member_jual) {
            redirect('keranjang', 'refresh');
        }
        $this->Mkeranjang->hapus_member($id_member_jual);
        $this->session->set_flashdata('pesan_sukses', 'Semua produk dari penjual ini telah dihapus dari keranjang');
        redirect('keranjang', 'refresh');
    }
}
