<?php if ($produk) : ?>
    <div class="container my-5">
        <h2 class="fs-1 mb-2">Galeri Produk</h2>
        <p class="lead text-muted">Mengelola foto untuk: <span class="fw-bold"><?php echo $produk['nama_produk'] ?></span></p>

        <div class="card card-brutalist p-4 mt-4">
            <h5 class="font-ui">UPLOAD FOTO BARU</h5>
            <hr>
            <form method="post" enctype="multipart/form-data" action="<?= base_url('seller/produk/tambah_galeri/' . $produk['id_produk']) ?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="mb-3">
                    <label class="form-label">Pilih File Gambar</label>
                    <input type="file" class="form-control" name="file_foto" required>
                </div>
                <button type="submit" class="btn btn-hw-primary">Upload</button>
            </form>
        </div>

        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fs-2 mb-0">Foto Tersimpan</h3>
                <?php if (!empty($galeri)): ?>
                    <a href="<?php echo base_url('seller/produk/hapus_semua_galeri/' . $produk['id_produk']) ?>" class="btn btn-hw-secondary" onclick="return confirm('Anda yakin ingin menghapus semua foto galeri untuk produk ini?')">
                        Hapus Semua Foto
                    </a>
                <?php endif; ?>
            </div>

            <?php if (empty($galeri)): ?>
                <div class="card card-brutalist p-5 text-center">
                    <h4 class="font-ui">BELUM ADA FOTO GALERI</h4>
                    <p class="text-muted mt-2">Silakan unggah foto baru menggunakan formulir di atas.</p>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($galeri as $foto): ?>
                        <div class="col-md-3 d-flex mb-4" data-aos="fade-up">
                            <div class="card card-brutalist h-100 d-flex flex-column text-center w-100">
                                <img src="<?php echo $this->config->item('url_produk') . $foto['file_foto'] ?>" alt="Galeri Foto" style="object-fit: cover; width: 100%; height: 250px; border-bottom: 2px solid var(--color-text);">
                                <div class="card-body">
                                    <a href="<?php echo base_url('seller/produk/hapus_galeri/' . $foto['id_foto'] . '/' . $produk['id_produk']) ?>" class="btn btn-hw-secondary btn-sm w-100" onclick="return confirm('Anda yakin ingin menghapus foto ini?')">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="container text-center py-5">
        <div class="card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">PRODUK TIDAK DITEMUKAN.</h2>
            <div class="mt-4">
                <a href="<?= base_url('seller/produk'); ?>" class="btn btn-hw-primary">Kembali</a>
            </div>
        </div>
    </div>
<?php endif; ?>