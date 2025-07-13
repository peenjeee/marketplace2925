<div class="container mt-4">
    <h5 class="fw-bold fs-3">Data Transaksi</h5>
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
            <?php foreach ($transaksi as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo $v['tanggal_transaksi'] ?></td>
                    <td class="fw-medium"><?php echo number_format($v['total_transaksi']) ?></td>
                    <td class="fw-medium"><?php echo $v['status_transaksi'] ?></td>
                    <td>
                        <a href="<?php echo base_url('transaksi/detail/' . $v['id_transaksi'] . '') ?>" class="btn btn-info btn-neoraised fw-bold">Detail</a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>