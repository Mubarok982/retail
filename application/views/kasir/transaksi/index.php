<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Tambahkan CSS untuk Select2 di header -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

<style>
    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
    }

    .total-section h4 {
        margin-bottom: 0;
    }

    .total-section .display-4 {
        font-weight: 600;
        color: #28a745;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-cash-register mr-2"></i>Transaksi Penjualan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Flash Message -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Kolom Kiri: Produk & Keranjang -->
                <div class="col-lg-7">
                    <!-- Form Tambah Produk -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-plus-circle mr-2"></i>Tambah Produk</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('kasir/transaksi/tambah_ke_keranjang') ?>"
                                class="row align-items-end">
                                <div class="col-md-8 form-group">
                                    <label for="id_produk">Cari & Pilih Produk</label>
                                    <select name="id_produk" id="id_produk" class="form-control" required>
                                        <option></option> <!-- Opsi kosong untuk placeholder select2 -->
                                        <?php foreach ($produk as $p): ?>
                                            <option value="<?= $p->id_produk ?>">
                                                <?= $p->nama_produk ?> (Stok: <?= $p->stok ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="1"
                                        required min="1">
                                </div>
                                <div class="col-md-2 form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tabel Keranjang -->
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-shopping-cart mr-2"></i>Keranjang Belanja</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th class="text-right">Harga</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Subtotal</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                        if (!empty($keranjang)): ?>
                                            <?php foreach ($keranjang as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item['nama_produk'], ENT_QUOTES, 'UTF-8') ?></td>
                                                    <td class="text-right">Rp <?= number_format($item['harga']) ?></td>
                                                    <td class="text-center"><?= $item['jumlah'] ?></td>
                                                    <td class="text-right">Rp <?= number_format($item['subtotal']) ?></td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <!-- Form Edit Jumlah -->
                                                            <form action="<?= base_url('kasir/transaksi/edit_jumlah') ?>"
                                                                method="post" class="mr-1 d-inline">
                                                                <input type="hidden" name="rowid"
                                                                    value="<?= $item['rowid'] ?? '' ?>">
                                                                <input type="number" name="jumlah_baru"
                                                                    value="<?= $item['jumlah'] ?>" min="1"
                                                                    class="form-control form-control-sm d-inline"
                                                                    style="width: 60px; display: inline-block;">
                                                                <button type="submit" class="btn btn-xs btn-primary"
                                                                    title="Edit jumlah"><i class="fas fa-edit"></i></button>
                                                            </form>

                                                            <!-- Tombol Hapus -->
                                                            <a href="<?= base_url('kasir/transaksi/hapus_item/' . $item['rowid']) ?>"
                                                                class="btn btn-xs btn-danger" title="Hapus item"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <?php $total += $item['subtotal']; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center py-4">Keranjang masih kosong.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Ringkasan & Pembayaran -->
                <div class="col-lg-5">
                    <form method="post" action="<?= base_url('kasir/transaksi/simpan') ?>">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-file-invoice-dollar mr-2"></i>Ringkasan &
                                    Pembayaran</h3>
                            </div>
                            <div class="card-body">
                                <div class="total-section text-right bg-light p-3 rounded mb-3">
                                    <h4>Total Belanja</h4>
                                    <h2 class="display-4" id="total-belanja">Rp <?= number_format($total) ?></h2>
                                    <input type="hidden" id="total-hidden" value="<?= $total ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_pelanggan">Pelanggan</label>
                                    <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                        <option value="">-- Pilih Pelanggan --</option>
                                        <?php foreach ($pelanggan as $pl): ?>
                                            <option value="<?= $pl->id_pelanggan ?>"><?= $pl->nama_pelanggan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uang_bayar">Uang Bayar (Rp)</label>
                                    <input type="number" name="uang_bayar" id="uang_bayar"
                                        class="form-control form-control-lg" placeholder="Masukkan jumlah pembayaran">
                                </div>
                                <div class="form-group">
                                    <label for="kembalian">Kembalian (Rp)</label>
                                    <input type="text" id="kembalian" class="form-control form-control-lg bg-white"
                                        readonly placeholder="Rp 0">
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <button type="submit" class="btn btn-success btn-lg btn-block" <?= empty($keranjang) ? 'disabled' : '' ?>>
                                    <i class="fas fa-check-circle mr-2"></i> Simpan & Cetak Struk
                                </button>
                                <a href="<?= base_url('kasir/transaksi/batal') ?>" class="btn btn-danger btn-block mt-2"
                                    onclick="return confirm('Anda yakin ingin membatalkan transaksi ini?')">
                                    <i class="fas fa-times-circle mr-2"></i> Batalkan Transaksi
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer'); ?>

<!-- Tambahkan JS untuk Select2 dan kalkulasi kembalian -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        // Inisialisasi Select2
        $('#id_produk').select2({
            placeholder: "Ketik untuk mencari produk...",
            theme: 'bootstrap4'
        });

        // Kalkulasi kembalian
        $('#uang_bayar').on('input', function () {
            let total = parseInt($('#total-hidden').val()) || 0;
            let bayar = parseInt($(this).val()) || 0;
            let kembalian = bayar - total;

            if (kembalian < 0) {
                kembalian = 0;
            }

            $('#kembalian').val('Rp ' + kembalian.toLocaleString('id-ID'));
        });
    });
</script>