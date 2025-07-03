<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <h4><i class="fas fa-receipt mr-2"></i> Detail Transaksi</h4>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="mb-3">
                <a href="<?= base_url('admin/laporan') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Laporan
                </a>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <p><strong>Nama Kasir:</strong> <?= $kasir->nama_user ?></p>
                    <p><strong>Tanggal Transaksi:</strong> <?= date('d-m-Y H:i', strtotime($kasir->tanggal)) ?></p>
                    <p><strong>Nama Pelanggan:</strong> <?= $kasir->nama_pelanggan ?></p>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Produk</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $total = 0; foreach ($detail as $d): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d->nama_produk ?></td>
                                    <td><?= $d->jumlah ?></td>
                                    <td>Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
                                </tr>
                                <?php $total += $d->subtotal; ?>
                            <?php endforeach; ?>
                            <tr class="bg-light font-weight-bold">
                                <td colspan="3" class="text-right">Total</td>
                                <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
