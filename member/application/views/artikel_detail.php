<?php if ($artikel) : ?>
    <section class="py-5">
        <div class="container mt-4">
            <h3 class="fw-bold fs-1 text-center"><?php echo $artikel['judul_artikel'] ?></h3>
            <h5 class="fw-light fs-6 text-center mb-5">Diposting: <?php echo date('d F Y', strtotime($artikel['tanggal_posting'])) ?></h5>

            <div class="col-md-8 offset-md-3">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <img src="<?php echo $this->config->item('url_artikel') . $artikel['foto_artikel'] ?>" alt="" class="w-75 card card-neoraised">
                    </div>

                </div>
            </div>
            <p class="text-justify"><?php echo $artikel['isi_artikel'] ?></p>
    </section>
<?php else: ?>
    <h1 class="fw-bold text-center mt-5">Artikel tidak ditemukan.</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="<?= base_url('artikel'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
    </div>
<?php endif; ?>