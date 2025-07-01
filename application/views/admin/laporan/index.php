<?php $this->load->view('templates/sidebar_admin'); ?>
<h3>Laporan Penjualan</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Kasir</th><th>Total</th><th>Aksi</th>
    </tr>
    <?php $no = 1; foreach ($laporan as $l): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $l->tanggal ?></td>
        <td><?= $l->nama_pelanggan ?></td>
        <td><?= $l->nama_user ?></td>
        <td>Rp <?= number_format($l->total) ?></td>
        <td><a href="<?= base_url('admin/laporan/detail/' . $l->id_transaksi) ?>">Detail</a></td>
    </tr>
    <?php endforeach; ?>
</table>
