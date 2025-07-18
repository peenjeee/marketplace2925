<?php if ($transaksi) : ?>
    <div class="container mt-4">
        <div class="row mb-5">
            <div class="col-md-3">
                <h5 class="fw-bold fs-3">Transaksi</h5>
                <p class="fw-medium">ID : <?php echo $transaksi['id_transaksi'] ?></p>
                <p class="fw-medium">Tanggal : <?php echo date('d M Y H:i:s', strtotime($transaksi['tanggal_transaksi'])) ?></p>
                <span class="badge bg-primary card-neoraised fs-6"><?php echo $transaksi['status_transaksi'] ?></span>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold fs-3">Pengirim</h5>
                <p class="fw-medium"><?php echo $transaksi['nama_pengirim'] ?>, <?php echo $transaksi['wa_pengirim'] ?></p>
                <p class="fw-medium"><?php echo $transaksi['alamat_pengirim'] ?>, <?php echo $transaksi['distrik_pengirim'] ?></p>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold fs-3">Penerima</h5>
                <p class="fw-medium"><?php echo $transaksi['nama_penerima'] ?>, <?php echo $transaksi['wa_penerima'] ?></p>
                <p class="fw-medium"><?php echo $transaksi['alamat_penerima'] ?>, <?php echo $transaksi['distrik_penerima'] ?></p>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold fs-3">Ekspedisi</h5>
                <p class="fw-medium"><?php echo $transaksi['nama_ekspedisi'] ?>, <?php echo $transaksi['layanan_ekspedisi'] ?></p>
                <p class="fw-medium"><?php echo $transaksi['estimasi_ekspedisi'] ?> Hari, <?php echo $transaksi['berat_ekspedisi'] ?> Gram</p>
                <!-- <form method="post">
                <div class="input-group">
                    <input type="text" class="form-control card-neoraised fw-light" placeholder="Masukan Resi" name="resi_ekspedisi" value="<?php echo $transaksi['resi_ekspedisi'] ?>">
                    <?php if ($transaksi['status_transaksi'] == 'lunas') : ?>
                        <button class="btn btn-primary btn-neoraised">Kirim</button>
                    <?php endif ?>
                </div>
            </form> -->
            </div>
        </div>

        <h5 class="fw-bold fs-4">Produk</h5>
        <table class="table table-borderless card-neoraised border border-dark border-3">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi_detail as $key => $value) : ?>
                    <tr>
                        <td class="fw-medium"><?php echo $value['nama_beli'] ?></td>
                        <td class="fw-medium"><?php echo number_format($value['harga_beli']) ?></td>
                        <td class="fw-medium"><?php echo number_format($value['jumlah_beli']) ?></td>
                        <td class="fw-medium"><?php echo number_format($value['harga_beli'] * $value['jumlah_beli']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="fw-medium">Total Belanja</td>
                    <th><?php echo number_format($transaksi['belanja_transaksi']) ?></th>
                </tr>
                <tr>
                    <td colspan="3" class="fw-medium">Ongkos Kirim</td>
                    <th><?php echo number_format($transaksi['ongkir_transaksi']) ?></th>
                </tr>
                <tr>
                    <td colspan="3" class="fw-medium">Total dibayar</td>
                    <th><?php echo number_format($transaksi['total_transaksi']) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
<?php else: ?>
    <h1 class="fw-bold text-center mt-5">Transaksi tidak ditemukan.</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="<?= base_url('transaksi'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
    </div>
<?php endif; ?>