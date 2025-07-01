<div class="container mt-3">
    <h3>Riwayat Transaksi</h3>
    <table class="table table-bordered table-striped">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Kasir</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($riwayat as $r): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $r->tanggal ?></td>
                <td><?= $r->nama_pelanggan ?></td>
                <td><?= $r->nama_user ?></td>
                <td>Rp <?= number_format($r->total) ?></td>
                <td>
                    <a href="<?= base_url('kasir/riwayat/detail/' . $r->id_transaksi) ?>" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
