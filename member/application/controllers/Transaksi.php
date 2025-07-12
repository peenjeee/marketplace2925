<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_member')) {
            redirect('/', 'refresh');
        }
    }
    function index()
    {

        $id_member = $this->session->userdata('id_member');
        $this->load->model('Mtransaksi');
        $data['transaksi'] = $this->Mtransaksi->transaksi_member_beli($id_member);
        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi)
    {

        $this->load->model('Mtransaksi');
        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);
        if ($data['transaksi']['id_member_beli'] !== $this->session->userdata('id_member')) {
            $this->session->set_flashdata('pesan_gagal', 'Tidak valid');
            redirect('transaksi', 'refresh');
        }
        $data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);

        $snapToken = "";
        $data['cekmidtrans'] = array();

        if ($data['transaksi']['status_transaksi'] == 'pesan') {

            include 'midtrans-php//Midtrans.php';

            \Midtrans\Config::$serverKey = 'SB-Mid-server-vSGDeATAred0_xa9vJqutlbl';
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params['transaction_details']['order_id'] = $data['transaksi']['kode_transaksi'];
            $params['transaction_details']['gross_amount'] = $data['transaksi']['total_transaksi'];



            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
            } catch (Exception $e) {
            }

            $data['snapToken'] = $snapToken;


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $data['transaksi']['kode_transaksi'] . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "authorization: Basic U0ItTWlkLXNlcnZlci12U0dEZUFUQXJlZDBfeGE5dkpxdXRsYmw6YW1pa29t"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $responsi = json_decode($response, true);
                if (isset($responsi['status_code']) && in_array($responsi['status_code'], [200, 201])) {
                    $data['cekmidtrans'] = $responsi;

                    if ($responsi['transaction_status'] == 'settlement') {

                        $this->Mtransaksi->set_lunas($id_transaksi);
                        $this->session->set_flashdata('pesan_sukses', 'Transaksi berhasil');
                        redirect('transaksi/detail/' . $id_transaksi, 'refresh');
                    }
                }
            }
        }

        if ($this->input->post()) {
            $this->Mtransaksi->kirim_rating($this->input->post());
            $this->session->set_flashdata('pesan_sukses', 'Terima kasih atas rating anda');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
        }

        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }
}
