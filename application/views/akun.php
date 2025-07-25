<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <h2 class="fs-1 mb-4">Ubah Akun Member</h2>

            <div class="card card-brutalist p-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email_member" class="form-label font-ui fw-bold">EMAIL ANDA</label>
                        <input type="text" id="email_member" name="email_member" class="form-control" value="<?php echo set_value('email_member', $this->session->userdata('email_member')) ?>">
                        <span class="text-danger fst-italic small mt-1 d-block">
                            <?php echo form_error('email_member') ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="password_member" class="form-label font-ui fw-bold">PASSWORD</label>
                        <input type="password" id="password_member" name="password_member" class="form-control">
                        <p class="text-muted small mt-1">Kosongkan jika password tidak diubah.</p>
                    </div>
                    <hr class="my-4">
                    <div class="mb-3">
                        <label for="nama_member" class="form-label font-ui fw-bold">NAMA LENGKAP</label>
                        <input type="text" id="nama_member" name="nama_member" class="form-control" value="<?php echo set_value('nama_member', $this->session->userdata('nama_member')) ?>">
                        <span class="text-danger fst-italic small mt-1 d-block">
                            <?php echo form_error('nama_member') ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="wa_member" class="form-label font-ui fw-bold">NOMOR WA</label>
                        <input type="text" id="wa_member" name="wa_member" class="form-control" value="<?php echo set_value('wa_member', $this->session->userdata('wa_member')) ?>">
                        <span class="text-danger fst-italic small mt-1 d-block">
                            <?php echo form_error('wa_member') ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_member" class="form-label font-ui fw-bold">ALAMAT LENGKAP</label>
                        <input type="text" id="alamat_member" name="alamat_member" class="form-control" value="<?php echo set_value('alamat_member', $this->session->userdata('alamat_member')) ?>">
                        <span class="text-danger fst-italic small mt-1 d-block">
                            <?php echo form_error('alamat_member') ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">CARI LOKASI (KELURAHAN/KECAMATAN)</label>
                        <div class="input-group">
                            <input type="text" class="form-control cari" placeholder="Ketik nama lokasi...">
                            <button class="btn btn-hw-secondary btn-cari" type="button">Cari</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-ui fw-bold">KOTA/KABUPATEN</label>
                        <select name="kode_distrik_member" required class="form-control">
                            <option value="<?php echo $this->session->userdata('kode_distrik_member') ?>">
                                <?php echo $this->session->userdata('nama_distrik_member') ?>
                            </option>
                        </select>
                        <span class="text-danger fst-italic small mt-1 d-block"><?php echo form_error('kode_distrik_member') ?></span>
                    </div>

                    <input type="hidden" name="nama_distrik_member" class="form-control mb-2" value="<?php echo $this->session->userdata('nama_distrik_member') ?>" required>

                    <button class="btn btn-hw-primary w-100 mt-3">Ubah Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script ini tidak perlu diubah, hanya pastikan jQuery sudah dimuat di footer.
    $(document).ready(function() {
        $(document).on('click', '.btn-cari', function(e) {
            e.preventDefault();
            var keyword = $('.cari').val();
            if (keyword === '') {
                alert('Mohon masukkan kata kunci pencarian');
                return;
            }
            $.ajax({
                type: 'post',
                data: {
                    keyword: keyword
                }, // Mengirim data sebagai objek
                url: "<?php echo base_url('register/cari_distrik') ?>",
                beforeSend: function() {
                    $('.btn-cari').html('Mencari...').prop('disabled', true);
                },
                success: function(hasil) {
                    $("select[name='kode_distrik_member']").html(hasil);
                },
                complete: function() {
                    $('.btn-cari').html('Cari').prop('disabled', false);
                }
            })
        })

        $(document).on('change', "select[name='kode_distrik_member']", function() {
            var terpilih = $("option:selected", this).text(); // Menggunakan .text() lebih aman
            $("input[name='nama_distrik_member']").val(terpilih);
        })
    });
</script>