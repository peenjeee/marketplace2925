<div class="container">
    <h5 class="mb-5 mt-4 fw-bold fs-3">Kategori Produk</h5>

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