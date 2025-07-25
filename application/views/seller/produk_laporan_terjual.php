<div class="container my-5">
    <h2 class="fs-1 mb-4">Laporan Produk Terjual</h2>

    <div class="card card-brutalist p-4 mb-5">
        <form method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label font-ui fw-bold">MULAI</label>
                    <input type="date" name="tglm" class="form-control" value="<?php echo $tglm ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label font-ui fw-bold">SELESAI</label>
                    <input type="date" name="tgls" class="form-control" value="<?php echo $tgls ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label font-ui fw-bold">STATUS</label>
                    <select name="status" class="form-control">
                        <option value="pesan" <?php echo $status == 'pesan' ? 'selected' : ''; ?>>Pesan</option>
                        <option value="lunas" <?php echo $status == 'lunas' ? 'selected' : ''; ?>>Lunas</option>
                        <option value="dikirim" <?php echo $status == 'dikirim' ? 'selected' : ''; ?>>Dikirim</option>
                        <option value="selesai" <?php echo $status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                        <option value="batal" <?php echo $status == 'batal' ? 'selected' : ''; ?>>Batal</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-hw-primary w-100">Lihat Laporan</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card card-brutalist p-2 mb-5">
        <div class="table-responsive">
            <table class="table table-borderless" id="tabelku" style="margin-bottom: 0;">
                <thead class="font-ui">
                    <tr style="border-bottom: 2px solid var(--color-text);">
                        <th class="p-3">No</th>
                        <th class="p-3">Produk</th>
                        <th class="p-3">Jumlah Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan_terjual as $key => $value): ?>
                        <tr style="border-bottom: 1px solid var(--color-border);">
                            <td class="p-3 fw-bold"><?php echo $key + 1 ?></td>
                            <td class="p-3"><?php echo $value['nama_beli'] ?></td>
                            <td class="p-3"><?php echo $value['jumlah_terjual'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-brutalist">
        <figure class="highcharts-figure mb-0">
            <div id="container"></div>
        </figure>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column',
            backgroundColor: 'transparent',
            style: {
                fontFamily: 'var(--font-body)'
            }
        },
        title: {
            text: 'Grafik Produk Terjual',
            style: {
                fontFamily: 'var(--font-display)',
                textTransform: 'uppercase'
            }
        },
        xAxis: {
            categories: [
                <?php foreach ($laporan_terjual as $key => $value): ?> '<?php echo addslashes($value['nama_beli']) ?>',
                <?php endforeach ?>
            ],
            crosshair: true,
            labels: {
                style: {
                    fontFamily: 'var(--font-ui)'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Item Terjual',
                style: {
                    fontFamily: 'var(--font-ui)'
                }
            }
        },
        tooltip: {
            valueSuffix: ' Item'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 2,
                borderColor: 'var(--color-text)',
                color: 'var(--color-accent-blue)'
            }
        },
        series: [{
            name: 'Produk',
            data: [
                <?php if (empty($laporan_terjual)): ?>
                    0
                <?php else: ?>
                    <?php foreach ($laporan_terjual as $key => $value): ?>
                        <?php echo $value['jumlah_terjual'] ?>,
                    <?php endforeach ?>
                <?php endif ?>
            ]
        }],
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        }
    });
</script>