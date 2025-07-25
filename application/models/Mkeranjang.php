<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkeranjang extends CI_Model
{
    function checkout($keranjang, $member_jual, $member_beli, $ongkirterpilih, $kupon_data = null)
    {
        $totalbelanja = 0;
        $totalberat = 0;

        foreach ($keranjang as $k => $pk) {
            $totalbelanja += $pk['jumlah'] * $pk['harga_produk'];
            $totalberat += $pk['jumlah'] * $pk['berat_produk'];
        }

        $diskon = 0;
        $id_kupon = null;
        if ($kupon_data && isset($kupon_data['diskon'])) {
            $diskon = $kupon_data['diskon'];
            $id_kupon = $kupon_data['id_kupon'];
        }

        $total_transaksi = $totalbelanja + $ongkirterpilih['cost'] - $diskon;

        $m['kode_transaksi'] = date('YmdHis') . rand(1111, 9999);
        $m['id_member_beli'] = $member_beli['id_member'];
        $m['id_member_jual'] = $member_jual['id_member'];
        $m['tanggal_transaksi'] = date('Y-m-d H:i:s');
        $m['belanja_transaksi'] = $totalbelanja;
        $m['status_transaksi'] = "Pesan";
        $m['ongkir_transaksi'] = $ongkirterpilih['cost'];
        $m['diskon_transaksi'] = $diskon; 
        $m['id_kupon'] = $id_kupon; 
        $m['total_transaksi'] = $total_transaksi;
        $m['bayar_transaksi'] = $total_transaksi; 
        $m['distrik_pengirim'] = $member_jual['nama_distrik_member'];
        $m['nama_pengirim'] = $member_jual['nama_member'];
        $m['wa_pengirim'] = $member_jual['wa_member'];
        $m['alamat_pengirim'] = $member_jual['alamat_member'];
        $m['distrik_penerima'] = $member_beli['nama_distrik_member'];
        $m['nama_penerima'] = $member_beli['nama_member'];
        $m['wa_penerima'] = $member_beli['wa_member'];
        $m['alamat_penerima'] = $member_beli['alamat_member'];
        $m['nama_ekspedisi'] = $ongkirterpilih['name'];
        $m['layanan_ekspedisi'] = $ongkirterpilih['description'];
        $m['estimasi_ekspedisi'] = $ongkirterpilih['etd'];
        $m['berat_ekspedisi'] = $totalberat;

        $this->db->insert('transaksi', $m);
        $id_transaksi = $this->db->insert_id();

        foreach ($keranjang as $k => $pk) {
            $td['id_transaksi'] = $id_transaksi;
            $td['id_produk'] = $pk['id_produk'];
            $td['nama_beli'] = $pk['nama_produk'];
            $td['harga_beli'] = $pk['harga_produk'];
            $td['jumlah_beli'] = $pk['jumlah'];
            $this->db->insert('transaksi_detail', $td);
        }
        $this->db->where('id_member_jual', $member_jual['id_member']);
        $this->db->where('id_member_beli', $member_beli['id_member']);
        $this->db->delete('keranjang');
        return $id_transaksi;
    }

    function simpan($inputan, $id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $qp = $this->db->get('produk');
        $dp = $qp->row_array();
        $inputan['id_produk'] = $id_produk;
        $inputan['id_member_beli'] = $this->session->userdata('id_member');
        $inputan['id_member_jual'] = $dp['id_member'];
        $this->db->where('id_member_beli', $this->session->userdata('id_member'));
        $this->db->where('id_produk', $id_produk);
        $qk = $this->db->get('keranjang');
        $dk = $qk->row_array();
        if (empty($dk)) {
            $this->db->insert('keranjang', $inputan);
        } else {
            $inputan['jumlah'] += $dk['jumlah'];
            $this->db->where('id_member_beli', $this->session->userdata('id_member'));
            $this->db->where('id_produk', $id_produk);
            $this->db->update('keranjang', $inputan);
        }
    }

    function tampil()
    {
        $id_member_beli = $this->session->userdata('id_member');
        $this->db->select('member.*');
        $this->db->from('keranjang');
        $this->db->join('member', 'keranjang.id_member_jual = member.id_member', 'left');
        $this->db->where('keranjang.id_member_beli', $id_member_beli);
        $this->db->group_by('member.id_member');
        $qmj = $this->db->get();
        $dmj = $qmj->result_array();
        $output = array();
        foreach ($dmj as $per_penjual) {
            $this->db->select('produk.*, keranjang.*');
            $this->db->from('keranjang');
            $this->db->join('produk', 'keranjang.id_produk = produk.id_produk', 'left');
            $this->db->where('keranjang.id_member_beli', $id_member_beli);
            $this->db->where('keranjang.id_member_jual', $per_penjual['id_member']);
            $qkp = $this->db->get();
            $dkp = $qkp->result_array();
            $per_penjual['produk'] = $dkp;
            $output[] = $per_penjual;
        }
        return $output;
    }

    function hapus($id_keranjang)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->where('id_member_beli', $this->session->userdata('id_member'));
        $this->db->delete('keranjang');
    }

    function tampil_member_jual($id_member_jual)
    {
        $this->db->where('id_member_jual', $id_member_jual);
        $this->db->where('id_member_beli', $this->session->userdata('id_member'));
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk', 'left');
        $q = $this->db->get('keranjang');
        $dk = $q->result_array();
        return $dk;
    }

    function update($id_keranjang, $jumlah)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->where('id_member_beli', $this->session->userdata('id_member'));
        $this->db->update('keranjang', ['jumlah' => $jumlah]);
    }

    function hapus_semua()
    {
        $this->db->where('id_member_beli', $this->session->userdata('id_member'));
        $this->db->delete('keranjang');
    }

    function hapus_member($id_member)
    {
        $this->db->where('id_member_jual', $id_member);
        $this->db->where('id_member_beli', $this->session->userdata('id_member'));
        $this->db->delete('keranjang');
    }
}
