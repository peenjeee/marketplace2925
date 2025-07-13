<div class="container mt-4">
    <h5 class="fw-bold fs-3">Tambah Artikel</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="" class="form-label fw-medium">Judul artikel</label>
            <input type="text" name="judul_artikel" class="form-control card-neoraised fw-light" id="" value="<?php echo set_value('judul_artikel') ?>">

            <div class="text-danger small fst-italic">
                <?php echo form_error('judul_artikel') ?>
            </div>
        </div>

        <label for="" class="form-label fw-medium">Isi artikel</label>
        <div class="mb-3 form-group card card-neoraised rounded">

            <textarea name="isi_artikel" class="form-control fw-light" id="editorku"><?php echo set_value('isi_artikel') ?></textarea>

            <div class="text-danger small fst-italic">
                <?php echo form_error('isi_artikel') ?>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="form-label fw-medium">Foto artikel</label>
            <input type="file" name="foto_artikel" class="form-control card-neoraised fw-light" id="">
        </div>
        <button type="submit" class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
    </form>
</div>