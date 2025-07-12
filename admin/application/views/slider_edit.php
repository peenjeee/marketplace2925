<div class="container">
    <h5>Edit Slider</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="">Caption slider</label>

            <textarea name="caption_slider" class="form-control" id="editorku"><?= set_value('caption_slider', $slider['caption_slider']) ?></textarea>
            <span class="text-danger small">
                <?php echo form_error('caption_slider') ?>
            </span>
        </div>
        <div class="mb-3 form-group">
            <label for="">Foto Lama</label><br>
            <img src="<?= $this->config->item('url_slider') . $slider['foto_slider'] ?>" width="300" alt="">
        </div>
        <div class="mb-3 form-group">
            <label for="">Ganti foto slider</label>
            <input type="file" name="foto_slider" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>