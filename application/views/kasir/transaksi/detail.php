<h3>Detail Transaksi</h3>

<a href="<?= base_url('kasir/transaksi/riwayat') ?>">← Kembali ke Riwayat</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>
    <?php $no = 1; $total = 0; foreach ($detail as $d): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d->nama_produk ?></td>
        <td><?= $d->jumlah ?></td>
        <td><?= number_format($d->subtotal) ?></td>
    </tr>
    <?php $total += $d->subtotal; endforeach; ?>
    <tr>
        <td colspan="3" align="right"><strong>Total</strong></td>
        <td><strong><?= number_format($total) ?></strong></td>
    </tr>
</table>
