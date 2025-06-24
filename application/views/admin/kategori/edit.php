<h3>Edit Kategori</h3>

<form method="post" action="<?= base_url('admin/kategori/update') ?>">
    <input type="hidden" name="id_kategori" value="<?= $kategori->id_kategori ?>">

    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" value="<?= $kategori->nama_kategori ?>" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"><?= $kategori->deskripsi ?></textarea><br><br>

    <button type="submit">Update</button>
</form>
