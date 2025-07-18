<?php if ($member) : ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold fs-3">Detail Member</h5>
                <table class="table table-borderless card card-neoraised border border-dark border-3">
                    <tr>
                        <td class="fw-medium">Email Member</td>
                        <td class="fw-light"><?php echo $member['email_member'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Nama Member</td>
                        <td class="fw-light"><?php echo $member['nama_member'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Alamat Member</td>
                        <td class="fw-light"><?php echo $member['alamat_member'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Wa Member</td>
                        <td class="fw-light"><?php echo $member['wa_member'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Kode Distrik Member</td>
                        <td class="fw-light"><?php echo $member['kode_distrik_member'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Nama Distrik Member</td>
                        <td class="fw-light"><?php echo $member['nama_distrik_member'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8">
                <h5 class="fw-bold fs-3">Transaksi Jual</h5>
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

                <h5 class="fw-bold fs-3">Transaksi Beli</h5>
                <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku1">
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
        </div>
    </div>
<?php else: ?>
    <h1 class="text-center mt-5">Member tidak ditemukan.</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="<?= base_url('member'); ?>" class="btn btn-primary btn-neoraised fw-bold">Kembali</a>
    </div>
<?php endif; ?>