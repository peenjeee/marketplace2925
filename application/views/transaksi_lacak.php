<style>
    .timeline {
        list-style: none;
        padding: 0;
        position: relative;
    }

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: var(--color-text);
        left: 20px;
        margin-left: -1.5px;
    }

    .timeline>li {
        margin-bottom: 20px;
        position: relative;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li>.timeline-panel {
        width: calc(100% - 75px);
        float: right;
        position: relative;
    }

    .timeline>li>.timeline-badge {
        color: #fff;
        width: 40px;
        height: 40px;
        line-height: 40px;
        font-size: 1.4em;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        border-radius: 50%;
        border: 2px solid var(--color-text);
    }

    .timeline-badge.success {
        background-color: var(--color-accent-blue) !important;
    }

    .timeline-badge.info {
        background-color: var(--color-accent-flame) !important;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fs-1 mb-0">Lacak Pengiriman</h2>
                <a href="<?= base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>" class="btn btn-hw-secondary">Kembali</a>
            </div>

            <div class="card card-brutalist p-4">
                <?php if (isset($hasil_lacak['data']['manifest']) && !empty($hasil_lacak['data']['manifest'])): ?>
                    <div class="mb-4">
                        <p class="mb-1"><strong>Nomor Resi:</strong> <?= htmlspecialchars($hasil_lacak['data']['summary']['waybill_number']); ?></p>
                        <p class="mb-1"><strong>Kurir:</strong> <?= htmlspecialchars($hasil_lacak['data']['summary']['courier_name']); ?></p>
                        <p class="mb-0"><strong>Status:</strong> <span class="fw-bold" style="color: var(--color-accent-blue);"><?= htmlspecialchars($hasil_lacak['data']['summary']['status']); ?></span></p>
                    </div>
                    <hr>
                    <ul class="timeline mt-4">
                        <?php foreach ($hasil_lacak['data']['manifest'] as $index => $m): ?>
                            <li>
                                <div class="timeline-badge <?= $index == 0 ? 'success' : 'info'; ?>">
                                    <i class="bi <?= $index == 0 ? 'bi-check-lg' : 'bi-box-seam'; ?>"></i>
                                </div>
                                <div class="timeline-panel card card-brutalist p-3">
                                    <h5 class="font-ui mb-1"><?= htmlspecialchars($m['manifest_description']); ?></h5>
                                    <p class="text-muted mb-0">
                                        <?= htmlspecialchars($m['manifest_date'] . ' ' . $m['manifest_time']); ?>
                                        di <?= htmlspecialchars($m['city_name']); ?>
                                    </p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div class="text-center p-4">
                        <h4 class="font-ui">GAGAL MELACAK</h4>
                        <p class="text-muted mt-2"><?= htmlspecialchars($hasil_lacak['meta']['message'] ?? 'Data pelacakan tidak dapat ditemukan.'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>