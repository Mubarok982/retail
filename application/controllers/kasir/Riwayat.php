<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_transaksi');
        $this->load->model('M_pelanggan');
        $this->load->model('M_user');

        // Hanya kasir yang boleh mengakses
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('auth');
        }
    }

    public function index() {
        // Ambil filter dari form GET
        $start_date    = $this->input->get('start_date');
        $end_date      = $this->input->get('end_date');
        $id_pelanggan  = $this->input->get('id_pelanggan');
        $id_user       = $this->input->get('id_user');
        $min_total     = $this->input->get('min_total');
        $max_total     = $this->input->get('max_total');

        // Kirim filter ke model
        $data['riwayat'] = $this->M_transaksi->get_all_with_detail(
            $start_date,
            $end_date,
            $id_pelanggan,
            $id_user,
            $min_total,
            $max_total
        );

        // Untuk dropdown filter
        $data['pelanggan'] = $this->M_pelanggan->get_all();
        $data['kasir']     = $this->M_user->get_all_kasir();

        // Untuk mempertahankan nilai input setelah submit
        $data['filter'] = [
            'start_date'   => $start_date,
            'end_date'     => $end_date,
            'id_pelanggan' => $id_pelanggan,
            'id_user'      => $id_user,
            'min_total'    => $min_total,
            'max_total'    => $max_total
        ];

        $data['title'] = 'Riwayat Transaksi';

        // Load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/riwayat/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id) {
        if (empty($id)) {
            redirect('kasir/riwayat');
        }

        $data['detail'] = $this->M_transaksi->get_detail($id);
        $data['transaksi'] = $this->M_transaksi->get_by_id($id);

        if (!$data['transaksi']) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan.');
            redirect('kasir/riwayat');
        }

        $data['title'] = 'Detail Transaksi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/riwayat/detail', $data); 
        $this->load->view('templates/footer');
    }
}
