<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="fs-1 mb-4">Tambah Produk Baru</h2>
            <div class="card card-brutalist p-4">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">KATEGORI</label>
                        <select class="form-control" name="id_kategori">
                            <option value="">Pilih</option>
                            <?php foreach ($kategori as $k => $v) : ?>
                                <option value="<?= $v['id_kategori'] ?>" <?= set_select('id_kategori', $v['id_kategori']); ?>><?= $v['nama_kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('id_kategori'); ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">NAMA PRODUK</label>
                        <input type="text" name="nama_produk" class="form-control" value="<?= set_value('nama_produk') ?>">
                        <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('nama_produk'); ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">HARGA</label>
                        <input type="text" name="harga_produk" class="form-control" value="<?= set_value('harga_produk') ?>">
                        <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('harga_produk'); ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">BERAT (GRAM)</label>
                        <input type="number" name="berat_produk" class="form-control" value="<?= set_value('berat_produk') ?>">
                        <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('berat_produk'); ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">FOTO UTAMA</label>
                        <input type="file" name="foto_produk" class="form-control">
                        <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('foto_produk'); ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">DESKRIPSI</label>
                        <textarea name="deskripsi_produk" id="editorku" class="form-control"><?= set_value('deskripsi_produk') ?></textarea>
                        <span class="text-danger small fst-italic mt-1 d-block"><?php echo form_error('deskripsi_produk'); ?></span>
                    </div>
                    <button class="btn btn-hw-primary w-100">Simpan Produk</button>
                </form>
            </div>
        </div>
    </div>
</div>