<?php if (!$member_jual || $member_jual['id_member'] != $keranjang[0]['id_member_jual']) {
    redirect('keranjang');
} ?>

<div class="container my-5">
    <h2 class="fs-1 mb-4">Checkout</h2>
    <div class="row g-5">
        <!-- Kolom Kiri: Detail Belanja & Alamat -->
        <div class="col-md-7">
            <!-- Tabel Produk -->
            <h3 class="font-ui mb-3">PRODUK DI KERANJANG</h3>
            <div class="table-responsive card card-brutalist p-2">
                <table class="table table-borderless" style="margin-bottom: 0;">
                    <thead class="font-ui">
                        <tr style="border-bottom: 2px solid var(--color-text);">
                            <th>Produk</th>
                            <th>Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($keranjang as $k => $per_produk) : ?>
                            <?php $subtotal = $per_produk['harga_produk'] * $per_produk['jumlah'] ?>
                            <?php $total += $subtotal ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('produk/detail/' . $per_produk['id_produk']) ?>" class="text-decoration-none text-dark d-flex align-items-center">
                                        <img src="<?= $this->config->item('url_produk') . $per_produk['foto_produk'] ?>" alt="" width="50" style="border: 1px solid var(--color-border); margin-right: 10px;">
                                        <span class="fw-bold"><?= $per_produk['nama_produk'] ?></span>
                                    </a>
                                </td>
                                <td>Rp. <?= number_format($per_produk['harga_produk']) ?></td>
                                <td class="text-center">
                                    <form action="<?php echo base_url('keranjang/update/' . $per_produk['id_keranjang']) ?>" method="post" class="d-inline">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="number" name="jumlah" class="form-control form-control-sm text-center" value="<?= $per_produk['jumlah'] ?>" min="1" onchange="this.form.submit()" style="width: 70px; margin: auto;">
                                    </form>
                                </td>
                                <td class="text-end">Rp. <?= number_format($subtotal) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Detail Alamat -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card card-brutalist p-3 h-100">
                        <h5 class="font-ui">DIKIRIM DARI</h5>
                        <hr>
                        <p class="mb-1 fw-bold"><?php echo $member_jual['nama_member'] ?></p>
                        <p class="mb-1"><?php echo $member_jual['alamat_member'] ?></p>
                        <p class="mb-0 text-muted"><?php echo $member_jual['nama_distrik_member'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-brutalist p-3 h-100">
                        <h5 class="font-ui">DIKIRIM KE</h5>
                        <hr>
                        <p class="mb-1 fw-bold"><?php echo $member_beli['nama_member'] ?></p>
                        <p class="mb-1"><?php echo $member_beli['alamat_member'] ?></p>
                        <p class="mb-0 text-muted"><?php echo $member_beli['nama_distrik_member'] ?></p>
                        <p class="mb-0 text-muted"><?php echo $member_beli['wa_member'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan & Pembayaran -->
        <div class="col-md-5">
            <div class="card card-brutalist p-4">
                <h3 class="font-ui mb-3">RINGKASAN</h3>
                <form method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <!-- Bagian Kupon yang Dikembalikan -->
                    <div class="mb-3">
                        <label for="kode_kupon" class="form-label font-ui fw-bold">PUNYA KUPON?</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kode_kupon" placeholder="Masukkan kode...">
                            <button class="btn btn-hw-secondary" type="button" id="apply-coupon-btn">Terapkan</button>
                        </div>
                        <div id="coupon-message" class="mt-2 small"></div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Belanja</span>
                        <span id="total-belanja">Rp. <?php echo number_format($total) ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Ongkos Kirim</span>
                        <span id="ongkir-terpilih">Rp. 0</span>
                    </div>
                    <div class="d-flex justify-content-between text-success" id="diskon-row" style="display: none;">
                        <span>Diskon</span>
                        <span id="diskon-terpakai">- Rp. 0</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>Total Tagihan</span>
                        <span id="total-tagihan">Rp. <?php echo number_format($total) ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="ongkir-select" class="form-label font-ui fw-bold">PENGIRIMAN</label>
                        <select name="ongkir" class="form-control" id="ongkir-select" required>
                            <option value="">Pilih Pengiriman...</option>
                            <?php foreach ($biaya as $key => $value) : ?>
                                <option value="<?php echo $key ?>" data-cost="<?php echo $value['cost'] ?>">
                                    <?php echo $value['name'] ?> (<?php echo $value['service'] ?>) - Rp. <?php echo number_format($value['cost']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small fst-italic mt-1"><?php echo form_error('ongkir') ?></div>
                    </div>

                    <button class="btn btn-hw-primary w-100 mt-2">BAYAR SEKARANG</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalBelanja = <?= $total ?>;
        let ongkirValue = 0;
        let diskonValue = 0;

        const ongkirSelect = document.getElementById('ongkir-select');
        const applyCouponBtn = document.getElementById('apply-coupon-btn');
        const csrfTokenName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        let csrfTokenHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        function updateSummary() {
            const totalTagihan = totalBelanja + ongkirValue - diskonValue;
            document.getElementById('ongkir-terpilih').textContent = `Rp. ${ongkirValue.toLocaleString('id-ID')}`;
            document.getElementById('total-tagihan').textContent = `Rp. ${totalTagihan.toLocaleString('id-ID')}`;
        }

        ongkirSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            ongkirValue = selectedOption.value ? parseInt(selectedOption.getAttribute('data-cost')) : 0;
            updateSummary();
        });

        // Logika Kupon yang Dikembalikan
        applyCouponBtn.addEventListener('click', function() {
            const kodeKupon = document.getElementById('kode_kupon').value;
            const couponMessage = document.getElementById('coupon-message');

            if (!kodeKupon) {
                couponMessage.innerHTML = '<div class="text-danger">Silakan masukkan kode kupon.</div>';
                return;
            }

            this.disabled = true;
            this.innerHTML = '...';

            const formData = new FormData();
            formData.append('kode_kupon', kodeKupon);
            formData.append('id_member_jual', '<?= $member_jual['id_member'] ?>');
            formData.append(csrfTokenName, csrfTokenHash);

            fetch("<?= base_url('keranjang/apply_coupon') ?>", {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    csrfTokenHash = data.csrf_hash; // Update CSRF token
                    if (data.status === 'success') {
                        couponMessage.innerHTML = `<div class="text-success">${data.message}</div>`;
                        diskonValue = parseFloat(data.diskon);
                        document.getElementById('diskon-row').style.display = 'flex';
                        document.getElementById('diskon-terpakai').textContent = `- Rp. ${diskonValue.toLocaleString('id-ID')}`;
                    } else {
                        couponMessage.innerHTML = `<div class="text-danger">${data.message}</div>`;
                        diskonValue = 0;
                        document.getElementById('diskon-row').style.display = 'none';
                    }
                    updateSummary();
                })
                .catch(error => {
                    couponMessage.innerHTML = '<div class="text-danger">Terjadi kesalahan.</div>';
                    console.error('Error:', error);
                })
                .finally(() => {
                    this.disabled = false;
                    this.innerHTML = 'Terapkan';
                });
        });
    });
</script>