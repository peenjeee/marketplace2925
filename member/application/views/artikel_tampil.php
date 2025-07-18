<div class="container mt-4">
    <h5 class="mb-5 fs-3 fw-bold mt-4">Artikel News</h5>

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
</div>