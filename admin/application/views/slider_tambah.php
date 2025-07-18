<div class="container mt-4">
    <h5 class="fw-bold fs-3">Tambah slider</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="" class="fw-bold form-label">Caption slider</label>

        <div class="mb-3 form-group card card-neoraised rounded">
            <textarea name="caption_slider" class="form-control card-neoraised fw-light" id="editorku"><?php echo set_value('caption_slider') ?></textarea>

            <div class="text-danger small fst-italic mt-1">
                <?php echo form_error('caption_slider') ?>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="fw-bold form-label">Foto slider</label>
            <input type="file" name="foto_slider" class="form-control card-neoraised fw-light" id="">
        </div>
        <button type="submit" class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
    </form>
</div>