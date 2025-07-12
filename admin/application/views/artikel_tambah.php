<div class="container">
    <h5>Tambah Artikel</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="">Judul artikel</label>
            <input type="text" name="judul_artikel" class="form-control" id="" value="<?php echo set_value('judul_artikel') ?>">

            <div class="text-danger small">
                <?php echo form_error('judul_artikel') ?>
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="">Isi artikel</label>
            <textarea name="isi_artikel" class="form-control" id="editorku"><?php echo set_value('isi_artikel') ?></textarea>

            <div class="text-danger small">
                <?php echo form_error('isi_artikel') ?>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="">Foto artikel</label>
            <input type="file" name="foto_artikel" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>