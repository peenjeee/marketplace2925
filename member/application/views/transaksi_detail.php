<style>
    .stars a {
        display: inline-block;
        padding-right: 4px;
        text-decoration: none;
        margin: 0;
    }

    .stars a:after {
        position: relative;
        font-size: 18px;
        font-family: 'FontAwesome', serif;
        display: block;
        content: "\f005";
        color: #9e9e9e;
    }

    span {
        font-size: 0;
    }

    .stars a:hover~a:after {
        color: #9e9e9e !important;
    }

    span.active a.active~a:after {
        color: #9e9e9e;
    }

    span:hover a:after {
        color: var(--neostrap-warning) !important;
    }

    span.active a:after,
    .stars a.active:after {
        color: var(--neostrap-warning);
    }
</style>

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
            <h6>Resi : <?php echo $transaksi['resi_ekspedisi'] ?></h6>

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

    <!-- <?php if (!empty($cekmidtrans)): ?>
        <div class="row" id="payment-details" style="display: none;">
            <div class="col-md-4">
                <table class="table table-borderless card-neoraised border border-dark border-3">
                    <tr>
                        <td class="fw-medium">Total Tagihan</td>
                        <td><?php echo number_format($cekmidtrans['gross_amount']) ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Transfer Bank</td>
                        <td><?php echo $cekmidtrans['va_numbers'][0]['bank'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">VA Number</td>
                        <td><?php echo $cekmidtrans['va_numbers'][0]['va_number'] ?></td>
                    </tr>

                    <tr>
                        <td class="fw-medium">Status Pembayaran</td>
                        <td class="fw-medium"><?php echo $cekmidtrans['transaction_status'] ?> <br>
                            <?php if ($cekmidtrans['transaction_status'] == 'pending') : ?>
                                Segera lakukan pembayaran, sebelum batas akhir pembayaran
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Waktu Transaksi</td>
                        <td><?php echo $cekmidtrans['transaction_time'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Batas Akhir Pembayaran</td>
                        <td><?php echo $cekmidtrans['expiry_time'] ?></td>
                    </tr>
                </table>

                <button id="pay-button" class="btn btn-success btn-neoraised fw-bold mt-3">
                    <i class="bi bi-credit-card"></i> Bayar Sekarang
                </button>
            </div>
        </div>
    <?php endif ?> -->

    <?php if (empty($cekmidtrans)): ?>
        <div class="row" id="payment-details" style="display: none;">
            <div class="col-md-4">

                <button id="pay-button" class="btn btn-success btn-neoraised fw-bold mt-3">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    <?php endif ?>


    <?php if (!empty($snapToken)) : ?>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-SqXSXOnl9HdKvJq1"></script>
        <script type="text/javascript">
            function triggerSnapPay() {
                snap.pay('<?= $snapToken ?>', {
                    onSuccess: function(result) {
                        window.location.href = "<?= base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>";
                    },
                    onPending: function(result) {
                        window.location.href = "<?= base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>";
                    },
                    onError: function(result) {
                        window.location.href = "<?= base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>";
                    },
                    onClose: function() {
                        // **Saat popup ditutup (klik 'X'), tampilkan detail pembayaran**
                        $('#payment-details').show();
                    }
                });
            }

            $(document).ready(function() {
                triggerSnapPay();

                $('#pay-button').on('click', function(e) {
                    e.preventDefault();
                    triggerSnapPay();
                });
            });
        </script>
    <?php endif ?>



    <?php if ($transaksi['status_transaksi'] == 'lunas'): ?>
        <form method="post">
            <div class="container">
                <h6 class="mt-5 mb-3 fw-bold fs-4">Ulasan</h6>
                <?php $belumdiisi = 0; ?>
                <?php foreach ($transaksi_detail as $k => $v) : ?>

                    <?php if (empty($v['jumlah_rating'])) : ?>
                        <?php $belumdiisi++; ?>
                        <div class="mb-2">
                            <h6 class="fw-medium"><?php echo $v['nama_beli'] ?></h6>
                            <p class="stars" k="<?php echo $k ?>">

                                <span k="<?php echo $k ?>">
                                    <a k="<?php echo $k ?>" class="star-1" href="#">1</a>
                                    <a k="<?php echo $k ?>" class="star-2" href="#">2</a>
                                    <a k="<?php echo $k ?>" class="star-3" href="#">3</a>
                                    <a k="<?php echo $k ?>" class="star-4" href="#">4</a>
                                    <a k="<?php echo $k ?>" class="star-5" href="#">5</a>
                                </span>
                            </p>
                            <input class="jrt" type="hidden" name="jumlah_rating[]" k="<?php echo $k ?>">
                            <input type="hidden" name="id_transaksi_detail[]" value="<?php echo $v['id_transaksi_detail'] ?>">
                            <textarea name="ulasan_rating[]" id="" class="form-control card-neoraised fw-light mb-3" cols="30" rows="3" placeholder="Tulis ulasan anda disini"></textarea>
                        </div>

                    <?php endif ?>

                    <?php if (!empty($v['jumlah_rating'])) : ?>
                        <h6 class="fw-medium"><?php echo $v['nama_beli'] ?></h6>
                        <?php foreach (range(1, $v['jumlah_rating']) as $kuy => $jum) : ?>
                            <i class="bi bi-star-fill text-warning"></i>
                        <?php endforeach ?>
                        <div class="fw-light fs-6 text-muted mt-1 mb-3">
                            <?php echo $v['ulasan_rating'] ?>
                        </div>
                    <?php endif ?>




                <?php endforeach ?>

                <?php if ($belumdiisi > 0) : ?>
                    <button class="btn btn-primary btn-neoraised fw-bold">Kirim</button>
                <?php endif ?>



            </div>
        </form>
    <?php endif ?>

    <script>
        $('.stars a').on('click', function(e) {
            k = $(this).attr('k');
            e.preventDefault();
            $('.stars span[k="' + k + '"], .stars a[k="' + k + '"]').removeClass('active');

            $(this).addClass('active');
            $('.stars span[k="' + k + '"]').addClass('active');
            $('.jrt[k="' + k + '"]').val($(this).text());
        });
    </script>