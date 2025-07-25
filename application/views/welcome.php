<!-- 1. BRUTALIST CAROUSEL SECTION -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($slider as $key => $value) : ?>
            <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
                <img src="<?php echo $this->config->item('url_slider') . $value['foto_slider'] ?>" class="d-block w-100" style="filter: brightness(0.9); height: 70vh; object-fit: cover;">
                <!-- Caption akan ditata ulang oleh CSS baru -->
                <div class="carousel-caption carousel-caption-brutalist d-none d-md-block">
                    <h1><?php echo $value['caption_slider'] ?></h1>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- 2. SEARCH SECTION -->
<section class="py-5" style="background-color: var(--color-accent-flame);">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="<?php echo base_url('produk/cari') ?>" method="get">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control form-control-lg" placeholder="SEARCH BY MODEL, SERIES, OR YEAR...">
                        <button class="btn btn-dark" type="submit" style="border: 2px solid black;">SEARCH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- 3. CATEGORY (SERIES) SECTION (UPDATED) -->
<section class="py-5 mt-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fs-1">EXPLORE THE SERIES</h2>
            <a href="<?php echo base_url('kategori') ?>" class="btn btn-hw-secondary">View All</a>
        </div>
        <div class="row">
            <?php foreach ($kategori as $key => $value) : ?>
                <div class="col-md-3 text-center mb-4" data-aos="zoom-in">
                    <a href="<?php echo base_url('kategori/detail/' . $value['id_kategori']) ?>" class="text-decoration-none text-dark">
                        <!-- Menggunakan struktur div baru untuk border lingkaran -->
                        <div class="category-circle-brutalist">
                            <img src="<?php echo $this->config->item('url_kategori') . $value['foto_kategori'] ?>" alt="<?php echo $value['nama_kategori'] ?>" />
                        </div>
                        <h5 class="mt-3 font-ui fw-bold"><?php echo $value['nama_kategori'] ?></h5>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 4. LATEST PRODUCTS SECTION -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fs-1">LATEST ARRIVALS</h2>
            <a href="<?php echo base_url('produk') ?>" class="btn btn-hw-secondary">View All</a>
        </div>
        <div class="row">
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
        </div>
    </div>
</section>

<!-- 5. LATEST ARTICLES SECTION -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fs-1">FROM THE GARAGE</h2>
            <a href="<?php echo base_url('artikel') ?>" class="btn btn-hw-secondary">View All</a>
        </div>
        <div class="row">
            <?php foreach ($artikel as $key => $value) : ?>
                <div class="col-md-4 d-flex mb-4" data-aos="fade-down">
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
        </div>
    </div>
</section>