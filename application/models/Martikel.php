<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Martikel extends CI_Model
{
    function tampil_artikel_terbaru()
    {
        $this->db->order_by('id_artikel', 'desc');
        $q = $this->db->get('artikel', 4, 0);
        $d = $q->result_array();
        return $d;
    }

    function tampil_artikel()
    {
        $this->db->order_by('id_artikel', 'desc');
        $q = $this->db->get('artikel');
        $d = $q->result_array();
        return $d;
    }

    function tampil_artikel_detail()
    {
        $id_artikel = $this->uri->segment(3);
        $this->db->where('id_artikel', $id_artikel);
        $q = $this->db->get('artikel');
        $d = $q->row_array();
        return $d;
    }

    function cari($keyword = "")
    {
        $this->db->or_like('judul_artikel', $keyword, 'both');
        $this->db->or_like('isi_artikel', $keyword, 'both');
        $q = $this->db->get('artikel');
        $d = $q->result_array();
        return $d;
    }
}
