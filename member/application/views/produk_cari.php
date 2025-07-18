<section class="py-5">
    <div class="container">
        <h4 class="text-center fw-bold fs-3 mb-3">Cari Produk</h4>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?php echo base_url('produk/cari') ?>" method="get">
                    <div class="input-group input-group-btn mb-3">
                        <input type="text" name="keyword" class="form-control card-neoraised fw-light" placeholder="Cari Produk" value="<?php echo $keyword ?>">

                        <button class="btn btn-danger btn-neoraised" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h5 class="mb-5 fs-3 fw-bold mt-4">Hasil Pencarian</h5>

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