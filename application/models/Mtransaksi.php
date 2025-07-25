<?php

class Mtransaksi extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('transaksi');
        $d = $q->result_array();
        return $d;
    }

    function transaksi_member_jual($id_member)
    {
        $this->db->where('id_member_jual', $id_member);
        $q = $this->db->get('transaksi');
        $d = $q->result_array();
        return $d;
    }

    function transaksi_member_beli($id_member)
    {
        $this->db->where('id_member_beli', $id_member);
        $q = $this->db->get('transaksi');
        $d = $q->result_array();
        return $d;
    }

    function detail($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $q = $this->db->get('transaksi');
        $d = $q->row_array();
        return $d;
    }

    function transaksi_detail($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $q = $this->db->get('transaksi_detail');
        $d = $q->result_array();
        return $d;
    }

    function set_lunas($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->set('status_transaksi', 'lunas');
        $this->db->update('transaksi');
    }

    function set_batal($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->set('status_transaksi', 'batal');
        $this->db->update('transaksi');
    }

    function update_resi($id_transaksi, $resi)
    {
        $input['status_transaksi'] = 'dikirim';
        $input['resi_ekspedisi'] = $resi;
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $input);
    }

    function kirim_rating($input)
    {
        foreach ($input['id_transaksi_detail'] as $key => $id) {
            $m['waktu_rating'] = date('Y-m-d H:i:s');
            $m['jumlah_rating'] = $input['jumlah_rating'][$key];
            $m['ulasan_rating'] = $input['ulasan_rating'][$key];

            $this->db->where('id_transaksi_detail', $id);
            $this->db->update('transaksi_detail', $m);
        }
    }

    function set_selesai($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->set('status_transaksi', 'selesai');
        $this->db->update('transaksi');
    }
}
