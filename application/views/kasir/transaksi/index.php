<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <!-- Flash Message Error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Judul Halaman -->
            <div class="mb-3">
                <h4><i class="fas fa-cash-register me-2"></i>Transaksi Penjualan</h4>
            </div>

            <!-- Form Tambah Produk ke Keranjang -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-plus me-2"></i>Tambah Produk ke Keranjang</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('kasir/transaksi/tambah_ke_keranjang') ?>" class="row g-3">
                        <div class="col-md-6">
                            <label for="id_produk" class="form-label">Pilih Produk</label>
                            <select name="id_produk" id="id_produk" class="form-control" required>
                                <?php foreach ($produk as $p): ?>
                                    <option value="<?= $p->id_produk ?>">
                                        <?= $p->nama_produk ?> - Stok: <?= $p->stok ?> - Rp <?= number_format($p->harga) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required min="1">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-cart-plus me-1"></i> Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Keranjang Belanja -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; foreach ($keranjang as $item): ?>
                                <tr>
                                    <td><?= $item['nama_produk'] ?></td>
                                    <td>Rp <?= number_format($item['harga']) ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td>Rp <?= number_format($item['subtotal']) ?></td>
                                </tr>
                                <?php $total += $item['subtotal']; ?>
                            <?php endforeach; ?>
                            <tr class="bg-light">
                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                <td><strong>Rp <?= number_format($total) ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Form Simpan Transaksi -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-save me-2"></i>Simpan Transaksi</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('kasir/transaksi/simpan') ?>" class="row g-3 mb-3">
                        <div class="col-md-10">
                            <label for="id_pelanggan" class="form-label">Pilih Pelanggan</label>
                            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                <option value="">-- Pilih Pelanggan --</option>
                                <?php foreach ($pelanggan as $pl): ?>
                                    <option value="<?= $pl->id_pelanggan ?>"><?= $pl->nama_pelanggan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-check me-1"></i> Simpan
                            </button>
                        </div>
                    </form>

                    <form method="post" action="<?= base_url('kasir/transaksi/batal') ?>">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-times me-1"></i> Batal Transaksi
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>