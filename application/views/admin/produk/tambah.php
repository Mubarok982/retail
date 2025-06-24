<h3>Tambah Produk</h3>

<form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data">
    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" required><br><br>

    <label>Kategori:</label><br>
    <select name="id_kategori" required>
        <?php foreach($kategori as $k): ?>
            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <label>Gambar:</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit">Simpan</button>
</form>
