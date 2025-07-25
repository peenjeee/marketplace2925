<div class="container my-5">
    <?php if ($artikel) : ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">

                <!-- Article Header -->
                <div class="text-center mb-5">
                    <h1 class="display-3"><?php echo $artikel['judul_artikel'] ?></h1>
                    <p class="font-ui text-muted">DIPOSTING: <?php echo date('d F Y', strtotime($artikel['tanggal_posting'])) ?></p>
                </div>

                <!-- Article Image -->
                <div class="mb-5 text-center">
                    <img src="<?php echo $this->config->item('url_artikel') . $artikel['foto_artikel'] ?>" alt="<?php echo $artikel['judul_artikel'] ?>" class="img-fluid" style="border: 2px solid var(--color-text); padding: 10px; background: white;">
                </div>

                <!-- Article Content -->
                <div class="fs-5" style="line-height: 1.8;">
                    <?php echo $artikel['isi_artikel'] ?>
                </div>

            </div>
        </div>
    <?php else: ?>
        <div class="text-center card card-brutalist p-5">
            <h1 class="display-4">404</h1>
            <h2 class="font-ui">ARTIKEL TIDAK DITEMUKAN</h2>
            <div class="mt-4">
                <a href="<?= base_url('artikel'); ?>" class="btn btn-hw-primary">Kembali ke Artikel</a>
            </div>
        </div>
    <?php endif; ?>
</div>