<div class="container mt-4">
    <h5 class="fw-bold fs-3">Data artikel</h5>
    <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artikel as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo $v['judul_artikel'] ?></td>
                    <td class="fw-medium">
                        <img src="<?php echo $this->config->item('url_artikel') . $v['foto_artikel'] ?>" alt="" width="200" class="card-neoraised">
                    </td>
                    <td class="d-flex gap-3">
                        <a href="<?php echo base_url('artikel/edit/' . $v['id_artikel'] . '') ?>" class="btn btn-warning card-neoraised fw-bold">Edit</a>
                        <a href="<?php echo base_url('artikel/hapus/' . $v['id_artikel'] . '') ?>" class="btn btn-danger card-neoraised fw-bold">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('artikel/tambah') ?>" class="btn btn-primary btn-neoraised fw-bold">Tambah Data</a>
</div>