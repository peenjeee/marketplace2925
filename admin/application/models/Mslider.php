<?php

class Mslider extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('slider');
        $d = $q->result_array();
        return $d;
    }

    function simpan($inputan)
    {
        $config['upload_path'] = $this->config->item('assets_slider');
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heic|heif|svg|webp';

        $this->load->library('upload', $config);

        $ngupload = $this->upload->do_upload('foto_slider');

        if ($ngupload) {
            $inputan['foto_slider'] = $this->upload->data('file_name');
        }

        $this->db->insert('slider', $inputan);
    }

    function hapus($id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        $this->db->delete('slider');
    }

    function detail($id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        $q = $this->db->get('slider');
        $d = $q->row_array();
        return $d;
    }

    function edit($inputan, $id_slider)
    {
        $config['upload_path'] = $this->config->item('assets_slider');
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heic|heif|svg|webp';

        $this->load->library('upload', $config);

        $ngupload = $this->upload->do_upload('foto_slider');

        if ($ngupload) {
            $inputan['foto_slider'] = $this->upload->data('file_name');
        }

        $this->db->where('id_slider', $id_slider);
        $this->db->update('slider', $inputan);
    }
}
