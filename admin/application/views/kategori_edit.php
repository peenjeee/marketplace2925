<?php if ($kategori) : ?>
    <div class="container mt-4">
        <h5 class="fw-bold fs-3">Edit Kategori</h5>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form-group">
                <label for="" class="form-label fw-medium">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control card-neoraised fw-light" id="" value="<?= set_value('nama_kategori', $kategori['nama_kategori']) ?>">
                <span class="text-danger small fst-italic mt-2">
                    <?php echo form_error('nama_kategori') ?>
                </span>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label fw-medium">Foto Lama</label><br>
                <img src="<?= $this->config->item('url_kategori') . $kategori['foto_kategori'] ?>" width="150" alt="" class="card card-neoraised rounded-circle">
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label fw-medium">Ganti foto Kategori</label>
                <input type="file" name="foto_kategori" class="form-control card-neoraised fw-light" id="">
            </div>
            <button type="submit" class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
        </form>
    </div>
<?php else: ?>
    <h1 class="text-center mt-5">Kategori tidak ditemukan.</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="<?= base_url('kategori'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
    </div>
<?php endif; ?>