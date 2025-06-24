<h3>Tambah User</h3>

<form method="post" action="<?= base_url('admin/user/simpan') ?>">
    <label>Nama:</label><br>
    <input type="text" name="nama_user" required><br>

    <label>Username:</label><br>
    <input type="text" name="username" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>

    <label>Role:</label><br>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="kasir">Kasir</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
