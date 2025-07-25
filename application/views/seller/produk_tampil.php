<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fs-1 mb-0">Produk Anda</h2>
        <a href="<?php echo base_url('seller/produk/tambah') ?>" class="btn btn-hw-primary">Tambah Produk</a>
    </div>

    <?php if (empty($produk)): ?>
        <div class="card card-brutalist text-center p-5">
            <h3 class="font-ui">ANDA BELUM MEMILIKI PRODUK</h3>
            <p class="text-muted mt-2">Silakan tambah produk untuk memulai berjualan.</p>
        </div>
    <?php else: ?>
        <div class="card card-brutalist p-2">
            <div class="table-responsive">
                <table class="table table-borderless" id="tabelku" style="margin-bottom: 0;">
                    <thead class="font-ui">
                        <tr style="border-bottom: 2px solid var(--color-text);">
                            <th class="p-3">No</th>
                            <th class="p-3">Foto</th>
                            <th class="p-3">Produk</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Berat</th>
                            <th class="p-3">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $k => $v): ?>
                            <tr style="border-bottom: 1px solid var(--color-border);">
                                <td class="p-3 align-middle fw-bold"><?php echo $k + 1 ?></td>
                                <td class="p-3 align-middle">
                                    <img src="<?php echo $this->config->item('url_produk') . $v['foto_produk'] ?>" alt="" width="70" style="border: 2px solid var(--color-text); padding: 5px;">
                                </td>
                                <td class="p-3 align-middle"><?php echo $v['nama_produk'] ?></td>
                                <td class="p-3 align-middle">Rp. <?php echo number_format($v['harga_produk']) ?></td>
                                <td class="p-3 align-middle"><?php echo $v['berat_produk'] ?> gr</td>
                                <td class="p-3 align-middle">
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo base_url('seller/produk/galeri/' . $v['id_produk']) ?>" class="btn btn-hw-secondary btn-sm">Galeri</a>
                                        <a href="<?php echo base_url('seller/produk/edit/' . $v['id_produk']) ?>" class="btn btn-hw-secondary btn-sm">Edit</a>
                                        <a href="<?php echo base_url('seller/produk/hapus/' . $v['id_produk']) ?>" class="btn btn-hw-secondary btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>