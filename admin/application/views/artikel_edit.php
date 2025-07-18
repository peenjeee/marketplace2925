<?php if ($artikel) : ?>
    <div class="container mt-4">
        <h5 class="fw-bold fs-3">Edit artikel</h5>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form-group">
                <label for="" class="form-label fw-medium">Judul artikel</label>
                <input type="text" name="judul_artikel" class="form-control card-neoraised fw-light" id="" value="<?php echo set_value('judul_artikel', $artikel['judul_artikel']) ?>">

                <div class="text-danger small fst-italic mt-1">
                    <?php echo form_error('judul_artikel') ?>
                </div>
            </div>

            <label for="" class="form-label fw-medium">Isi artikel</label>
            <div class="mb-3 form-group card card-neoraised rounded">
                <textarea name="isi_artikel" class="form-control" id="editorku"><?= set_value('isi_artikel', $artikel['isi_artikel']) ?></textarea>
                <span class="text-danger small fst-italic mt-1">
                    <?php echo form_error('isi_artikel') ?>
                </span>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label fw-medium">Foto Lama</label><br>
                <img src="<?= $this->config->item('url_artikel') . $artikel['foto_artikel'] ?>" width="200" alt="" class="card-neoraised">
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label fw-medium">Ganti foto artikel</label>
                <input type="file" name="foto_artikel" class="form-control card-neoraised fw-light" id="">
            </div>
            <button type="submit" class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
        </form>
    </div>
<?php else: ?>
    <h1 class="text-center mt-5">Artikel tidak ditemukan.</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="<?= base_url('artikel'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
    </div>
<?php endif; ?>