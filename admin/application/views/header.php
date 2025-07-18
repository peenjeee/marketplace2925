<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $this->config->item('url_logo') ?>" type="image/png" sizes="64x64">
    <title>Admin Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script type="module" crossorigin src="<?= base_url('public/js/all.min.js'); ?>"></script> -->
    <link rel="stylesheet" crossorigin href="<?= base_url('public/css/all.css'); ?>">
    <!-- <script defer src="<?= base_url('public/js/all.js'); ?>"></script> -->
    <!-- <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-neoraised-bottom navbar-expand-lg bg-warning  navbar-dark p-3">
        <div class="container">
            <a href="" class="navbar-brand fw-bolder text-black">Dashboard</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto gap-3">
                    <li class="nav-item">
                        <a href="<?= base_url('home') ?>" class="btn btn-neoraised btn-danger fw-bold">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('kategori') ?>" class="btn btn-neoraised btn-danger fw-bold">Kategori</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('artikel') ?>" class="btn btn-neoraised btn-danger fw-bold">Artikel</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('slider') ?>" class="btn btn-neoraised btn-danger fw-bold">Slider</a>
                    </li>


                    <li class="nav-item">
                        <a href="<?= base_url('produk') ?>" class="btn btn-neoraised btn-danger fw-bold">Produk</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('member') ?>" class="btn btn-neoraised btn-danger fw-bold">Member</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('transaksi') ?>" class="btn btn-neoraised btn-danger fw-bold">Transaksi</a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item">
                        <a href="<?php echo base_url("akun") ?>" class="btn btn-neoraised btn-danger fw-bold">
                            <?php echo $this->session->userdata('nama'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("logout") ?>" class="btn btn-neoraised btn-danger fw-bold">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>