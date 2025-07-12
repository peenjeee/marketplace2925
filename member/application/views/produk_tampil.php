<div class="container">
    <h5 class="mb-5 fs-3 fw-bold mt-4">Produk Terbaru</h5>

    <div class="row">
        <?php foreach ($produk as $key => $value): ?>
            <div class="col-md-3 d-flex mb-5">
                <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>" class="text-decoration-none w-100">
                    <div class="card mb-3 border-0 h-100 d-flex flex-column">

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