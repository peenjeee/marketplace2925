<div class="container">
    <h5 class="fw-bold fs-3 mt-4">Selamat datang <?php echo $this->session->userdata('nama_member') ?></h5>
    <p class="lead fw-light">Melalui panel ini Anda dapat mengelola produk yang Anda jual dan juga yang Anda beli</p>


    <div class="row">
        <div class="col-md-3">
            <div class="card text-bg-primary card-body mb-3 card-neoraised border border-1 border-dark">
                <div class="card-header text-bg-primary fw-bold">Produk</div>
                <div class="card-body text-bg-primary">
                    <h5 class="card-title text-bg-primary "><?php echo count($produk) ?></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-secondary card-body mb-3 card-neoraised border border-1 border-dark">
                <div class="card-header text-bg-secondary fw-bold">Pembelian</div>
                <div class="card-body text-bg-secondary">
                    <h5 class="card-title text-bg-secondary "><?php echo count($beli) ?></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success card-body mb-3 card-neoraised border border-1 border-dark">
                <div class="card-header text-bg-success  fw-bold">Penjualan</div>
                <div class="card-body text-bg-success">
                    <h5 class="card-title text-bg-success "><?php echo count($jual) ?></h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-info card-body mb-3 card-neoraised border border-1 border-dark">
                <div class="card-header text-bg-info fw-bold"><?php echo $this->session->userdata('nama_member') ?></div>
                <div class="card-body text-bg-info">
                    <a href="<?php echo base_url('akun') ?>" class="btn btn-sm btn-light btn-neoraised w-100 fw-bold">Ubah Akun</a>
                </div>
            </div>
        </div>

    </div>
</div>