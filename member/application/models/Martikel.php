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
}
