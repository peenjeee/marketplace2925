<?php

class MKategori extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('kategori');
        $d = $q->result_array();
        return $d;
    }

    function tampil_terbaru()
    {
        $this->db->order_by('id_kategori', 'desc');
        $q = $this->db->get('kategori', 4, 0);
        $d = $q->result_array();
        return $d;
    }

    function detail($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('kategori');
        $d = $q->row_array();
        return $d;
    }

    function produk($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('produk');
        $d = $q->result_array();
        return $d;
    }

    function cari($keyword = "")
    {
        $this->db->or_like('nama_kategori', $keyword, 'both');
        $q = $this->db->get('kategori');
        $d = $q->result_array();
        return $d;
    }
}
