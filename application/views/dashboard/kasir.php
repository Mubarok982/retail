<?php $this->load->view('templates/header'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kasir</title>
</head>
<body>
    <h1>Selamat Datang Kasir, <?= $this->session->userdata('nama_user'); ?>!</h1>
    <p>Ini adalah halaman dashboard khusus kasir.</p>

    <ul>
        <li><a href="<?= base_url('kasir/transaksi') ?>">Transaksi Penjualan</a></li>
        <li><a href="<?= base_url('kasir/pelanggan') ?>">Data Pelanggan</a></li>
        <li><a href="<?= base_url('kasir/transaksi/riwayat') ?>">Riwayat Transaksi</a></li>
    </ul>
</body>
</html>
