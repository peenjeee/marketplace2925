<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Detail Member</h5>
            <table class="table table-bordered">
                <tr>
                    <td>Email Member</td>
                    <td><?php echo $member['email_member'] ?></td>
                </tr>
                <tr>
                    <td>Nama Member</td>
                    <td><?php echo $member['nama_member'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Member</td>
                    <td><?php echo $member['alamat_member'] ?></td>
                </tr>
                <tr>
                    <td>Wa Member</td>
                    <td><?php echo $member['wa_member'] ?></td>
                </tr>
                <tr>
                    <td>Kode Distrik Member</td>
                    <td><?php echo $member['kode_distrik_member'] ?></td>
                </tr>
                <tr>
                    <td>Nama Distrik Member</td>
                    <td><?php echo $member['nama_distrik_member'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-8">
            <h5>Transaksi Jual</h5>
            <table class="table table-bordered" id="tabelku">
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
                            <td><?php echo $k + 1 ?></td>
                            <td><?php echo $v['tanggal_transaksi'] ?></td>
                            <td><?php echo number_format($v['total_transaksi']) ?></td>
                            <td><?php echo $v['status_transaksi'] ?></td>
                            <td>
                                <a href="<?php echo base_url('transaksi/detail/' . $v['id_transaksi'] . '') ?>" class="btn btn-info">Detail</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <h5>Transaksi Beli</h5>
            <table class="table table-bordered" id="tabelku">
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
                    <?php foreach ($beli as $k => $v): ?>
                        <tr>
                            <td><?php echo $k + 1 ?></td>
                            <td><?php echo $v['tanggal_transaksi'] ?></td>
                            <td><?php echo number_format($v['total_transaksi']) ?></td>
                            <td><?php echo $v['status_transaksi'] ?></td>
                            <td>
                                <a href="<?php echo base_url('transaksi/detail/' . $v['id_transaksi'] . '') ?>" class="btn btn-info">Detail</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>