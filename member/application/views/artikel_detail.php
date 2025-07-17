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