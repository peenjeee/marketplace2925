<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_member')) {
            redirect('/', 'refresh');
        }
        $this->load->model('Mtransaksi');
    }

    function index()
    {
        $id_member = $this->session->userdata('id_member');
        $data['transaksi'] = $this->Mtransaksi->transaksi_member_beli($id_member);
        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    public function detail($id_transaksi = NULL)
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        if (!$id_transaksi) {
            redirect('transaksi', 'refresh');
        }

        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);

        if (empty($data['transaksi']) || $data['transaksi']['id_member_beli'] !== $this->session->userdata('id_member')) {
            $this->session->set_flashdata('pesan_gagal', 'Transaksi tidak ditemukan.');
            redirect('transaksi', 'refresh');
        }

        $data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);
        $data['is_delivered'] = false;

        if ($data['transaksi'] && $data['transaksi']['status_transaksi'] == 'dikirim' && !empty($data['transaksi']['resi_ekspedisi'])) {
            $this->load->model('Mtracking');
            $kode_kurir = $this->get_courier_code($data['transaksi']['nama_ekspedisi']);

            if ($kode_kurir) {
                $hasil_lacak = $this->Mtracking->get_waybill_data($data['transaksi']['resi_ekspedisi'], $kode_kurir);

                if (isset($hasil_lacak['data']['summary']['status']) && strtolower($hasil_lacak['data']['summary']['status']) == 'delivered') {
                    $data['is_delivered'] = true;
                }
            }
        }

        $data['snapToken'] = "";
        $data['midtrans_status'] = null;

        $serverKey = 'SB-Mid-server-vSGDeATAred0_xa9vJqutlbl';
        $orderId = $data['transaksi']['kode_transaksi'];

        include_once 'midtrans-php/Midtrans.php';
        \Midtrans\Config::$serverKey = $serverKey;
        \Midtrans\Config::$isProduction = false;

        try {
            $status_from_midtrans = \Midtrans\Transaction::status($orderId);
            $data['midtrans_status'] = $status_from_midtrans;

            if ($status_from_midtrans->transaction_status == 'settlement' && $data['transaksi']['status_transaksi'] != 'lunas' && $data['transaksi']['status_transaksi'] != 'dikirim' && $data['transaksi']['status_transaksi'] != 'selesai') {
                $this->Mtransaksi->set_lunas($id_transaksi);
                
                if (!empty($data['transaksi']['id_kupon'])) {
                    $this->load->model('Mkupon');
                    $this->Mkupon->gunakan_kupon($data['transaksi']['id_kupon']);
                }

                $this->session->set_flashdata('pesan_sukses', 'Pembayaran berhasil dikonfirmasi.');
                redirect('transaksi/detail/' . $id_transaksi, 'refresh');
            }
        } catch (Exception $e) {
            log_message('error', 'Midtrans Status Check: ' . $e->getMessage());
        }

        if ($data['transaksi']['status_transaksi'] == 'pesan') {
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $data['transaksi']['total_transaksi'],
                ]
            ];

            try {
                $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
            } catch (Exception $e) {
                log_message('error', 'Midtrans Snap Token Error: ' . $e->getMessage());
            }
        }

        if ($this->input->post()) {
            $this->Mtransaksi->kirim_rating($this->input->post());
            $this->session->set_flashdata('pesan_sukses', 'Terima kasih atas rating Anda');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
        }

        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }

    private function get_courier_code($courier_name)
    {
        $courier_name = strtolower(trim($courier_name));
        $map = [
            'j&t express' => 'jnt',
            'jalur nugraha ekakurir (jne)' => 'jne',
            // 'sicepat' => 'sicepat',
            // 'ide' => 'ide',
            // 'sap' => 'sap',
            // 'ninja' => 'ninja',
            // 'tiki' => 'tiki',
            // 'lion' => 'lion',
            // 'anteraja' => 'anteraja',
            // 'pos' => 'pos',
            // 'ncs' => 'ncs',
            // 'rex' => 'rex',
            // 'rpx' => 'rpx',
            // 'sentral' => 'sentral',
            // 'star' => 'star',
            // 'wahana' => 'wahana',
            // 'dse' => 'dse'

        ];

        foreach ($map as $key => $value) {
            if (strpos($courier_name, $key) !== false) {
                return $value;
            }
        }
        return null;
    }

    public function batal($id_transaksi)
    {
        $transaksi = $this->Mtransaksi->detail($id_transaksi);

        if (empty($transaksi) || $transaksi['id_member_beli'] !== $this->session->userdata('id_member')) {
            $this->session->set_flashdata('pesan_gagal', 'Aksi tidak diizinkan.');
            redirect('transaksi', 'refresh');
        }

        $orderId = $transaksi['kode_transaksi'];
        $serverKey = 'SB-Mid-server-vSGDeATAred0_xa9vJqutlbl';

        include_once 'midtrans-php/Midtrans.php';
        \Midtrans\Config::$serverKey = $serverKey;
        \Midtrans\Config::$isProduction = false;

        try {
            \Midtrans\Transaction::cancel($orderId);
            $this->Mtransaksi->set_batal($id_transaksi);
            $this->session->set_flashdata('pesan_sukses', 'Transaksi berhasil dibatalkan.');
        } catch (Exception $e) {
            $this->Mtransaksi->set_batal($id_transaksi);
            log_message('error', 'Midtrans Cancel Error: ' . $e->getMessage());
            $this->session->set_flashdata('pesan_sukses', 'Transaksi telah dibatalkan di sistem Anda.');
        }

        redirect('transaksi/detail/' . $id_transaksi, 'refresh');
    }

    public function beli_lagi($id_transaksi)
    {
        $transaksi_detail = $this->Mtransaksi->transaksi_detail($id_transaksi);

        if (empty($transaksi_detail)) {
            $this->session->set_flashdata('pesan_gagal', 'Produk dari transaksi ini tidak ditemukan.');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
            return;
        }

        $items_added = 0;
        $id_member_beli = $this->session->userdata('id_member');

        foreach ($transaksi_detail as $produk) {
            if (!isset($produk['id_produk']) || empty($produk['id_produk'])) {
                log_message('error', 'Fitur Beli Lagi Gagal: id_produk kosong untuk item dalam transaksi ' . $id_transaksi);
                continue;
            }

            $this->db->select('id_member');
            $this->db->where('id_produk', $produk['id_produk']);
            $q_produk = $this->db->get('produk');
            $d_produk = $q_produk->row_array();

            if (empty($d_produk)) {
                log_message('error', 'Fitur Beli Lagi Gagal: Produk dengan ID ' . $produk['id_produk'] . ' tidak lagi tersedia.');
                continue;
            }

            $id_member_jual = $d_produk['id_member'];
            $id_produk = $produk['id_produk'];
            $this->db->where('id_member_beli', $id_member_beli);
            $this->db->where('id_produk', $id_produk);
            $q_keranjang = $this->db->get('keranjang');
            $d_keranjang = $q_keranjang->row_array();

            if (empty($d_keranjang)) {
                $data_keranjang = array(
                    'id_produk' => $id_produk,
                    'id_member_beli' => $id_member_beli,
                    'id_member_jual' => $id_member_jual,
                    'jumlah' => $produk['jumlah_beli']
                );
                $this->db->insert('keranjang', $data_keranjang);
            } else {
                $jumlah_baru = $d_keranjang['jumlah'] + $produk['jumlah_beli'];
                $data_update = array('jumlah' => $jumlah_baru);
                $this->db->where('id_member_beli', $id_member_beli);
                $this->db->where('id_produk', $id_produk);
                $this->db->update('keranjang', $data_update);
            }
            $items_added++;
        }

        if ($items_added > 0) {
            $this->session->set_flashdata('pesan_sukses', $items_added . ' jenis produk berhasil ditambahkan/diperbarui di keranjang.');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan produk ke keranjang. Produk mungkin sudah tidak tersedia.');
        }
        redirect('keranjang');
    }


    public function download_qr($id_transaksi)
    {
        $transaksi = $this->Mtransaksi->detail($id_transaksi);
        if (empty($transaksi) || $transaksi['id_member_beli'] !== $this->session->userdata('id_member')) {
            show_404();
            return;
        }

        $serverKey = 'SB-Mid-server-vSGDeATAred0_xa9vJqutlbl';
        $orderId = $transaksi['kode_transaksi'];

        include_once 'midtrans-php/Midtrans.php';
        \Midtrans\Config::$serverKey = $serverKey;
        \Midtrans\Config::$isProduction = false;

        try {
            $midtrans_status = \Midtrans\Transaction::status($orderId);
            $qr_url = '';
            if (isset($midtrans_status->transaction_id)) {
                if (isset($midtrans_status->acquirer) && $midtrans_status->acquirer == 'airpay shopee') {
                    $qr_url = 'https://api.sandbox.midtrans.com/v2/qris/shopeepay/sppq_' . $midtrans_status->transaction_id . '/qr-code';
                } elseif (isset($midtrans_status->payment_type) && $midtrans_status->payment_type == 'qris') {
                    $qr_url = 'https://api.sandbox.midtrans.com/v2/qris/' . $midtrans_status->transaction_id . '/qr-code';
                }
            }

            if (empty($qr_url)) {
                echo "URL QR Code tidak ditemukan.";
                return;
            }

            $ch = curl_init($qr_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $imageData = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode == 200 && !empty($imageData)) {
                header('Content-Description: File Transfer');
                header('Content-Type: image/png');
                header('Content-Disposition: attachment; filename="qris_' . $orderId . '.png"');
                header('Content-Length: ' . strlen($imageData));
                header('Pragma: public');
                flush();
                echo $imageData;
                exit();
            } else {
                echo "Gagal mengambil gambar QR Code.";
            }
        } catch (Exception $e) {
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
    }

    public function selesai($id_transaksi)
    {
        $transaksi = $this->Mtransaksi->detail($id_transaksi);

        if (empty($transaksi) || $transaksi['id_member_beli'] !== $this->session->userdata('id_member')) {
            $this->session->set_flashdata('pesan_gagal', 'Aksi tidak diizinkan atau transaksi tidak ditemukan.');
            redirect('transaksi', 'refresh');
        }

        if ($transaksi['status_transaksi'] == 'dikirim') {
            $this->Mtransaksi->set_selesai($id_transaksi);
            $this->session->set_flashdata('pesan_sukses', 'Transaksi telah diselesaikan. Terima kasih telah berbelanja!');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Status transaksi tidak dapat diubah.');
        }
        redirect('transaksi/detail/' . $id_transaksi, 'refresh');
    }

    public function lacak($id_transaksi)
    {
        $this->load->model('Mtransaksi');
        $this->load->model('Mtracking');
        $transaksi = $this->Mtransaksi->detail($id_transaksi);

        if (!$transaksi || empty($transaksi['resi_ekspedisi'])) {
            redirect('transaksi');
        }

        $kode_kurir = $this->get_courier_code($transaksi['nama_ekspedisi']);
        $hasil_lacak = $this->Mtracking->get_waybill_data($transaksi['resi_ekspedisi'], $kode_kurir);
        $data['title'] = 'Lacak Pengiriman';
        $data['transaksi'] = $transaksi;
        $data['hasil_lacak'] = $hasil_lacak;
        $this->load->view('header');
        $this->load->view('transaksi_lacak', $data);
        $this->load->view('footer');
    }
}
