<div class="container">
    <h5>Data artikel</h5>
    <table class="table table-bordered" id="tabelku">
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
                    <td><?php echo $k + 1 ?></td>
                    <td><?php echo $v['judul_artikel'] ?></td>
                    <td>
                        <img src="<?php echo $this->config->item('url_artikel') . $v['foto_artikel'] ?>" alt="" width="200">
                    </td>
                    <td>
                        <a href="<?php echo base_url('artikel/edit/' . $v['id_artikel'] . '') ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url('artikel/hapus/' . $v['id_artikel'] . '') ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('artikel/tambah') ?>" class="btn btn-primary">Tambah Data</a>
</div>