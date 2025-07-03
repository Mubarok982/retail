<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->model('M_transaksi');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['produk'] = $this->M_produk->get_all();
        $data['pelanggan'] = $this->M_pelanggan->get_all();
        $data['keranjang'] = $this->session->userdata('keranjang') ?? [];

        $this->load->view('templates/header');
        $this->load->view('kasir/transaksi/index', $data);
    }

    public function tambah_ke_keranjang()
    {
        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');

        $produk = $this->M_produk->get_by_id($id_produk);

        // Cek apakah stok cukup
        if ($jumlah > $produk->stok) {
            $this->session->set_flashdata('error', 'Jumlah melebihi stok yang tersedia. Stok tersedia: ' . $produk->stok);
            redirect('kasir/transaksi');
            return;
        }

        $item = [
            'id_produk' => $produk->id_produk,
            'nama_produk' => $produk->nama_produk,
            'harga' => $produk->harga,
            'jumlah' => $jumlah,
            'subtotal' => $jumlah * $produk->harga
        ];

        $keranjang = $this->session->userdata('keranjang') ?? [];
        $keranjang[] = $item;

        $this->session->set_userdata('keranjang', $keranjang);
        redirect('kasir/transaksi');
    }


    public function simpan()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $keranjang = $this->session->userdata('keranjang');
        $id_user = $this->session->userdata('id_user');
        $total = array_sum(array_column($keranjang, 'subtotal'));

        $this->M_transaksi->simpan($id_pelanggan, $id_user, $keranjang, $total);

        $this->session->unset_userdata('keranjang');
        redirect('kasir/transaksi');
    }

    public function batal()
    {
        $this->session->unset_userdata('keranjang');
        redirect('kasir/transaksi');
    }

    public function riwayat()
    {
        $id_user = $this->session->userdata('id_user');

        // Ambil riwayat transaksi berdasarkan user
        $data['riwayat'] = $this->M_transaksi->get_riwayat_by_user($id_user);

        // Tambahkan title jika perlu
        $data['title'] = 'Riwayat Transaksi';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/transaksi/riwayat', $data); // <- penting
        $this->load->view('templates/footer');
    }


    public function detail($id)
    {
        $data['detail'] = $this->M_transaksi->get_detail($id);
        $this->load->view('templates/header');
        $this->load->view('kasir/transaksi/detail', $data);
    }
}
