<?php

class Martikel extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get('artikel');
        $d = $q->result_array();
        return $d;
    }

    function simpan($inputan)
    {
        $config['upload_path'] = $this->config->item('assets_artikel');
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heic|heif|svg|webp';

        $this->load->library('upload', $config);

        $ngupload = $this->upload->do_upload('foto_artikel');

        if ($ngupload) {
            $inputan['foto_artikel'] = $this->upload->data('file_name');
        }

        $this->db->insert('artikel', $inputan);
    }

    function hapus($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('artikel');
    }

    function detail($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        $q = $this->db->get('artikel');
        $d = $q->row_array();
        return $d;
    }

    function edit($inputan, $id_artikel)
    {
        $config['upload_path'] = $this->config->item('assets_artikel');
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heic|heif|svg|webp';

        $this->load->library('upload', $config);

        $ngupload = $this->upload->do_upload('foto_artikel');

        if ($ngupload) {
            $inputan['foto_artikel'] = $this->upload->data('file_name');
        }

        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel', $inputan);
    }
}
