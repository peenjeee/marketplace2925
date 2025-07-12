<div class="container">
    <h5>Tambah slider</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="">Caption slider</label>
            <textarea name="caption_slider" class="form-control" id="editorku"><?php echo set_value('caption_slider') ?></textarea>

            <div class="text-danger small">
                <?php echo form_error('caption_slider') ?>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="">Foto slider</label>
            <input type="file" name="foto_slider" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>