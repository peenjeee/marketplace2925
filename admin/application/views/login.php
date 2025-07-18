<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $this->config->item('url_logo') ?>" type="image/png" sizes="64x64">
    <title>Peenjeee Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="module" crossorigin src="<?= base_url('public/js/all.min.js'); ?>"></script>
    <link rel="stylesheet" crossorigin href="<?= base_url('public/css/all.css'); ?>">
    <script defer src="<?= base_url('public/js/all.js'); ?>"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<style>
    .scroll-top {
        position: fixed;
        bottom: 1rem;
        right: 1rem;
        display: none;
        z-index: 1000;
    }
</style>

<body style="background-image: url('<?php echo $this->config->item('url_logo') ?>'); height: 80vh; background-size: cover; background-position: center; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center;" class="bg-dark">
    <div class="scroll-top">
        <button class="btn btn-neoraised btn-warning btn-md-lg">
            <i class="bi bi-chevron-up"></i>
        </button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-5 offset-md-4 bg-warning p-5 card card-neoraised rounded border border-3 border-dark">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold fs-5">Username</label>
                        <input type="text" name="username" class="form-control card-neoraised fw-light" value="<?php echo set_value('username') ?>">
                        <div class="text-black small fst-italic mt-1">
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold fs-5">Password</label>
                        <input type="password" name="password" class="form-control card-neoraised fw-light" value="<?php echo set_value('password') ?>">
                    </div>
                    <div class="text-black small fst-italic">
                        <?php echo form_error('password') ?>
                    </div>
                    <button class="btn btn-danger btn-neoraised fw-bold">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if ($this->session->flashdata('pesan_gagal')) : ?>
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "<?php echo $this->session->flashdata('pesan_gagal') ?>",
                icon: "error"
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pesan_sukses')) : ?>
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "<?php echo $this->session->flashdata('pesan_sukses') ?>",
                icon: "success"
            });
        </script>
    <?php endif; ?>

    <script>
        window.addEventListener("scroll", function() {
            if (window.scrollY > 100) {
                document.querySelector(".scroll-top").style.display = "block";
            } else {
                document.querySelector(".scroll-top").style.display = "none";
            }
        });
        document.querySelector(".scroll-top").addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

</body>

</html>