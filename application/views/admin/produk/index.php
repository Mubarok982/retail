<h3>Data Produk</h3>
<a href="<?= base_url('admin/produk/tambah') ?>">+ Tambah Produk</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Gambar</th> 
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach ($produk as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_produk ?></td>
        <td><?= $p->nama_kategori ?></td>
        <td><?= number_format($p->harga) ?></td>
        <td><?= $p->stok ?></td>
        <td>
            <?php if ($p->gambar): ?>
                <img src="<?= base_url('uploads/'.$p->gambar) ?>" width="70">
            <?php else: ?>
                <em>Tidak ada</em>
            <?php endif; ?>
        </td>
        <td>
            <a href="<?= base_url('admin/produk/edit/'.$p->id_produk) ?>">Edit</a> |
            <a href="<?= base_url('produk/hapus/'.$p->id_produk) ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
