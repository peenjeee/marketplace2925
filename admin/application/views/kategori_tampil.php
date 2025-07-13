<div class="container mt-4">
    <h5 class="fw-bold fs-3">Data Kategori</h5>
    <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategori as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo $v['nama_kategori'] ?></td>
                    <td class="fw-medium">
                        <img src="<?php echo $this->config->item('url_kategori') . $v['foto_kategori'] ?>" alt="" width="200">
                    </td>
                    <td class="d-flex gap-3">
                        <a href="<?php echo base_url('kategori/edit/' . $v['id_kategori'] . '') ?>" class="btn btn-warning fw-bold btn-neoraised">Edit</a>
                        <a href="<?php echo base_url('kategori/hapus/' . $v['id_kategori'] . '') ?>" class="btn btn-danger btn-neoraised fw-bold">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('kategori/tambah') ?>" class="btn btn-primary btn-neoraised fw-bold">Tambah Data</a>
</div>