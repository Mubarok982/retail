<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

         // Set timezone ke WIB
        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();
    }

    public function index()
    {
        $role = $this->session->userdata('role');

        if ($role === 'admin') {

            // Grafik Penjualan per Bulan
            $query1 = $this->db->query("
                SELECT DATE_FORMAT(tanggal, '%M') AS bulan, SUM(total) AS total 
                FROM transaksi 
                GROUP BY MONTH(tanggal) 
                ORDER BY MONTH(tanggal)
            ");
            $grafik_bulan = [];
            $grafik_total = [];
            foreach ($query1->result() as $row) {
                $grafik_bulan[] = $row->bulan;
                $grafik_total[] = (int) $row->total;
            }

            // Grafik Produk per Kategori
            $query2 = $this->db->query("
                SELECT kategori.nama_kategori, COUNT(*) as jumlah 
                FROM produk 
                JOIN kategori ON produk.id_kategori = kategori.id_kategori 
                GROUP BY kategori.nama_kategori
            ");
            $grafik_kategori = [];
            $grafik_jumlah_produk = [];
            foreach ($query2->result() as $row) {
                $grafik_kategori[] = $row->nama_kategori;
                $grafik_jumlah_produk[] = (int) $row->jumlah;
            }

            // Grafik Jumlah Pelanggan
            $jumlah_pelanggan = $this->db->count_all('pelanggan');

            // Grafik Produk Terlaris
            $query4 = $this->db->query("
                SELECT produk.nama_produk, SUM(transaksi_detail.jumlah) as total_jual 
                FROM transaksi_detail 
                JOIN produk ON transaksi_detail.id_produk = produk.id_produk 
                GROUP BY produk.id_produk 
                ORDER BY total_jual DESC 
                LIMIT 5
            ");
            $grafik_terlaris = [];
            $grafik_qty_terlaris = [];
            foreach ($query4->result() as $row) {
                $grafik_terlaris[] = $row->nama_produk;
                $grafik_qty_terlaris[] = (int) $row->total_jual;
            }

            // Grafik Produk Stok Terendah
            $query5 = $this->db->query("
                SELECT nama_produk, stok 
                FROM produk 
                ORDER BY stok ASC 
                LIMIT 5
            ");
            $grafik_nama_stok = [];
            $grafik_jml_stok = [];
            foreach ($query5->result() as $row) {
                $grafik_nama_stok[] = $row->nama_produk;
                $grafik_jml_stok[] = (int) $row->stok;
            }

            // Grafik Pendapatan Harian (7 hari terakhir)
            $query6 = $this->db->query("
                SELECT DATE(tanggal) as tgl, SUM(total) as total_harian 
                FROM transaksi 
                WHERE tanggal >= CURDATE() - INTERVAL 6 DAY 
                GROUP BY tgl 
                ORDER BY tgl ASC
            ");
            $grafik_tanggal = [];
            $grafik_total_harian = [];
            foreach ($query6->result() as $row) {
                $grafik_tanggal[] = $row->tgl;
                $grafik_total_harian[] = (int) $row->total_harian;
            }

            // Kirim data ke view
            $data = [
                'grafik_bulan' => $grafik_bulan,
                'grafik_total' => $grafik_total,
                'grafik_kategori' => $grafik_kategori,
                'grafik_jumlah_produk' => $grafik_jumlah_produk,
                'jumlah_pelanggan' => $jumlah_pelanggan,
                'grafik_terlaris' => $grafik_terlaris,
                'grafik_qty_terlaris' => $grafik_qty_terlaris,
                'grafik_nama_stok' => $grafik_nama_stok,
                'grafik_jml_stok' => $grafik_jml_stok,
                'grafik_tanggal' => $grafik_tanggal,
                'grafik_total_harian' => $grafik_total_harian
            ];

            $this->load->view('dashboard/admin', $data);

        } elseif ($role === 'kasir') {
    // Penjualan hari ini
    $penjualan_hari_ini = $this->db->select_sum('total')
        ->where('DATE(tanggal)', date('Y-m-d'))
        ->get('transaksi')
        ->row()->total ?? 0;

    // Jumlah transaksi hari ini
    $jumlah_transaksi = $this->db->where('DATE(tanggal)', date('Y-m-d'))
        ->count_all_results('transaksi');

    // Jam login 
    $jam_login = $this->session->userdata('jam_login') ?? date('H:i');

    // Kirim data ke view kasir
    $data = [
        'penjualan_hari_ini' => $penjualan_hari_ini,
        'jumlah_transaksi' => $jumlah_transaksi,
        'jam_login' => $jam_login
    ];

    $this->load->view('dashboard/kasir', $data);
}
    }
}
