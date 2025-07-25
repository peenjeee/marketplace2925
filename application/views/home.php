<div class="container my-5">
    <h2 class="fs-1">Selamat datang, <?php echo $this->session->userdata('nama_member') ?></h2>
    <p class="lead text-muted">Melalui panel ini Anda dapat mengelola produk yang Anda jual dan juga yang Anda beli.</p>

    <div class="row mt-5">
        <div class="col-md-3 mb-4">
            <div class="card card-brutalist p-3 h-100 text-center">
                <h5 class="font-ui">PRODUK ANDA</h5>
                <p class="display-4 font-display my-auto"><?php echo count($produk) ?></p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-brutalist p-3 h-100 text-center">
                <h5 class="font-ui">PEMBELIAN</h5>
                <p class="display-4 font-display my-auto"><?php echo count($beli) ?></p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-brutalist p-3 h-100 text-center">
                <h5 class="font-ui">PENJUALAN</h5>
                <p class="display-4 font-display my-auto"><?php echo count($jual) ?></p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-brutalist p-3 h-100 text-center d-flex flex-column justify-content-center">
                <h5 class="font-ui">AKUN</h5>
                <div class="mt-3">
                    <a href="<?php echo base_url('akun') ?>" class="btn btn-hw-secondary w-100">Ubah Akun</a>
                </div>
            </div>
        </div>
    </div>
</div>