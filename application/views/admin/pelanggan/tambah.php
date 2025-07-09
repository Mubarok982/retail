<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <!-- Judul -->
            <div class="mb-3">
                <h4><i class="fas fa-user-plus me-2"></i>Tambah Pelanggan</h4>
            </div>

            <!-- Form Tambah Pelanggan -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white mb-0">
                        <i class="fas fa-user me-1"></i> Form Tambah Pelanggan
                    </h3>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('kasir/pelanggan/simpan') ?>">
                        <div class="form-group mb-3">
                            <label for="nama_pelanggan">Nama:</label>
                            <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_hp">No HP:</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                        <a href="<?= base_url('kasir/pelanggan') ?>" class="btn btn-secondary ms-2">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
