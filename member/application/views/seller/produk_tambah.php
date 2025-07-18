<div class="container mt-4">
    <h5 class="fw-bold fs-3">Tambah Produk</h5>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label fw-bold">Kategori</label>
            <select class="form-control form-select card-neoraised fw-light" name="id_kategori">
                <option value="">Pilih</option>
                <?php foreach ($kategori as $k => $v) : ?>
                    <option value="<?= $v['id_kategori'] ?>"><?= $v['nama_kategori'] ?></option>
                <?php endforeach ?>
            </select>
            <span class="text-danger small fst-italic mt-1">
                <?php echo form_error('id_kategori') ?>
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Nama</label>
            <input type="text" name="nama_produk" class="form-control card-neoraised fw-light" value="<?= set_value('nama_produk') ?>">
            <span class="text-danger small fst-italic mt-1">
                <?php echo form_error('nama_produk') ?>
            </span>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <input type="text" name="harga_produk" class="form-control card-neoraised fw-light" value="<?= set_value('harga_produk') ?>">
            <span class="text-danger small fst-italic mt-1">
                <?php echo form_error('harga_produk') ?>
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Berat</label>
            <input type="number" name="berat_produk" class="form-control card-neoraised fw-light" value="<?= set_value('berat_produk') ?>">
            <span class="text-muted small">Gram</span>
            <span class="text-danger small fst-italic mt-1">
                <?php echo form_error('berat_produk') ?>
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Foto</label>
            <input type="file" name="foto_produk" class="form-control card-neoraised fw-light">
            <span class="text-danger small fst-italic mt-1">
                <?php echo form_error('foto_produk') ?>
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi_produk" class="form-control card-neoraised fw-light"><?= set_value('deskripsi_produk') ?></textarea>
            <span class="text-danger small fst-italic mt-1">
                <?php echo form_error('deskripsi_produk') ?>
            </span>
        </div>
        <button class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
    </form>
</div>
