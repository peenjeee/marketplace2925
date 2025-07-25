<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $this->config->item('url_logo') ?>" type="image/png" sizes="64x64">
    <title>Hot Wheels - Brutalist Concept</title>

    <!-- Frameworks & Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" crossorigin href="<?= base_url('public/css/brutals.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Animation happens only once
            duration: 800,
        });
    </script>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" style="position: fixed; bottom: 1rem; right: 1rem; display: none; z-index: 1000;">
        <button id="scrollTopBtn" class="btn btn-hw-primary"><i class="bi bi-arrow-up"></i></button>
    </div>

    <!-- Brutalist Navigation -->
    <nav class="navbar navbar-expand-lg navbar-brutalist p-2">
        <div class="container">
            <a href="<?= base_url() ?>" class="navbar-brand fw-bold fs-4">HOT WHEELS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#naff" style="border-color: white;">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto gap-1">
                    <li class="nav-item"><a href="<?= base_url('kategori') ?>" class="nav-link">Series</a></li>
                    <li class="nav-item"><a href="<?= base_url('produk') ?>" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="<?= base_url('artikel') ?>" class="nav-link">The Garage</a></li>
                    <?php if ($this->session->userdata('id_member')) : ?>
                        <li class="nav-item"><a href="<?= base_url('keranjang') ?>" class="nav-link">Cart</a></li>
                    <?php endif; ?>
                </ul>

                <div class="d-flex flex-wrap gap-2">
                    <?php if ($this->session->userdata('id_member')) : ?>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Seller
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url("seller/produk") ?>">Produk Saya</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url("seller/produk/laporan_terjual") ?>">Laporan Penjualan</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url("seller/transaksi") ?>">Penjualan Saya</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url("transaksi") ?>">Pembelian Saya</a></li>
                            </ul>
                        </div>
                        <a href="<?php echo base_url("home") ?>" class="btn btn-hw-primary">Dashboard</a>
                        <a href="<?php echo base_url("logout") ?>" class="btn btn-hw-primary">Logout</a>
                    <?php else : ?>
                        <button type="button" class="btn btn-hw-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        <a href="<?php echo base_url("register") ?>" class="btn btn-hw-primary">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>