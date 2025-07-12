<div class="container mt-4">
    <h3 class="fw-bold fs-3">Laporan Produk Terjual</h3>

    <form method="post" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="" class="fw-bold form-label">Mulai</label>
                <input type="date" name="tglm" class="form-control card-neoraised fw-light" value="<?php echo $tglm ?>">
            </div>
            <div class="col-md-3">
                <label for="" class="fw-bold form-label">Selesai</label>
                <input type="date" name="tgls" class="form-control card-neoraised fw-light" value="<?php echo $tgls ?>">
            </div>
            <div class="col-md-3">
                <label for="" class="fw-bold form-label">Status</label>
                <select name="status" class="form-control form-select card-neoraised fw-light">
                    <option value="selesai" <?php echo $status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                    <option value="pesan" <?php echo $status == 'pesan' ? 'selected' : ''; ?>>Pesan</option>
                    <option value="batal" <?php echo $status == 'batal' ? 'selected' : ''; ?>>Batal</option>
                </select>
            </div>
            <div class="col-md-3">
                <br>
                <button class="btn btn-primary btn-neoraised fw-bold">Lihat</button>
            </div>
        </div>
    </form>

    <table class="table table-borderless card-neoraised border border-dark border-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah Terjual</th>
                <th>Nominal Terjual</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan_terjual as $key => $value): ?>
                <tr>
                    <td class="fw-medium"><?php echo $key + 1 ?></td>
                    <td class="fw-medium"><?php echo $value['nama_beli'] ?></td>
                    <td class="fw-medium"><?php echo $value['jumlah_terjual'] ?></td>
                    <td class="fw-medium"><?php echo number_format($value['nominal_terjual']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<figure class="highcharts-figure">
    <div id="container" class="container">

    </div>
</figure>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<b>Laporan Produk Terjual</b>'
        },
        xAxis: {
            categories: [
                <?php foreach ($laporan_terjual as $key => $value): ?> '<b><?php echo addslashes($value['nama_beli']) ?></b>',
                <?php endforeach ?>
            ],
            crosshair: true,
            accessibility: {
                description: '<b>Produk</b>'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Item</b>'
            }
        },
        tooltip: {
            valueSuffix: ' <b>Item</b>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '<b>Produk</b>',
            data: [
                <?php foreach ($laporan_terjual as $key => $value): ?>
                    <?php echo $value['jumlah_terjual'] ?>,
                <?php endforeach ?>
            ]
        }, ]
    });
</script>