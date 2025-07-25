<?php if ($kategori) : ?>

    <!-- Category Header & Search -->
    <section class="py-5" style="background-color: var(--color-accent-blue);">
        <div class="container text-center">
            <h1 class="display-4 text-white" style="text-shadow: 3px 3px 0px var(--color-text);"><?php echo $kategori['nama_kategori']; ?></h1>
            <div class="row mt-4">
                <div class="col-md-8 offset-md-2">
                    <form action="<?php echo base_url('kategori/cari_produk/' . $kategori['id_kategori']) ?>" method="get">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control form-control-lg" placeholder="Cari produk di kategori ini...">
                            <button class="btn btn-dark" type="submit" style="border: 2px solid black;">CARI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Grid -->
    <div class="container my-5">
        <div class="row">
            <?php if (!empty($produk)): ?>
                <?php foreach ($produk as $key => $value) : ?>
                    <div class="col-md-3 d-flex mb-4" data-aos="fade-up">
                        <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>" class="text-decoration-none w-100">
                            <div class="card card-brutalist h-100 d-flex flex-column text-center">
                                <img src="<?php echo $this->config->item('url_produk') . $value['foto_produk'] ?>" alt="<?php echo $value['nama_produk'] ?>" style="object-fit: contain; width: 100%; height: 250px; border-bottom: 2px solid var(--color-text); padding: 1rem;">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="fs-5 font-ui fw-bold"><?php echo $value['nama_produk'] ?></h6>
                                    <div class="mt-auto">
                                        <span class="fs-5 font-ui fw-bold p-2" style="background-color: var(--color-accent-blue); color: white; border: 2px solid var(--color-text);">
                                            Rp. <?php echo number_format($value['harga_produk']) ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="card card-brutalist p-5 text-center">
                        <h4 class="font-ui">BELUM ADA PRODUK DI KATEGORI INI.</h4>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php else: ?>
    <div class="container text-center py-5">
        <div class="card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">KATEGORI TIDAK DITEMUKAN.</h2>
            <div class="mt-4">
                <a href="<?= base_url('kategori'); ?>" class="btn btn-hw-primary">Kembali ke Daftar Kategori</a>
            </div>
        </div>
    </div>
<?php endif; ?>