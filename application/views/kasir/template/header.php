<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; margin: 0; }
        .navbar {
            background-color: #333;
            overflow: hidden;
            color: #fff;
            padding: 14px 20px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
        }
        .navbar .right {
            float: right;
        }
    </style>
</head>
<body>

<div class="navbar">
    <span>Retail App</span>

    <div class="right">
        <span><?= $this->session->userdata('nama_user'); ?> (<?= $this->session->userdata('role'); ?>)</span>
        |
        <a href="<?= base_url('auth/logout') ?>">Logout</a>
    </div>
</div>
