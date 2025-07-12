<div class="container mt-4">
    <h5 class="fw-bold fs-3">Edit Produk</h5>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label fw-bold">Kategori</label>
            <select class="form-control form-select card-neoraised fw-light" name="id_kategori">
                <option value="">Pilih</option>
                <?php foreach ($kategori as $k => $v) : ?>
                    <option value="<?= $v['id_kategori'] ?>" <?php if ($v['id_kategori'] == $produk['id_kategori']) echo 'selected' ?>><?= $v['nama_kategori'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Nama</label>
            <input type="text" name="nama_produk" value="<?php echo $produk['nama_produk'] ?>" class="form-control card-neoraised fw-light">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <input type="text" name="harga_produk" value="<?php echo $produk['harga_produk'] ?>" class="form-control card-neoraised fw-light">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Berat</label>
            <input type="number" name="berat_produk" value="<?php echo $produk['berat_produk'] ?>" class="form-control card-neoraised fw-light">
            <span class="text-muted small">Gram</span>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Foto</label>
            <input type="file" name="foto_produk" class="form-control card-neoraised fw-light">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Foto Lama</label><br>
            <img src="<?= $this->config->item('url_produk') . $produk['foto_produk'] ?>" alt="" width="200">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi_produk" class="form-control card-neoraised fw-light"><?php echo $produk['deskripsi_produk'] ?></textarea>
        </div>
        <button class="btn btn-primary btn-neoraised fw-bold">Simpan</button>
    </form>
</div>