<div class="container mt-4">
    <h5 class="mb-5 fs-3 fw-bold mt-4">Artikel News</h5>

    <div class="row">
        <?php foreach ($artikel as $key => $value) : ?>
            <div class="col-md-3">
                <img src="<?php echo $this->config->item('url_artikel') . $value['foto_artikel'] ?>" alt="" class="w-100 card card-neoraised">
                <h6 class="mt-3 fs-5 fw-bold"><?php echo $value['judul_artikel'] ?></h6>
                <p class="lead text-muted fs-6"><?php echo substr($value['isi_artikel'], 0, 50) . (strlen($value['isi_artikel']) > 50 ? '...   ' : '       ') ?> <a href="<?php echo base_url('artikel/detail/' . $value['id_artikel']) ?>" class="text-decoration-none text-danger fw-bold">Baca selengkapnya</a></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>