<div class="container">
    <h5 class="mb-5 mt-4 fw-bold fs-3">Kategori Produk</h5>

    <div class="row">
        <?php foreach ($kategori as $key => $value): ?>
            <div class="col-md-3 mb-3">
                <a href="<?php echo base_url('kategori/detail/' . $value['id_kategori']) ?>" class="text-decoration-none">
                    <div class="card border-0">
                        <img src="<?= $this->config->item('url_kategori') . $value['foto_kategori'] ?>" alt="" class="rounded-circle card card-neoraised w-50 offset-3">
                        <div class="card-body text-center">
                            <h6 class="fw-bold fs-5"><?= $value['nama_kategori'] ?></h6>
                        </div>
                    </div>
                </a>

            </div>
        <?php endforeach; ?>
    </div>
</div>