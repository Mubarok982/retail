<h3>Edit Produk</h3>

<form action="<?= base_url('admin/produk/update') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
    <input type="hidden" name="gambar_lama" value="<?= $produk->gambar ?>">

    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" value="<?= $produk->nama_produk ?>" required><br><br>

    <label>Kategori:</label><br>
    <select name="id_kategori" required>
        <?php foreach($kategori as $k): ?>
            <option value="<?= $k->id_kategori ?>" <?= ($k->id_kategori == $produk->id_kategori) ? 'selected' : '' ?>>
                <?= $k->nama_kategori ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="<?= $produk->harga ?>" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= $produk->stok ?>" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"><?= $produk->deskripsi ?></textarea><br><br>

    <label>Gambar Saat Ini:</label><br>
    <?php if ($produk->gambar): ?>
        <img src="<?= base_url('uploads/' . $produk->gambar) ?>" width="80"><br>
    <?php else: ?>
        <em>Tidak ada gambar</em><br>
    <?php endif; ?>
    <label>Ganti Gambar (opsional):</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit">Update</button>
</form>
