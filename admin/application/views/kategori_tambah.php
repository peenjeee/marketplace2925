<div class="container">
    <h5>Tambah Kategori</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" id="" value="<?php echo set_value('nama_kategori') ?>">
            <div class="text-danger small">
                <?php echo form_error('nama_kategori') ?>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="">Foto Kategori</label>
            <input type="file" name="foto_kategori" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>