<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Card Detail Transaksi -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Detail Transaksi</h3>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('kasir/riwayat') ?>" class="btn btn-secondary mb-3">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Riwayat
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; $total = 0; foreach ($detail as $d): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($d->nama_produk) ?></td>
                                    <td><?= $d->jumlah ?></td>
                                    <td>Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
                                </tr>
                                <?php $total += $d->subtotal; endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-right">Total</th>
                                    <th>Rp <?= number_format($total, 0, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?php $this->load->view('templates/footer'); ?>
