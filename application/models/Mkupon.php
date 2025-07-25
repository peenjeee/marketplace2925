<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkupon extends CI_Model
{
    function cek_kupon($kode_kupon, $total_belanja)
    {
        $this->db->where('kode_kupon', $kode_kupon);
        $this->db->where('status_kupon', 'aktif');
        $this->db->where('kuota_kupon >', 0);
        $this->db->where('tanggal_mulai <=', date('Y-m-d'));
        $this->db->where('tanggal_selesai >=', date('Y-m-d'));
        $this->db->where('minimal_belanja <=', $total_belanja);
        $query = $this->db->get('kupon');
        return $query->row_array();
    }

    function gunakan_kupon($id_kupon)
    {
        $this->db->set('kuota_kupon', 'kuota_kupon - 1', FALSE);
        $this->db->where('id_kupon', $id_kupon);
        $this->db->update('kupon');
    }
}
