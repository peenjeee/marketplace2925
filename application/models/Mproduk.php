<?php

class Mproduk extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('produk');
        $d = $q->result_array();
        return $d;
    }

    function produk_member($id_member)
    {
        $this->db->where('id_member', $id_member);
        $q = $this->db->get('produk');
        $d = $q->result_array();
        return $d;
    }

    function simpan($inputan)
    {
        $config['upload_path'] = $this->config->item('assets_produk');
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $ngupload = $this->upload->do_upload('foto_produk');
        if ($ngupload) {
            $inputan['foto_produk'] = $this->upload->data('file_name');
        }
        $inputan['id_member'] = $this->session->userdata('id_member');
        $this->db->insert('produk', $inputan);
    }

    function detail($id_produk)
    {
        $this->db->where('id_member', $this->session->userdata('id_member'));
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get('produk');
        $d = $q->row_array();
        return $d;
    }

    function ubah($inputan, $id)
    {
        $config['upload_path'] = $this->config->item('assets_produk');
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $ngupload = $this->upload->do_upload('foto_produk');
        if ($ngupload) {
            $inputan['foto_produk'] = $this->upload->data('file_name');
        }
        $inputan['id_member'] = $this->session->userdata('id_member');
        $this->db->where('id_member', $this->session->userdata('id_member'));
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $inputan);
    }

    function hapus($id_produk)
    {
        $this->db->where('id_member', $this->session->userdata('id_member'));
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }

    function tampil_produk_terbaru()
    {
        $this->db->order_by('id_produk', 'desc');
        $q = $this->db->get('produk', 4, 0);
        $d = $q->result_array();
        return $d;
    }

    function detail_umum($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get('produk');
        $d = $q->row_array();

        if ($d) {
            $this->db->where('id_produk', $id_produk);
            $q_foto = $this->db->get('produk_foto');
            $d['galeri_foto'] = $q_foto->result_array();
        }
        return $d;
    }

    function laporan_terjual($tglm, $tgls, $status)
    {
        $id_member_jual = $this->session->userdata('id_member');
        $kueri = "SELECT id_produk, nama_beli, SUM(jumlah_beli) AS jumlah_terjual, SUM(harga_beli) AS nominal_terjual FROM transaksi_detail
        LEFT JOIN transaksi ON transaksi_detail.id_transaksi=transaksi.id_transaksi
        WHERE id_member_jual=$id_member_jual
        AND tanggal_transaksi BETWEEN '$tglm' AND '$tgls'
        AND status_transaksi='$status'
        GROUP BY id_produk, nama_beli";
        $ambil = $this->db->query($kueri);
        $data = $ambil->result_array();
        return $data;
    }

    function cari($keyword = "")
    {
        $this->db->or_like('nama_produk', $keyword, 'both');
        $this->db->or_like('deskripsi_produk', $keyword, 'both');
        $q = $this->db->get('produk');
        $d = $q->result_array();
        return $d;
    }

    function cari_kategori($id_kategori, $keyword = "")
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('nama_produk', $keyword, 'both');
            $this->db->or_like('deskripsi_produk', $keyword, 'both');
            $this->db->group_end();
        }
        $q = $this->db->get('produk');
        $d = $q->result_array();
        return $d;
    }

    function get_galeri($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $q = $this->db->get('produk_foto');
        return $q->result_array();
    }

    function simpan_galeri($data_galeri)
    {
        $this->db->insert('produk_foto', $data_galeri);
    }

    function get_foto($id_foto)
    {
        $this->db->where('id_foto', $id_foto);
        $q = $this->db->get('produk_foto');
        return $q->row_array();
    }

    function hapus_foto($id_foto)
    {
        $this->db->where('id_foto', $id_foto);
        $this->db->delete('produk_foto');
    }

    function hapus_semua_foto_db($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk_foto');
    }
}