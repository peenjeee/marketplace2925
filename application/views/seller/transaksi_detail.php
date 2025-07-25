<?php if ($transaksi) : ?>
    <div class="container my-5">
        <!-- Header Transaksi -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fs-1 mb-0">Detail Transaksi Penjualan</h2>
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
                    <?php if ($transaksi['status_transaksi'] == 'lunas' || $transaksi['status_transaksi'] == 'dikirim') : ?>
                        <form method="post">
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Masukkan Resi..." name="resi_ekspedisi" value="<?php echo $transaksi['resi_ekspedisi'] ?>">
                                <button class="btn btn-hw-secondary">Kirim</button>
                            </div>
                            <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('resi_ekspedisi'); ?></span>
                        </form>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- Detail Produk & Pembayaran -->
        <div class="card card-brutalist p-2">
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
                    <tr style="border-top: 2px solid var(--color-text); background-color: #f0f0f0;">
                        <td colspan="3" class="p-3 fs-5 fw-bold font-ui">TOTAL DITERIMA</td>
                        <td class="p-3 text-end fs-5 fw-bold font-ui">Rp. <?php echo number_format($transaksi['total_transaksi']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
<?php else: ?>
    <div class="container text-center py-5">
        <div class="card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">TRANSAKSI TIDAK DITEMUKAN.</h2>
            <div class="mt-4">
                <a href="<?= base_url('seller/transaksi'); ?>" class="btn btn-hw-primary">Kembali</a>
            </div>
        </div>
    </div>
<?php endif; ?>