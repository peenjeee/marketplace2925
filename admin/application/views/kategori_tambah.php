<div class="container mt-4">
    <h5 class="fw-bold fs-3">Tambah Kategori</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="" class="form-label fw-medium">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control card-neoraised fw-light" id="" value="<?php echo set_value('nama_kategori') ?>">
            <div class="text-danger small fst-italic mt-1">
                <?php echo form_error('nama_kategori') ?>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="form-label fw-medium">Foto Kategori</label>
            <input type="file" name="foto_kategori" class="form-control card-neoraised fw-light" id="">
        </div>
        <button type="submit" class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
    </form>
</div>