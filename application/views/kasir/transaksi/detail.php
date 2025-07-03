<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <h4><i class="fas fa-receipt mr-2"></i>Detail Transaksi</h4>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-list-alt mr-2"></i>Rincian Produk</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Produk</th>
                                    <th style="width: 15%;">Jumlah</th>
                                    <th style="width: 20%;">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $total = 0;
                                foreach ($detail as $d): ?>
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
                    <div class="mt-3">
                        <a href="<?= base_url('kasir/riwayat/index') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>