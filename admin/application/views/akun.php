<div class="container mt-4">
    <h5 class="fw-bold fs-3">Ubah Akun</h5>
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" class="form-control card-neoraised fw-light" value="<?php echo set_value('username', $this->session->userdata('username')) ?>">
                    <span class="text-danger small fst-italic mt-2">
                        <?php echo form_error('username') ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control card-neoraised fw-light">
                    <p class="text-danger small fst-italic mt-1">Kosongkan jika password tidak diubah</p>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control card-neoraised fw-light" value="<?php echo set_value('nama', $this->session->userdata('nama')) ?>">
                    <span class="text-danger small fst-italic mt-2">
                        <?php echo form_error('nama') ?>
                    </span>
                </div>
                <button class="btn btn-primary btn-neoraised fw-bold">Ubah Akun</button>
            </form>
        </div>
    </div>
</div>