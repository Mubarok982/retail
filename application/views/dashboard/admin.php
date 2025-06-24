<?php $this->load->view('templates/header'); ?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat Datang Admin, <?= $this->session->userdata('nama_user'); ?>!</h1>
    <p>Ini adalah halaman dashboard khusus admin.</p>

    <ul>
        <li><a href="<?= base_url('admin/produk') ?>">Kelola Produk</a></li>
        <li><a href="<?= base_url('admin/kategori') ?>">Kelola Kategori</a></li>
        <li><a href="<?= base_url('admin/user') ?>">Kelola User</a></li>
        <li><a href="<?= base_url('admin/laporan') ?>">Laporan Penjualan</a></li>
    </ul>
</body>
</html>
