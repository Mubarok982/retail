<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <div class="card bg-light mb-4">
                <div class="card-body">
                    <h4 class="mb-1">Selamat Datang, <b><?= $this->session->userdata('nama_user'); ?></b>!</h4>
                    <p class="text-muted mb-0">Ini adalah halaman dashboard admin untuk mengelola sistem RetailApp.</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card card-primary card-outline h-100">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-line mr-2"></i>Grafik Penjualan per Bulan</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPenjualan"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success card-outline h-100">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-tags mr-2"></i>Jumlah Produk per Kategori</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKategori"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card card-warning card-outline h-100">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-star mr-2"></i>5 Produk Terlaris</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="chartTerlaris"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-danger card-outline h-100">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-exclamation-triangle mr-2"></i>5 Produk dengan Stok Terendah</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="chartStok"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-calendar-alt mr-2"></i>Pendapatan 7 Hari Terakhir</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 50%;">Tanggal</th>
                                        <th style="width: 50%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($grafik_tanggal as $i => $tgl): ?>
                                        <tr>
                                            <td><?= date('d F Y', strtotime($tgl)) ?></td>
                                            <td>Rp <?= number_format($grafik_total_harian[$i], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($grafik_tanggal)): ?>
                                        <tr>
                                            <td colspan="2" class="text-center">Belum ada data pendapatan.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
</div>


</div>
</section>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik Penjualan Bulanan
    const bulan = <?= json_encode($grafik_bulan); ?>;
    const total = <?= json_encode($grafik_total); ?>;
    new Chart(document.getElementById('chartPenjualan'), {
        type: 'line',
        data: {
            labels: bulan,
            datasets: [{
                label: 'Total Penjualan',
                data: total,
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: { responsive: true }
    });

    // Grafik Produk per Kategori
    const kategori = <?= json_encode($grafik_kategori); ?>;
    const jumlah_produk = <?= json_encode($grafik_jumlah_produk); ?>;
    const warnaBackground = ['rgba(255,99,132,0.6)', 'rgba(54,162,235,0.6)', 'rgba(255,206,86,0.6)', 'rgba(75,192,192,0.6)', 'rgba(153,102,255,0.6)', 'rgba(255,159,64,0.6)', 'rgba(0,200,83,0.6)'];
    const warnaBorder = ['rgba(255,99,132,1)', 'rgba(54,162,235,1)', 'rgba(255,206,86,1)', 'rgba(75,192,192,1)', 'rgba(153,102,255,1)', 'rgba(255,159,64,1)', 'rgba(0,200,83,1)'];
    new Chart(document.getElementById('chartKategori'), {
        type: 'bar',
        data: {
            labels: kategori,
            datasets: [{
                label: 'Jumlah Produk',
                data: jumlah_produk,
                backgroundColor: kategori.map((_, i) => warnaBackground[i % warnaBackground.length]),
                borderColor: kategori.map((_, i) => warnaBorder[i % warnaBorder.length]),
                borderWidth: 1
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Grafik Produk Terlaris
    const produkTerlaris = <?= json_encode($grafik_terlaris); ?>;
    const qtyTerlaris = <?= json_encode($grafik_qty_terlaris); ?>;
    const warnaTerlaris = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];

    new Chart(document.getElementById('chartTerlaris'), {
        type: 'bar',
        data: {
            labels: produkTerlaris,
            datasets: [{
                label: 'Jumlah Terjual',
                data: qtyTerlaris,
                backgroundColor: qtyTerlaris.map((_, i) => warnaTerlaris[i % warnaTerlaris.length]),
                borderColor: qtyTerlaris.map((_, i) => warnaTerlaris[i % warnaTerlaris.length]),
                borderWidth: 1
            }]
        },
        options: { responsive: true }
    });


    // Grafik Stok Terendah
    const produkStok = <?= json_encode($grafik_nama_stok); ?>;
    const stok = <?= json_encode($grafik_jml_stok); ?>;
    const warnaStok = ['#dc3545', '#fd7e14', '#ffc107', '#28a745', '#20c997'];

    new Chart(document.getElementById('chartStok'), {
        type: 'bar',
        data: {
            labels: produkStok,
            datasets: [{
                label: 'Stok Tersisa',
                data: stok,
                backgroundColor: stok.map((_, i) => warnaStok[i % warnaStok.length]),
                borderColor: stok.map((_, i) => warnaStok[i % warnaStok.length]),
                borderWidth: 1
            }]
        },
        options: { responsive: true }
    });


    // Grafik Pendapatan Harian (7 Hari)
    const tanggalHarian = <?= json_encode($grafik_tanggal); ?>;
    const totalHarian = <?= json_encode($grafik_total_harian); ?>;

    new Chart(document.getElementById('chartHarian'), {
        type: 'line',
        data: {
            labels: tanggalHarian,
            datasets: [{
                label: 'Total Pendapatan (Rp)',
                data: totalHarian,
                backgroundColor: 'rgba(23, 162, 184, 0.2)',
                borderColor: 'rgba(23, 162, 184, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointBackgroundColor: 'rgba(23, 162, 184, 1)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        },
                        color: '#444'
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    ticks: {
                        color: '#444'
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let value = context.raw;
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                legend: {
                    display: true
                }
            }
        }
    });
</script>