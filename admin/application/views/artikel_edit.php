<div class="container">
    <h5>Edit artikel</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="">Judul artikel</label>
            <input type="text" name="judul_artikel" class="form-control" id="" value="<?php echo set_value('judul_artikel', $artikel['judul_artikel']) ?>">

            <div class="text-danger small">
                <?php echo form_error('judul_artikel') ?>
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="">Isi artikel</label>

            <textarea name="isi_artikel" class="form-control" id="editorku"><?= set_value('isi_artikel', $artikel['isi_artikel']) ?></textarea>
            <span class="text-danger small">
                <?php echo form_error('isi_artikel') ?>
            </span>
        </div>
        <div class="mb-3 form-group">
            <label for="">Foto Lama</label><br>
            <img src="<?= $this->config->item('url_artikel') . $artikel['foto_artikel'] ?>" width="300" alt="">
        </div>
        <div class="mb-3 form-group">
            <label for="">Ganti foto artikel</label>
            <input type="file" name="foto_artikel" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>