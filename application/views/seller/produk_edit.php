<?php if ($produk) : ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="fs-1 mb-4">Edit Produk</h2>
                <div class="card card-brutalist p-4">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">KATEGORI</label>
                            <select class="form-control" name="id_kategori">
                                <option value="">Pilih</option>
                                <?php foreach ($kategori as $k => $v) : ?>
                                    <option value="<?= $v['id_kategori'] ?>" <?php if ($v['id_kategori'] == $produk['id_kategori']) echo 'selected' ?>><?= $v['nama_kategori'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('id_kategori'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">NAMA PRODUK</label>
                            <input type="text" name="nama_produk" value="<?php echo set_value('nama_produk', $produk['nama_produk']) ?>" class="form-control">
                            <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('nama_produk'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">HARGA</label>
                            <input type="text" name="harga_produk" value="<?php echo set_value('harga_produk', $produk['harga_produk']) ?>" class="form-control">
                            <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('harga_produk'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">BERAT (GRAM)</label>
                            <input type="number" name="berat_produk" value="<?php echo set_value('berat_produk', $produk['berat_produk']) ?>" class="form-control">
                            <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('berat_produk'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">GANTI FOTO UTAMA</label>
                            <input type="file" name="foto_produk" class="form-control">
                            <p class="text-muted small mt-1">Kosongkan jika tidak ingin mengubah foto.</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">FOTO SAAT INI</label><br>
                            <img src="<?= $this->config->item('url_produk') . $produk['foto_produk'] ?>" alt="Foto Produk" width="150" style="border: 2px solid var(--color-text); padding: 5px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-ui fw-bold">DESKRIPSI</label>
                            <textarea name="deskripsi_produk" id="editorku" class="form-control"><?php echo set_value('deskripsi_produk', $produk['deskripsi_produk']) ?></textarea>
                            <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('deskripsi_produk'); ?> </span>
                        </div>
                        <button class="btn btn-hw-primary w-100">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container text-center py-5">
        <div class="card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">PRODUK TIDAK DITEMUKAN.</h2>
            <div class="mt-4">
                <a href="<?= base_url('seller/produk'); ?>" class="btn btn-hw-primary">Kembali</a>
            </div>
        </div>
    </div>
<?php endif; ?>