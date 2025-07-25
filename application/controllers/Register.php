<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        $this->load->model('Mongkir');
        $data['distik'] = array();
        $this->form_validation->set_rules('email_member', 'email', 'required|is_unique[member.email_member]');
        $this->form_validation->set_rules('password_member', 'password', 'required');
        $this->form_validation->set_rules('nama_member', 'nama', 'required');
        $this->form_validation->set_rules('alamat_member', 'alamat', 'required');
        $this->form_validation->set_rules('wa_member', 'wa', 'required');
        $this->form_validation->set_rules('kode_distrik_member', 'kode distrik member', 'required');
        $this->form_validation->set_rules('nama_distrik_member', 'nama distrik member', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar');

        if ($this->form_validation->run() == TRUE) {
            $m['email_member'] = $this->input->post('email_member');
            $m['password_member'] = $this->input->post('password_member');
            $m['password_member'] = sha1($m['password_member']);
            $m['nama_member'] = $this->input->post('nama_member');
            $m['alamat_member'] = $this->input->post('alamat_member');
            $m['wa_member'] = $this->input->post('wa_member');
            $m['kode_distrik_member'] = $this->input->post('kode_distrik_member');
            $m['nama_distrik_member'] = $this->input->post('nama_distrik_member');
            $this->load->model('Mmember');
            $this->Mmember->register($m);
            $this->session->set_flashdata('pesan_sukses', 'Registrasi berhasil, silahkan login');
            redirect('/', 'refresh');
        }
        $this->load->view('header');
        $this->load->view('register', $data);
        $this->load->view('footer');
    }

    function cari_distrik()
    {
        if ($this->input->post('keyword')) {
            $keyword = $this->input->post('keyword');
            $keyword = urlencode($keyword);
            $url = 'https://rajaongkir.komerce.id/api/v1/destination/domestic-destination?search=' . $keyword . '&limit=10&offset=0';
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: hKdhw8N20b74eea7634ed136RlKka4S9"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $response = json_decode($response, true);
                if (isset($response['data'])) {
                    echo '<option value="">Pilih</option>';
                    foreach ($response['data'] as $key => $value) {
                        echo "<option value='" . $value['id'] . "' " . ($this->input->post('kode_distrik_member') == $value['id'] ? 'selected' : '') . ">";
                        echo $value['label'];
                        echo "</option>";
                    }
                }
            }
        }
    }
}
