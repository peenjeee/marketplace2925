<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fs-1">Keranjang Saya</h2>
        <?php if (!empty($keranjang)) : ?>
            <form action="<?php echo base_url('keranjang/all') ?>" method="post" onsubmit="return confirm('Anda yakin ingin menghapus semua item dari keranjang?');">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <button type="submit" class="btn btn-hw-secondary">Hapus Semua</button>
            </form>
        <?php endif; ?>
    </div>

    <?php if (empty($keranjang)): ?>
        <div class="card card-brutalist text-center p-5">
            <h3 class="font-ui">KERANJANG ANDA KOSONG</h3>
            <p class="text-muted mt-2">Sepertinya Anda belum menambahkan produk apapun.</p>
            <div class="mt-4">
                <a href="<?php echo base_url('produk') ?>" class="btn btn-hw-primary">Ayo Belanja</a>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($keranjang as $k_penjual => $per_penjual) : ?>
            <div class="card card-brutalist mb-5">
                <div class="card-header bg-white p-3">
                    <h5 class="font-ui mb-0">PENJUAL: <?php echo $per_penjual['nama_member'] ?></h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless" style="margin-bottom: 0;">
                        <thead class="font-ui">
                            <tr style="border-bottom: 2px solid var(--color-text);">
                                <th class="p-3">Produk</th>
                                <th class="p-3">Harga</th>
                                <th class="p-3 text-center">Jumlah</th>
                                <th class="p-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($per_penjual['produk'] as $k_produk => $per_produk) : ?>
                                <tr style="border-bottom: 1px solid var(--color-border);">
                                    <td class="p-3 align-middle">
                                        <a href="<?php echo base_url('produk/detail/' . $per_produk['id_produk']) ?>" class="text-decoration-none text-dark d-flex align-items-center">
                                            <img src="<?= $this->config->item('url_produk') . $per_produk['foto_produk'] ?>" alt="" width="70" style="border: 1px solid var(--color-border); margin-right: 15px;">
                                            <span class="fw-bold"><?= $per_produk['nama_produk'] ?></span>
                                        </a>
                                    </td>
                                    <td class="p-3 align-middle">Rp. <?= number_format($per_produk['harga_produk']) ?></td>
                                    <td class="p-3 align-middle">
                                        <form action="<?php echo base_url('keranjang/update/' . $per_produk['id_keranjang']) ?>" method="post" class="d-flex justify-content-center">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <input type="number" name="jumlah" class="form-control text-center" value="<?= $per_produk['jumlah'] ?>" min="1" style="width: 70px;" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="p-3 align-middle text-center">
                                        <a href="<?php echo base_url('keranjang/hapus/' . $per_produk['id_keranjang']) ?>" class="btn btn-hw-secondary btn-sm" onclick="return confirm('Anda yakin ingin menghapus item ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white p-3 d-flex justify-content-end">
                    <a href="<?php echo base_url('keranjang/checkout/' . $per_penjual['id_member']) ?>" class="btn btn-hw-primary">Checkout Penjual Ini</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>