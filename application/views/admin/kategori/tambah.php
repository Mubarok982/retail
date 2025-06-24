<h3>Tambah Kategori</h3>

<form method="post" action="<?= base_url('admin/kategori/simpan') ?>">
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
