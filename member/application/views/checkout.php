<div class="container">
    <h3 class="fw-bold mt-4 fs-3">Checkout</h3>

    <table class="mt-3 table table-borderless card-neoraised border border-dark border-3">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($keranjang as $k => $per_produk) : ?>
                <?php $subtotal = $per_produk['harga_produk'] * $per_produk['jumlah'] ?>
                <?php $total += $subtotal ?>
                <tr>
                    <td>
                        <a href="<?php echo base_url('produk/detail/' . $per_produk['id_produk']) ?>" class="text-decoration-none fw-medium">
                            <img src="<?= $this->config->item('url_produk') . $per_produk['foto_produk'] ?>" alt="" width="70">
                            <?= $per_produk['nama_produk'] ?>
                        </a>

                    </td>
                    <td class="fw-medium"><?= number_format($per_produk['harga_produk']) ?></td>
                    <td class="fw-medium"><?= $per_produk['jumlah'] ?></td>
                    <td class="fw-medium"><?= number_format($subtotal) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th><?php echo number_format($total) ?></th>
            </tr>
        </tfoot>
    </table>

    <div class="row">
        <div class="col-md-4">
            <h4>Dikirim oleh</h4>
            <span class="fs-6 fw-bold badge bg-primary card-neoraised mb-3"><?php echo $member_jual['nama_member'] ?></span>
            <h6><?php echo $member_jual['nama_distrik_member'] ?></h6>
            <span><?php echo $member_jual['alamat_member'] ?></span>

        </div>

        <div class="col-md-4">
            <h4>Diterima oleh</h4>
            <span class="fs-6 fw-bold badge bg-primary card-neoraised mb-3"><?php echo $member_beli['nama_member'] ?></span>
            <h6><?php echo $member_beli['nama_distrik_member'] ?></h6>
            <span><?php echo $member_beli['alamat_member'] ?></span>
            <h6><?php echo $member_beli['wa_member'] ?></h6>

        </div>

        <div class="col-md-4">
            <h4>Pengiriman</h4>
            <form method="post">
                <select name="ongkir" class="form-control mb-3 card-neoraised" id="" required>
                    <option value="">Pilih</option>
                    <?php foreach ($biaya['costs'] as $key => $value) : ?>
                        <option value="<?php echo $key ?>"><?php echo $value['description'] ?> |
                            <?php echo number_format($value['cost'][0]['value']) ?> |
                            <?php echo $value['cost'][0]['etd'] ?> Hari
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="text-muted text-danger"><?php echo form_error('ongkir') ?></div>
                <button class="btn btn-success btn-neoraised fw-bold ">Checkout</button>
            </form>
        </div>
    </div>
</div>