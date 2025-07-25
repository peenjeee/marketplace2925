<?php if ($transaksi) : ?>

    <style>
        /* Styling untuk Rating Bintang (tetap dibutuhkan) */
        .stars a {
            text-decoration: none;
            font-size: 1.5rem;
            color: #ccc;
            transition: color 0.2s;
        }

        .stars a:hover,
        .stars a.active {
            color: var(--color-accent-flame);
        }

        .stars:hover a:hover~a {
            color: #ccc !important;
        }
    </style>

    <div class="container my-5">
        <!-- Header Transaksi -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fs-1 mb-0">Detail Transaksi</h2>
                <p class="font-ui text-muted">ID: <?php echo $transaksi['id_transaksi'] ?></p>
            </div>
            <span class="font-ui p-2 fs-5" style="background-color: var(--color-accent-blue); color: white; border: 2px solid var(--color-text);"><?php echo $transaksi['status_transaksi'] ?></span>
        </div>

        <!-- Detail Pengiriman & Penerima -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card card-brutalist p-3 h-100">
                    <h5 class="font-ui">PENGIRIM</h5>
                    <hr>
                    <p class="mb-1 fw-bold"><?php echo $transaksi['nama_pengirim'] ?></p>
                    <p class="mb-1 text-muted"><?php echo $transaksi['wa_pengirim'] ?></p>
                    <p class="mb-1"><?php echo $transaksi['alamat_pengirim'] ?></p>
                    <p class="mb-0 text-muted"><?php echo $transaksi['distrik_pengirim'] ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-brutalist p-3 h-100">
                    <h5 class="font-ui">PENERIMA</h5>
                    <hr>
                    <p class="mb-1 fw-bold"><?php echo $transaksi['nama_penerima'] ?></p>
                    <p class="mb-1 text-muted"><?php echo $transaksi['wa_penerima'] ?></p>
                    <p class="mb-1"><?php echo $transaksi['alamat_penerima'] ?></p>
                    <p class="mb-0 text-muted"><?php echo $transaksi['distrik_penerima'] ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-brutalist p-3 h-100">
                    <h5 class="font-ui">EKSPEDISI</h5>
                    <hr>
                    <p class="mb-1 fw-bold"><?php echo $transaksi['nama_ekspedisi'] ?> (<?php echo $transaksi['layanan_ekspedisi'] ?>)</p>
                    <p class="mb-1">Resi: <span class="text-muted"><?php echo $transaksi['resi_ekspedisi'] ? $transaksi['resi_ekspedisi'] : '-' ?></span></p>
                    <?php if (!empty($transaksi['resi_ekspedisi'])): ?>
                        <a href="<?= base_url('transaksi/lacak/' . $transaksi['id_transaksi']) ?>" class="btn btn-hw-secondary mt-2">Lacak Paket</a>
                    <?php endif; ?>
                    <?php if ($is_delivered): ?>
                        <form method="post" action="<?php echo base_url('transaksi/selesai/' . $transaksi['id_transaksi']) ?>" class="mt-2">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <button type="submit" class="btn btn-hw-primary w-100">Paket Diterima</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="card card-brutalist p-2 mb-4">
            <table class="table table-borderless" style="margin-bottom: 0;">
                <thead class="font-ui">
                    <tr style="border-bottom: 2px solid var(--color-text);">
                        <th class="p-3">Produk</th>
                        <th class="p-3">Harga</th>
                        <th class="p-3 text-center">Jumlah</th>
                        <th class="p-3 text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi_detail as $value) : ?>
                        <tr style="border-bottom: 1px solid var(--color-border);">
                            <td class="p-3 align-middle fw-bold"><?php echo $value['nama_beli'] ?></td>
                            <td class="p-3 align-middle">Rp. <?php echo number_format($value['harga_beli']) ?></td>
                            <td class="p-3 align-middle text-center"><?php echo number_format($value['jumlah_beli']) ?></td>
                            <td class="p-3 align-middle text-end">Rp. <?php echo number_format($value['harga_beli'] * $value['jumlah_beli']) ?></td>
                        </tr>
                    <?php endforeach ?>
                    <tr style="border-top: 2px solid var(--color-text);">
                        <td colspan="3" class="p-3 fw-bold">Total Belanja</td>
                        <td class="p-3 text-end fw-bold">Rp. <?php echo number_format($transaksi['belanja_transaksi']) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="p-3">Ongkos Kirim</td>
                        <td class="p-3 text-end">Rp. <?php echo number_format($transaksi['ongkir_transaksi']) ?></td>
                    </tr>
                    <?php if ($transaksi['diskon_transaksi'] > 0) : ?>
                        <tr class="text-success">
                            <td colspan="3" class="p-3">Diskon Kupon</td>
                            <td class="p-3 text-end">- Rp. <?php echo number_format($transaksi['diskon_transaksi']) ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr style="border-top: 2px solid var(--color-text); background-color: #f0f0f0;">
                        <td colspan="3" class="p-3 fs-5 fw-bold font-ui">TOTAL DIBAYAR</td>
                        <td class="p-3 text-end fs-5 fw-bold font-ui">Rp. <?php echo number_format($transaksi['total_transaksi']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Detail Pembayaran & Aksi -->
        <div class="card card-brutalist p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="font-ui mb-0">DETAIL PEMBAYARAN</h5>
                <div>
                    <?php
                    $is_pending = ($midtrans_status && $midtrans_status->transaction_status == 'pending');
                    $show_payment_button = ($transaksi['status_transaksi'] == 'pesan' && !$is_pending);
                    ?>
                    <?php if ($show_payment_button && !empty($snapToken)) : ?>
                        <a href="#" id="pay-button" class="btn btn-hw-primary">Bayar</a>
                    <?php elseif ($is_pending) : ?>
                        <a href="#" onclick="window.location.reload(true);" class="btn btn-hw-secondary">Cek Status</a>
                    <?php endif; ?>

                    <?php if ($transaksi['status_transaksi'] == 'pesan'): ?>
                        <a href="#" id="cancel-button" data-url="<?php echo base_url('transaksi/batal/' . $transaksi['id_transaksi']) ?>" class="btn btn-hw-secondary">Batalkan</a>
                    <?php endif; ?>

                    <?php if ($transaksi['status_transaksi'] == 'selesai' || $transaksi['status_transaksi'] == 'lunas' || $transaksi['status_transaksi'] == 'batal'): ?>
                        <a href="<?php echo base_url('transaksi/beli_lagi/' . $transaksi['id_transaksi']) ?>" class="btn btn-hw-primary">Beli Lagi</a>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <?php if ($midtrans_status): ?>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="font-ui" width="40%">Status Pembayaran</td>
                                <td class="fw-bold">: <?php echo ucfirst(str_replace('_', ' ', $midtrans_status->transaction_status)); ?></td>
                            </tr>
                            <tr>
                                <td class="font-ui">Tipe Pembayaran</td>
                                <td>: <?php echo ucwords(str_replace('_', ' ', $midtrans_status->payment_type)); ?></td>
                            </tr>
                            <?php if (isset($midtrans_status->payment_code)): ?>
                                <tr>
                                    <td class="font-ui">Kode Pembayaran</td>
                                    <td class="fw-bold">: <?php echo $midtrans_status->payment_code; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if (isset($midtrans_status->biller_code)): ?>
                                <tr>
                                    <td class="font-ui">Kode Perusahaan</td>
                                    <td>: <?php echo $midtrans_status->biller_code; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-ui">Nomor Tagihan</td>
                                    <td>: <?php echo $midtrans_status->bill_key; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if (isset($midtrans_status->va_numbers) && is_array($midtrans_status->va_numbers) && count($midtrans_status->va_numbers) > 0): ?>
                                <tr>
                                    <td class="font-ui">Virtual Account</td>
                                    <td class="fw-bold">: <?php echo strtoupper($midtrans_status->va_numbers[0]->bank) . ' - ' . $midtrans_status->va_numbers[0]->va_number; ?></td>
                                </tr>
                            <?php elseif (isset($midtrans_status->permata_va_number)): ?>
                                <tr>
                                    <td class="font-ui">Virtual Account</td>
                                    <td class="fw-bold">: PERMATA - <?php echo $midtrans_status->permata_va_number; ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="font-ui">Jumlah</td>
                                <td>: Rp. <?php echo number_format(explode('.', $midtrans_status->gross_amount)[0]); ?></td>
                            </tr>
                            <?php if ($midtrans_status->transaction_status == 'pending'): ?>
                                <tr>
                                    <td class="font-ui">Batas Waktu</td>
                                    <td>: <?php echo date('d M Y, H:i:s', strtotime($midtrans_status->expiry_time)); ?></td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                    <div class="col-md-4 text-center">
                        <?php
                        $qr_url = '';
                        if (isset($midtrans_status->transaction_id)) {
                            if (isset($midtrans_status->acquirer) && $midtrans_status->acquirer == 'airpay shopee') {
                                $qr_url = 'https://api.sandbox.midtrans.com/v2/qris/shopeepay/sppq_' . $midtrans_status->transaction_id . '/qr-code';
                            } elseif (isset($midtrans_status->payment_type) && $midtrans_status->payment_type == 'qris') {
                                $qr_url = 'https://api.sandbox.midtrans.com/v2/qris/' . $midtrans_status->transaction_id . '/qr-code';
                            }
                        }
                        ?>
                        <?php if (!empty($qr_url)): ?>
                            <img src="<?php echo $qr_url; ?>" alt="QR Code Pembayaran" class="img-fluid" style="border: 2px solid var(--color-text); padding: 5px;">
                            <a href="<?php echo base_url('transaksi/download_qr/' . $transaksi['id_transaksi']) ?>" class="btn btn-hw-secondary btn-sm w-100 mt-2">Unduh QR Code</a>
                        <?php endif; ?>

                        <?php if (isset($midtrans_status->shopeepay_deeplink_redirect_url)): ?>
                            <a href="<?php echo $midtrans_status->shopeepay_deeplink_redirect_url; ?>" class="btn btn-hw-secondary w-100">Bayar dengan ShopeePay</a>
                        <?php endif; ?>

                        <?php if (isset($midtrans_status->gopay_deeplink_redirect_url)): ?>
                            <a href="<?php echo $midtrans_status->gopay_deeplink_redirect_url; ?>" class="btn btn-hw-secondary w-100 mt-2">Bayar dengan GoPay</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada detail pembayaran. Silakan klik tombol "Bayar" untuk melanjutkan.</p>
            <?php endif; ?>
        </div>

        <!-- Ulasan Produk -->
        <?php if ($transaksi['status_transaksi'] == 'selesai'): ?>
            <div class="card card-brutalist p-4 mt-4">
                <h5 class="font-ui">ULASAN PRODUK</h5>
                <hr>
                <form method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <?php $belum_diisi = 0; ?>
                    <?php foreach ($transaksi_detail as $k => $v) : ?>
                        <div class="mb-3 p-3" style="border: 2px solid var(--color-border);">
                            <h6 class="fw-bold"><?php echo $v['nama_beli'] ?></h6>
                            <?php if (empty($v['waktu_rating'])) : ?>
                                <?php $belum_diisi++; ?>
                                <div class="mb-2">
                                    <label class="form-label">Beri Rating:</label>
                                    <div class="stars" data-k="<?php echo $k ?>">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <a href="#" class="star-<?php echo $i ?>" data-value="<?php echo $i ?>"><i class="bi bi-star"></i></a>
                                        <?php endfor ?>
                                    </div>
                                    <input class="jrt" type="hidden" name="jumlah_rating[]" data-k="<?php echo $k ?>" required>
                                    <input type="hidden" name="id_transaksi_detail[]" value="<?php echo $v['id_transaksi_detail'] ?>">
                                </div>
                                <div>
                                    <label class="form-label">Ulasan Anda:</label>
                                    <textarea name="ulasan_rating[]" class="form-control" rows="2" placeholder="Tulis ulasan Anda di sini..."></textarea>
                                </div>
                            <?php else: ?>
                                <div>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="bi <?php echo ($i <= $v['jumlah_rating']) ? 'bi-star-fill text-warning' : 'bi-star'; ?>"></i>
                                    <?php endfor ?>
                                </div>
                                <p class="text-muted mt-1">"<?php echo htmlspecialchars($v['ulasan_rating']); ?>"</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <?php if ($belum_diisi > 0) : ?>
                        <button class="btn btn-hw-primary w-100">Kirim Ulasan</button>
                    <?php endif; ?>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <!-- Menghapus HTML Modal Kustom -->

    <?php if (!empty($snapToken)): ?>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo $this->config->item('midtrans_client_key') ?>"></script>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pengaturan default untuk SweetAlert dengan gaya brutalis
            const swalBrutalist = Swal.mixin({
                customClass: {
                    popup: 'card card-brutalist',
                    title: 'font-ui',
                    confirmButton: 'btn btn-hw-primary',
                    cancelButton: 'btn btn-hw-secondary'
                },
                buttonsStyling: false,
                background: 'var(--color-background)' // FIX: Menambahkan background agar tidak transparan
            });

            // Logika Tombol Bayar (Snap)
            const payButton = document.getElementById('pay-button');
            if (payButton) {
                payButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const snapToken = '<?= !empty($snapToken) ? $snapToken : "" ?>';
                    if (typeof snap === 'undefined' || !snapToken) {
                        swalBrutalist.fire('Error', 'Layanan pembayaran gagal dimuat. Silakan muat ulang halaman.', 'error');
                        return;
                    }
                    snap.pay(snapToken, {
                        onSuccess: function(result) {
                            swalBrutalist.fire('Sukses', 'Pembayaran berhasil! Halaman akan dimuat ulang.', 'success')
                                .then(() => window.location.reload(true));
                        },
                        onPending: function(result) {
                            swalBrutalist.fire('Menunggu', 'Pembayaran Anda sedang diproses. Halaman akan dimuat ulang.', 'info')
                                .then(() => window.location.reload(true));
                        },
                        onError: function(result) {
                            swalBrutalist.fire('Gagal', 'Gagal membuka jendela pembayaran. Silakan coba lagi.', 'error');
                        },
                        onClose: function() {
                            swalBrutalist.fire('Info', 'Jendela pembayaran ditutup. Halaman akan dimuat ulang untuk memperbarui status.', 'info')
                                .then(() => window.location.reload(true));
                        }
                    });
                });
            }

            // Logika Tombol Batal
            const cancelButton = document.getElementById('cancel-button');
            if (cancelButton) {
                cancelButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('data-url');
                    swalBrutalist.fire({
                        title: 'Konfirmasi Pembatalan',
                        text: 'Apakah Anda yakin ingin membatalkan pesanan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Lanjutkan',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            }

            // Logika Rating Bintang
            document.querySelectorAll('.stars a').forEach(star => {
                star.addEventListener('click', function(e) {
                    e.preventDefault();
                    let k = this.closest('.stars').getAttribute('data-k');
                    let value = this.getAttribute('data-value');
                    document.querySelector('.jrt[data-k="' + k + '"]').value = value;
                    this.closest('.stars').querySelectorAll('a').forEach((s, index) => {
                        s.querySelector('i').className = index < value ? 'bi bi-star-fill' : 'bi bi-star';
                        s.style.color = index < value ? 'var(--color-accent-flame)' : '#ccc';
                    });
                });
            });
        });
    </script>

<?php else: ?>
    <div class="container text-center py-5">
        <div class="card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">TRANSAKSI TIDAK DITEMUKAN.</h2>
            <div class="mt-4">
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-hw-primary">Kembali ke Daftar Transaksi</a>
            </div>
        </div>
    </div>
<?php endif; ?>