<div class="container mt-4">

    <?php if (empty($produk)): ?>
        <div class="alert alert-warning card-neoraised mt-4 fw-bold fs-6" role="alert">
            Anda belum mempunyai produk, silahkan tambah produk untuk memulai jualan
        </div>
    <?php endif ?>

    <div class="card border-0">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-4">Produk Jual <?php echo $this->session->userdata('nama_member') ?></h5>

            <table class="mt-3 table table-borderless card-neoraised border border-dark border-3" id="tabelku">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
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
                            <td class="fw-medium"><?php echo $v['berat_produk'] ?></td>
                            <td>
                                <img src="<?php echo $this->config->item('url_produk') . $v['foto_produk'] ?>" alt="" width="100">
                            </td>
                            <td class="d-flex gap-3">
                                <a href="<?php echo base_url('seller/produk/edit/' . $v['id_produk']) ?>" class="btn btn-warning btn-neoraised fw-bold">Edit</a>
                                <a href="<?php echo base_url('seller/produk/hapus/' . $v['id_produk']) ?>" class="btn btn-danger btn-neoraised fw-bold">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="<?php echo base_url('seller/produk/tambah') ?>" class="btn btn-primary btn-neoraised fw-bold">Tambah</a>
        </div>
    </div>


</div>