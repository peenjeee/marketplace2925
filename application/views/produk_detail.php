<?php if ($produk) : ?>
    <div class="container my-5">
        <div class="row g-5">
            <!-- Product Gallery -->
            <div class="col-md-7">
                <div class="card card-brutalist p-2">
                    <section id="main-carousel" class="splide" aria-label="Galeri Foto Produk">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="<?php echo $this->config->item('url_produk') . $produk['foto_produk'] ?>" alt="<?php echo $produk['nama_produk'] ?>">
                                </li>
                                <?php foreach ($produk['galeri_foto'] as $foto) : ?>
                                    <li class="splide__slide">
                                        <img src="<?php echo $this->config->item('url_produk') . $foto['file_foto'] ?>" alt="Galeri <?php echo $produk['nama_produk'] ?>">
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                </div>

                <?php if (!empty($produk['galeri_foto'])) : ?>
                    <div class="card card-brutalist p-2 mt-3">
                        <section id="thumbnail-carousel" class="splide" aria-label="Navigasi Thumbnail Galeri">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="<?php echo $this->config->item('url_produk') . $produk['foto_produk'] ?>" alt="Thumbnail Utama">
                                    </li>
                                    <?php foreach ($produk['galeri_foto'] as $foto) : ?>
                                        <li class="splide__slide">
                                            <img src="<?php echo $this->config->item('url_produk') . $foto['file_foto'] ?>" alt="Thumbnail Galeri">
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </section>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Product Info & Actions -->
            <div class="col-md-5">
                <h1 class="font-display" style="font-size: 3.5rem; line-height: 1.1;"><?php echo $produk['nama_produk'] ?></h1>
                <div class="my-3">
                    <span class="font-ui p-2" style="background-color: var(--color-accent-flame); color: white; border: 2px solid var(--color-text);"><?php echo $produk['nama_kategori'] ?></span>
                </div>
                <p class="display-5 font-display" style="color: var(--color-accent-blue);">Rp. <?php echo number_format($produk['harga_produk']) ?></p>

                <hr style="border-top: 2px solid var(--color-text);">

                <?php if ($produk['id_member'] !== $this->session->userdata('id_member') && !empty($this->session->userdata('id_member'))) : ?>
                    <form action="" method="post" class="my-3">

                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control form-control-lg" value="1" min="1">
                            <button class="btn btn-hw-primary btn-lg">TAMBAH KE KERANJANG</button>
                        </div>
                    </form>
                <?php endif; ?>

                <div class="mt-4 fs-6">
                    <h4 class="font-ui">DESKRIPSI</h4>
                    <?php echo $produk['deskripsi_produk'] ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container text-center py-5">
        <div class="card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">PRODUK TIDAK DITEMUKAN.</h2>
            <div class="mt-4">
                <a href="<?= base_url('produk'); ?>" class="btn btn-hw-primary">Kembali ke Produk</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>
    /* Splide Carousel Styles */
    #main-carousel .splide__slide img {
        width: 100%;
        height: 500px;
        object-fit: contain;
    }

    #thumbnail-carousel .splide__slide {
        opacity: 0.5;
        cursor: pointer;
        border: 2px solid transparent;
    }

    #thumbnail-carousel .splide__slide.is-active {
        opacity: 1;
        border-color: var(--color-accent-blue);
    }

    #thumbnail-carousel .splide__slide img {
        width: 100%;
        height: 70px;
        object-fit: cover;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mainCarouselElement = document.getElementById('main-carousel');
        if (mainCarouselElement) {
            var main = new Splide('#main-carousel', {
                type: 'fade',
                rewind: true,
                pagination: false,
                arrows: <?php echo !empty($produk['galeri_foto']) ? 'true' : 'false'; ?>,
            });

            var thumbnailCarouselElement = document.getElementById('thumbnail-carousel');
            if (thumbnailCarouselElement) {
                var thumbnails = new Splide('#thumbnail-carousel', {
                    fixedWidth: 100,
                    fixedHeight: 60,
                    gap: 10,
                    rewind: true,
                    pagination: false,
                    isNavigation: true,
                    arrows: false,
                });
                main.sync(thumbnails);
                thumbnails.mount();
            }
            main.mount();
        }
    });
</script>