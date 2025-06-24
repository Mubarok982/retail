<h3>Transaksi Penjualan</h3>

<form method="post" action="<?= base_url('kasir/transaksi/tambah_ke_keranjang') ?>">
    <select name="id_produk">
        <?php foreach ($produk as $p): ?>
            <option value="<?= $p->id_produk ?>"><?= $p->nama_produk ?> - Rp <?= number_format($p->harga) ?></option>
        <?php endforeach; ?>
    </select>
    Jumlah: <input type="number" name="jumlah" required>
    <button type="submit">Tambah</button>
</form>

<hr>

<h4>Keranjang Belanja</h4>
<table border="1" cellpadding="5">
    <tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>
    <?php $total = 0; foreach ($keranjang as $item): ?>
    <tr>
        <td><?= $item['nama_produk'] ?></td>
        <td><?= number_format($item['harga']) ?></td>
        <td><?= $item['jumlah'] ?></td>
        <td><?= number_format($item['subtotal']) ?></td>
    </tr>
    <?php $total += $item['subtotal']; endforeach; ?>
    <tr><td colspan="3"><strong>Total</strong></td><td><strong>Rp <?= number_format($total) ?></strong></td></tr>
</table>

<form method="post" action="<?= base_url('kasir/transaksi/simpan') ?>">
    <select name="id_pelanggan" required>
        <option value="">Pilih Pelanggan</option>
        <?php foreach ($pelanggan as $pl): ?>
            <option value="<?= $pl->id_pelanggan ?>"><?= $pl->nama_pelanggan ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Simpan Transaksi</button>
</form>
<form method="post" action="<?= base_url('kasir/transaksi/batal') ?>">
    <button type="submit">Batal</button>
</form>
