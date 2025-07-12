<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mslider extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('slider');
        $d = $q->result_array();
        return $d;
    }
}
