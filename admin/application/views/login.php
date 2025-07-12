<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-5 offset-md-4 bg-white p-5 shadow">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>">
                        <div class="text-danger small">
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo set_value('password') ?>">
                    </div>
                    <div class="text-danger small">
                        <?php echo form_error('password') ?>
                    </div>
                    <button class="btn btn-primary">Login</button>
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
</body>

</html>