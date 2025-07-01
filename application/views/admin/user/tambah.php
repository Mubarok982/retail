<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <!-- Judul Halaman -->
            <div class="mb-3">
                <h4>Tambah User</h4>
            </div>

            <!-- Form Tambah User -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white mb-0">
                        <i class="fas fa-user-plus me-2"></i> Form Tambah User
                    </h3>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/user/simpan') ?>">

                        <div class="form-group mb-3">
                            <label for="nama_user">Nama</label>
                            <input type="text" class="form-control" id="nama_user" name="nama_user" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
