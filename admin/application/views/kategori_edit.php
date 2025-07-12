<div class="container">
    <h5>Edit Kategori</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" id="" value="<?= set_value('nama_kategori', $kategori['nama_kategori']) ?>">
            <span class="text-danger small">
                <?php echo form_error('nama_kategori') ?>
            </span>
        </div>
        <div class="mb-3 form-group">
            <label for="">Foto Lama</label><br>
            <img src="<?= $this->config->item('url_kategori') . $kategori['foto_kategori'] ?>" width="300" alt="">
        </div>
        <div class="mb-3 form-group">
            <label for="">Ganti foto Kategori</label>
            <input type="file" name="foto_kategori" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>