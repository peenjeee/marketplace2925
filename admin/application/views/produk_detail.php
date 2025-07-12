<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $this->config->item('url_produk') . $produk['foto_produk'] ?>" alt="" class="w-100">
        </div>
        <div class="col-md-6">
            <h1><?php echo $produk['nama_produk'] ?></h1>
            <span class="badge bg-dark"><?php echo $produk['nama_kategori'] ?></span>
            <p class="lead">Rp. <?php echo number_format($produk['harga_produk'], 0, ',', '.') ?></p>
           

            <p><?php echo $produk['deskripsi_produk'] ?></p>



        </div>
    </div>