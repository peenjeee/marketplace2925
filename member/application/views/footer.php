<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content card-neoraised bg-warning">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="loginLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('welcome') ?>" method="post">
                    <div class="mb-3">
                        <label for="" class="fw-bold">Username</label>
                        <input type="text" name="email_member" class="form-control card-neoraised fw-light" value="<?php echo set_value('email_member') ?>">
                        <div class="text-danger small">
                            <?php echo form_error('email_member') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold">Password</label>
                        <input type="password" name="password_member" class="form-control card-neoraised fw-light" value="<?php echo set_value('password_member') ?>">
                    </div>
                    <div class="text-danger small">
                        <?php echo form_error('password_member') ?>
                    </div>
                    <button class="btn btn-neoraised btn-danger fw-bold">Login</button>
                </form>
            </div>

        </div>
    </div>
</div>

<footer class="text-center py-3 mt-5">
    <div class="fw-bolder">Copyright &copy; <?php echo date('Y'); ?>, Peenjeee</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    new DataTable('#tabelku');
</script>
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