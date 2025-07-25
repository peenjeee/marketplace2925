<!-- Search Form Section -->
<section class="py-5" style="background-color: var(--color-accent-flame);">
    <div class="container">
        <h2 class="text-center fs-1 text-white" style="text-shadow: 2px 2px 0px var(--color-text);">Cari Kategori</h2>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <form action="<?php echo base_url('kategori/cari') ?>" method="get">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control form-control-lg" placeholder="KETIK NAMA KATEGORI...">
                        <button class="btn btn-dark" type="submit" style="border: 2px solid black;">CARI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Category Grid Section -->
<div class="container my-5">
    <h3 class="fs-2 mb-4">Semua Kategori</h3>
    <div class="row">
        <?php if (!empty($kategori)): ?>
            <?php foreach ($kategori as $key => $value) : ?>
                <div class="col-md-3 text-center mb-4" data-aos="zoom-in">
                    <a href="<?php echo base_url('kategori/detail/' . $value['id_kategori']) ?>" class="text-decoration-none text-dark">
                        <div class="category-circle-brutalist">
                            <img src="<?php echo $this->config->item('url_kategori') . $value['foto_kategori'] ?>" alt="<?php echo $value['nama_kategori'] ?>" />
                        </div>
                        <h5 class="mt-3 font-ui fw-bold"><?php echo $value['nama_kategori'] ?></h5>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="card card-brutalist p-5 text-center">
                    <h4 class="font-ui">BELUM ADA KATEGORI YANG TERSEDIA.</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>