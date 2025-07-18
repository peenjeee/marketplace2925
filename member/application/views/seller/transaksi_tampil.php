<div class="container">
    <h5 class="fw-bold fs-3 mt-4">Data Transaksi Jual <?php echo $this->session->userdata('nama_member') ?></h5>
    <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jual as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo date('d M Y H:i', strtotime($v['tanggal_transaksi'])) ?></td>
                    <td class="fw-medium"><?php echo number_format($v['total_transaksi']) ?></td>
                    <td class="fw-medium">
                        <span class="badge bg-info card-neoraised mb-2 fs-6"><?php echo $v['status_transaksi'] ?></span>
                        <h6 class="fw-medium">Resi : <?php echo $v['resi_ekspedisi'] ?></h6>
                    </td>
                    <td class="fw-medium">
                        <a href="<?php echo base_url('seller/transaksi/detail/' . $v['id_transaksi'] . '') ?>" class="btn btn-primary btn-neoraised fw-bold">Detail</a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>