<footer class="bg-light text-center py-3 mt-5">
    <div class="">copyright &copy; 2025, Peenjeee</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    new DataTable('#tabelku');
</script>
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
    CKEDITOR.replace('editorku');
</script>
</body>

</html>