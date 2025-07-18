<div class="container mt-4">
    <h5 class="fw-bold fs-3">Data Slider</h5>
    <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Caption</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slider as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo $v['caption_slider'] ?></td>
                    <td class="fw-medium">
                        <img src="<?php echo $this->config->item('url_slider') . $v['foto_slider'] ?>" alt="" width="200" class="card-neoraised">
                    </td>
                    <td class="d-flex gap-3">
                        <a href="<?php echo base_url('slider/edit/' . $v['id_slider'] . '') ?>" class="btn btn-warning btn-neoraised fw-bold">Edit</a>
                        <a href="<?php echo base_url('slider/hapus/' . $v['id_slider'] . '') ?>" class="btn btn-danger btn-neoraised fw-bold">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('slider/tambah') ?>" class="btn btn-primary btn-neoraised fw-bold">Tambah Data</a>
</div>