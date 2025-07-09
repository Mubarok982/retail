<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Welcome Card -->
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <h4 class="mb-1">Selamat Datang, <b><?= htmlspecialchars($this->session->userdata('nama_user'), ENT_QUOTES, 'UTF-8'); ?></b>!</h4>
                    <p class="text-muted mb-0">Ini adalah halaman dashboard khusus untuk kasir. Selamat bekerja!</p>
                </div>
            </div>

            <!-- Info Boxes -->
            <div class="row">
                <!-- Info Penjualan Hari Ini -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Rp <?= number_format($penjualan_hari_ini ?? 0, 0, ',', '.'); ?></h3>
                            <p>Penjualan Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Transaksi -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_transaksi ?? 0; ?></h3>
                            <p>Total Transaksi Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                    </div>
                </div>

                <!-- Jam Masuk -->
                <div class="col-lg-4 col-12">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jam_login ?? date('H:i'); ?></h3>
                            <p>Jam Login</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catatan atau Pengumuman -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bullhorn mr-2"></i>Catatan & Pengumuman Penting</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Pastikan laci kasir seimbang sebelum dan sesudah shift.</li>
                        <li>Jangan lupa untuk selalu memberikan senyum kepada pelanggan.</li>
                        <li>Promo "Beli 1 Gratis 1" untuk produk minuman masih berlaku hari ini.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer'); ?>
