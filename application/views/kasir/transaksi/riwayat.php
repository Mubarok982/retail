<h3>Riwayat Transaksi</h3>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Total</th><th>Aksi</th>
    </tr>
    <?php $no=1; foreach ($transaksi as $t): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $t->tanggal ?></td>
        <td><?= $t->nama_pelanggan ?></td>
        <td><?= number_format($t->total) ?></td>
        <td>
            <a href="<?= base_url('kasir/transaksi/detail/'.$t->id_transaksi) ?>">Detail</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
