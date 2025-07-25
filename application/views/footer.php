<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-ui" id="loginModalLabel">MEMBER LOGIN</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="<?php echo base_url('welcome') ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="mb-3">
                        <label for="email_member" class="fw-bold font-ui">USERNAME</label>
                        <input id="email_member" type="text" name="email_member" class="form-control" value="<?php echo set_value('email_member') ?>">
                    </div>
                    <div class="mb-4">
                        <label for="password_member" class="fw-bold font-ui">PASSWORD</label>
                        <input id="password_member" type="password" name="password_member" class="form-control">
                    </div>
                    <button class="btn btn-hw-primary w-100">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Minimalist Footer -->
<footer class="text-center py-4 mt-5" style="border-top: 2px solid var(--color-text);">
    <div class="font-ui fw-bold">© <?php echo date('Y'); ?> HOT WHEELS // BRUTALIST CONCEPT BY PEENJEEE</div>
</footer>

<!-- Core JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url('public/js/dataTable.js'); ?>"></script>
<script src="<?= base_url('public/js/table.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.22.1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editorku');
</script>
<script>
    new DataTable('#tabelku');
</script>
<script>
    for (let i = 1; i <= 10; i++) {
        new DataTable(`#tabelku${i}`);
    }
</script>



<!-- Custom Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollTopBtn = document.getElementById("scrollTopBtn");
        if (scrollTopBtn) {
            window.addEventListener("scroll", function() {
                if (window.scrollY > 200) {
                    scrollTopBtn.parentElement.style.display = "block";
                } else {
                    scrollTopBtn.parentElement.style.display = "none";
                }
            });
            scrollTopBtn.addEventListener("click", function() {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        }
    });
</script>

<!-- Flash Message Popups with Brutalist Theme -->
<?php if ($this->session->flashdata('pesan_gagal')) : ?>
    <script>
        Swal.fire({
            title: "Gagal!",
            text: "<?php echo $this->session->flashdata('pesan_gagal') ?>",
            icon: "error",
            confirmButtonText: 'OK',
            customClass: {
                popup: 'card card-brutalist',
                confirmButton: 'btn btn-hw-primary',
                title: 'font-ui'
            },
            buttonsStyling: false,
            background: 'var(--color-background)'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('pesan_sukses')) : ?>
    <script>
        Swal.fire({
            title: "Sukses!",
            text: "<?php echo $this->session->flashdata('pesan_sukses') ?>",
            icon: "success",
            confirmButtonText: 'OK',
            customClass: {
                popup: 'card card-brutalist',
                confirmButton: 'btn btn-hw-primary',
                title: 'font-ui'
            },
            buttonsStyling: false,
            background: 'var(--color-background)'
        });
    </script>
<?php endif; ?>

</body>

</html>