<div class="container">

    <?php if (empty($keranjang)): ?>
        <div class="alert alert-warning card-neoraised mt-4 fw-bold fs-6" role="alert">
            Yaaaah, keranjang belanja masih kosong,
        </div>

        <a href="<?php echo base_url('produk') ?>" class="btn btn-danger btn-neoraised fw-bold">Ayo Belanja</a>
    <?php endif ?>


    <h2 class="mb-5 mt-4 fw-bold fs-3">Keranjang Saya</h2>

    <?php foreach ($keranjang as $k => $per_penjual) : ?>
        <div class="mb-5">
            <span class="fs-6 fw-bold bg-warning card-neoraised rounded px-2 py-2 rounded-3">
                <?= $per_penjual['nama_member'] ?>
            </span>
            <table class="mt-3 table table-borderless card-neoraised border border-dark border-3">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($per_penjual['produk'] as $k => $per_produk) : ?>
                        <tr>
                            <td>
                                <a href="<?php echo base_url('produk/detail/' . $per_produk['id_produk']) ?>" class="text-decoration-none fw-medium">
                                    <img src="<?= $this->config->item('url_produk') . $per_produk['foto_produk'] ?>" alt="" width="70">
                                    <?= $per_produk['nama_produk'] ?>
                                </a>
                                <br>

                            </td>
                            <td class="fw-medium"><?= number_format($per_produk['harga_produk']) ?></td>
                            <td class="fw-medium"><?= $per_produk['jumlah'] ?></td>
                            <td>
                                <a href="<?php echo base_url('keranjang/hapus/' . $per_produk['id_keranjang']) ?>" class="btn btn-danger btn-sm btn-neoraised fw-bold">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="<?php echo base_url('produk') ?>" class="btn btn-primary btn-neoraised fw-bold">Belanja Lagi</a>
                </div>
                <div class="col-auto">
                    <a href="<?php echo base_url('keranjang/checkout/' . $per_penjual['id_member']) ?>" class="btn btn-success btn-neoraised fw-bold">Checkout</a>
                </div>
            </div>

        </div>
    <?php endforeach; ?>

</div>