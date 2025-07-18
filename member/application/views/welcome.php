<div id="carouselExampleCaptions" class="carousel slide mt-1 card-neoraised">

    <div class="carousel-inner">

        <?php foreach ($slider as $key => $value) : ?>
            <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
                <img src="<?php echo $this->config->item('url_slider') . $value['foto_slider'] ?>" class="d-block w-100 card-neoraised" style="filter: brightness(1);">
                <div class="carousel-caption d-none d-md-block fs-1 fw-bold text-dark text-shadow" style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                    <?php echo $value['caption_slider'] ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <a class="carousel-control-prev-icon btn btn-lg btn-danger btn-neoraised p-4" aria-hidden="true"></a>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <a class="carousel-control-next-icon btn btn-lg btn-danger btn-neoraised p-4" aria-hidden="true"></a>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="py-5">
    <div class="container">
        <h4 class="text-center fw-bold fs-3 mb-3">Cari Produk</h4>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?php echo base_url('produk/cari') ?>" method="get">
                    <div class="input-group input-group-btn mb-3">
                        <input type="text" name="keyword" class="form-control card-neoraised fw-light" placeholder="Cari Produk">

                        <button class="btn btn-danger btn-neoraised" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5">
    <div class="container">
        <h5 class="text-center mb-5 fw-bold fs-3">Kategori Produk</h5>
        <div class="row">
            <?php foreach ($kategori as $key => $value) : ?>
                <div class="col-md-3 text-center" data-aos="zoom-in">
                    <a href="<?php echo base_url('kategori/detail/' . $value['id_kategori']) ?>" class="text-decoration-none">
                        <img src="<?php echo $this->config->item('url_kategori') . $value['foto_kategori'] ?>" alt="" class="w-50 rounded-circle card card-neoraised offset-3" style="transition: all .3s ease-in-out;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
                    </a>

                    <h5 class="mt-3 fs-5 fw-bold"><?php echo $value['nama_kategori'] ?></h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-white py-5">
    <div class="container">
        <h5 class="text-center mb-5 fw-bold fs-3">Produk Terbaru</h5>
        <div class="row">
            <?php foreach ($produk as $key => $value) : ?>
                <div class="col-md-3 d-flex" data-aos="fade-up">
                    <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>" class="text-decoration-none w-100">
                        <div class="card mb-3 border-0 h-100 d-flex flex-column" style="transition: all .3s ease-in-out;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">

                            <img src="<?php echo $this->config->item('url_produk') . $value['foto_produk'] ?>" alt="" style="object-fit: contain; width: 100%; height: 400px;">

                            <div class="card-body text-center d-flex flex-column">
                                <h6 class="fs-5 fw-bold"><?php echo $value['nama_produk'] ?></h6>

                                <div class="mt-auto">
                                    <span class="fs-6 fw-medium badge bg-danger card-neoraised">
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


<section class="bg-white py-5">
    <div class="container">
        <h5 class="text-center mb-5 fw-bold fs-3">Artikel Terbaru</h5>
        <div class="row">
            <?php foreach ($artikel as $key => $value) : ?>
                <div class="col-md-3 mb-4 d-flex" data-aos="fade-down">
                    <div class="w-100 card card-neoraised rounded" style="transition: all .3s ease-in-out;" onmouseover="this.style.transform='translateY(10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="<?php echo $this->config->item('url_artikel') . $value['foto_artikel'] ?>" alt="" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h6 class="fs-5 fw-bold judul-artikel"><?php echo $value['judul_artikel'] ?></h6>

                            <p class="lead text-muted fs-6">
                                <?php echo substr($value['isi_artikel'], 0, 50) . (strlen($value['isi_artikel']) > 50 ? '...' : '') ?>
                            </p>

                            <a href="<?php echo base_url('artikel/detail/' . $value['id_artikel']) ?>" class="text-decoration-none text-danger fw-bold mt-auto">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>