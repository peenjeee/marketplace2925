<?php if ($produk) : ?>
    <div class="container py-3 mt-4">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="<?php echo $this->config->item('url_produk') . $produk['foto_produk'] ?>" alt="" class="w-75 ms-auto">
            </div>
            <div class="col-md-6">
                <h1 class="fw-bold fs-1"><?php echo $produk['nama_produk'] ?></h1>
                <span class="badge bg-warning card-neoraised fs-6 mb-3"><?php echo $produk['nama_kategori'] ?></span>
                <p class="lead fs-4 fw-medium">Rp. <?php echo number_format($produk['harga_produk'], 0, ',', '.') ?></p>

                <?php if ($produk['id_member'] !== $this->session->userdata('id_member') && !empty($this->session->userdata('id_member'))): ?>
                    <form action="" method="post" class="my-2">
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control card-neoraised" value="1" min="1">
                            <button class="btn btn-danger btn-neoraised">Beli</button>
                        </div>
                    </form>
                <?php endif; ?>
                <p class="mt-3 fs-6"><?php echo $produk['deskripsi_produk'] ?></p>
            </div>
        </div>
    <?php else: ?>
        <h1 class="fw-bold text-center mt-5">Produk tidak ditemukan.</h1>
        <div class="d-flex justify-content-center mt-5">
            <a href="<?= base_url('produk'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
        </div>
    <?php endif; ?>