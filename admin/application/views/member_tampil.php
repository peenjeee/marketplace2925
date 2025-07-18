<div class="container mt-4">
    <h5 class="fw-bold fs-3">Data Member</h5>
    <table class="table table-borderless card-neoraised border border-dark border-3" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Distrik</th>
                <th>WA
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($member as $k => $v): ?>
                <tr>
                    <td class="fw-medium"><?php echo $k + 1 ?></td>
                    <td class="fw-medium"><?php echo $v['nama_member'] ?></td>
                    <td class="fw-medium"><?php echo $v['email_member'] ?></td>
                    <td class="fw-medium"><?php echo $v['nama_distrik_member'] ?></td>
                    <td class="fw-medium"><?php echo $v['wa_member'] ?></td>
                    <td class="fw-medium">
                        <a href="<?php echo base_url('member/detail/' . $v['id_member'] . '') ?>" class="btn btn-info btn-neoraised fw-bold">Detail</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <tbody>
    </table>
</div>