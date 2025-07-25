<div class="container my-5">
    <h2 class="fs-1 mb-4">Data Transaksi Jual</h2>
    <div class="card card-brutalist p-2">
        <div class="table-responsive">
            <table class="table table-borderless" id="tabelku" style="margin-bottom: 0;">
                <thead class="font-ui">
                    <tr style="border-bottom: 2px solid var(--color-text);">
                        <th class="p-3">No</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Total</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jual as $k => $v): ?>
                        <tr style="border-bottom: 1px solid var(--color-border);">
                            <td class="p-3 align-middle fw-bold"><?php echo $k + 1 ?></td>
                            <td class="p-3 align-middle"><?php echo date('d M Y H:i', strtotime($v['tanggal_transaksi'])) ?></td>
                            <td class="p-3 align-middle">Rp. <?php echo number_format($v['total_transaksi']) ?></td>
                            <td class="p-3 align-middle">
                                <span class="badge p-2 font-ui" style="background-color: var(--color-accent-blue); color: white; border: 2px solid var(--color-text);"><?php echo $v['status_transaksi'] ?></span>
                                <p class="mb-0 mt-1 small">Resi: <?php echo $v['resi_ekspedisi'] ? $v['resi_ekspedisi'] : '-' ?></p>
                            </td>
                            <td class="p-3 align-middle">
                                <a href="<?php echo base_url('seller/transaksi/detail/' . $v['id_transaksi']) ?>" class="btn btn-hw-secondary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>