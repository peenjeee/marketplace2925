<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h5 class="mt-4 fs-3 fw-bold mb-3">Registrasi Member</h5>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Email</label>
                    <input type="text" name="email_member" class="form-control card-neoraised mb-2  fw-light" value="<?php echo set_value('email_member') ?>">
                    <span class="text-danger fst-italic"><?php echo form_error('email_member') ?></span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Password</label>
                    <input type="text" name="password_member" class="form-control card-neoraised mb-2 fw-light" value="<?php echo set_value('password_member') ?>">
                    <span class="text-danger fst-italic"><?php echo form_error('password_member') ?></span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nama</label>
                    <input type="text" name="nama_member" class="form-control card-neoraised mb-2 fw-light" value="<?php echo set_value('nama_member') ?>">
                    <span class="text-danger fst-italic"><?php echo form_error('nama_member') ?></span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat_member" class="form-control card-neoraised mb-2 fw-light" id=""><?php echo set_value('alamat_member') ?></textarea>
                    <span class="text-danger fst-italic"><?php echo form_error('alamat_member') ?></span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nomor Wa</label>
                    <input type="text" name="wa_member" class="form-control card-neoraised mb-2 fw-light" value="<?php echo set_value('wa_member') ?>">
                    <span class="text-danger fst-italic"><?php echo form_error('wa_member') ?></span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Kota/Kabupaten</label>

                    <select name="city_id" class="form-control card-neoraised mb-2 fw-light">
                        <option value="">Pilih</option>
                        <?php foreach ($distrik as $key => $value) : ?>
                            <option value="<?php echo $value['city_id'] ?>" <?php echo $value['city_id'] == set_value('city_id') ? 'selected' : '' ?>>
                                <?= $value['type'] ?>
                                <?= $value['city_name'] ?>,
                                <?= $value['province'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="text-danger fst-italic"><?php echo form_error('city_id') ?></span>
                </div>
                <button class="btn btn-success btn-neoraised fw-bold">Daftar</button>
            </form>
        </div>
    </div>
</div>