<div class="container mt-4">
    <h5 class="fw-bold fs-3">Data Produk</h5>
    <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo $v['nama_produk'] ?></td>
                    <td class="fw-medium"><?php echo number_format($v['harga_produk']) ?></td>
                    <td class="fw-medium"><img src="<?php echo $this->config->item('url_produk') . $v['foto_produk'] ?>" alt="" width="100" class="card card-neoraised"></td>
                    <td>
                        <a href="<?php echo base_url('produk/detail/' . $v['id_produk'] . '') ?>" class="btn btn-info btn-neoraised fw-bold">Detail</a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>