<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <a href="" class="navbar-brand">Admin</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('kategori') ?>" class="nav-link">Kategori</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('artikel') ?>" class="nav-link">Artikel</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('slider') ?>" class="nav-link">Slider</a>
                    </li>


                    <li class="nav-item">
                        <a href="<?= base_url('produk') ?>" class="nav-link">Produk</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('member') ?>" class="nav-link">Member</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('transaksi') ?>" class="nav-link">Transaksi</a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("akun") ?>" class="nav-link">
                            <?php echo $this->session->userdata('nama'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>