<!-- Search Form Section -->
<section class="py-5" style="background-color: var(--color-accent-flame);">
    <div class="container">
        <h2 class="text-center fs-1 text-white" style="text-shadow: 2px 2px 0px var(--color-text);">Cari Artikel</h2>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <form action="<?php echo base_url('artikel/cari') ?>" method="get">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control form-control-lg" placeholder="KETIK JUDUL ATAU KONTEN...">
                        <button class="btn btn-dark" type="submit" style="border: 2px solid black;">CARI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Articles List Section -->
<div class="container my-5">
    <h3 class="fs-2 mb-4">Semua Artikel</h3>
    <div class="row">
        <?php if (!empty($artikel)): ?>
            <?php foreach ($artikel as $key => $value) : ?>
                <div class="col-md-4 d-flex mb-4" data-aos="fade-up">
                    <a href="<?php echo base_url('artikel/detail/' . $value['id_artikel']) ?>" class="text-decoration-none w-100">
                        <div class="card card-brutalist h-100 d-flex flex-column">
                            <img src="<?php echo $this->config->item('url_artikel') . $value['foto_artikel'] ?>" alt="<?php echo $value['judul_artikel'] ?>" class="card-img-top" style="border-bottom: 2px solid var(--color-text);">
                            <div class="card-body d-flex flex-column">
                                <h5 class="font-ui fw-bold"><?php echo $value['judul_artikel'] ?></h5>
                                <p class="lead text-muted fs-6">
                                    <?php echo substr(strip_tags($value['isi_artikel']), 0, 100) . '...'; ?>
                                </p>
                                <span class="btn btn-hw-secondary mt-auto">READ MORE</span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="card card-brutalist p-5 text-center">
                    <h4 class="font-ui">BELUM ADA ARTIKEL YANG DITULIS.</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>