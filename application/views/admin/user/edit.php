<h3>Edit User</h3>

<form method="post" action="<?= base_url('admin/user/update') ?>">
    <input type="hidden" name="id_user" value="<?= $user->id_user ?>">

    <label>Nama:</label><br>
    <input type="text" name="nama_user" value="<?= $user->nama_user ?>" required><br>

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= $user->username ?>" required><br>

    <label>Password:</label><br>
    <input type="text" name="password" value="<?= $user->password ?>" required><br>

    <label>Role:</label><br>
    <select name="role">
        <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="kasir" <?= $user->role == 'kasir' ? 'selected' : '' ?>>Kasir</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>
