<?php if ($slider) : ?>
    <div class="container mt-4">
        <h5 class="fw-bold fs-3">Edit Slider</h5>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="" class="fw-bold form-label">Caption slider</label>
            <div class="mb-3 form-group card card-neoraised rounded">

                <textarea name="caption_slider" class="form-control" id="editorku"><?= set_value('caption_slider', $slider['caption_slider']) ?></textarea>
                <span class="text-danger small fst-italic mt-1">
                    <?php echo form_error('caption_slider') ?>
                </span>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="fw-bold form-label">Foto Lama</label><br>
                <img src="<?= $this->config->item('url_slider') . $slider['foto_slider'] ?>" width="300" alt="" class="card-neoraised">
            </div>
            <div class="mb-3 form-group">
                <label for="" class="fw-bold form-label">Ganti foto slider</label>
                <input type="file" name="foto_slider" class="form-control card-neoraised fw-light" id="">
            </div>
            <button type="submit" class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
        </form>
    </div>
<?php else: ?>
    <h1 class="fw-bold text-center mt-5">Slider tidak ditemukan.</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="<?= base_url('slider'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
    </div>
<?php endif; ?>