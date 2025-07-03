<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content pt-3">
        <div class="container-fluid">

            <!-- Welcome Card -->
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <h4 class="mb-1">Selamat Datang, <b><?= $this->session->userdata('nama_user'); ?></b>!</h4>
                    <p class="mb-0">Ini adalah halaman dashboard khusus kasir.</p>
                </div>
            </div>

            <!-- Informasi Umum Kasir -->
            <div class="row">
                <!-- Info Penjualan Hari Ini -->
                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Rp <?= number_format($penjualan_hari_ini ?? 0, 0, ',', '.'); ?></h3>
                            <p>Penjualan Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Transaksi -->
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jam_login ?? date('H:i'); ?></h3>
                            <p>Jam Login Saat Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catatan atau Pengumuman -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Catatan untuk Kasir</h3>
                </div>
                <div class="card-body">
                    <p>Pastikan semua transaksi dicatat dengan benar.</p>
                </div>
            </div>

        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer'); ?>
