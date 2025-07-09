<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }

        $this->load->model('M_produk');
        $this->load->model('M_kategori');
    }

    public function index()
{
    $kategori_id = $this->input->get('kategori');
    $min_harga = $this->input->get('min_harga');
    $max_harga = $this->input->get('max_harga');
    $min_stok = $this->input->get('min_stok');
    $max_stok = $this->input->get('max_stok');

    $data['kategori_list'] = $this->M_kategori->get_all();

    $data['selected_kategori'] = $kategori_id ?? '';
    $data['min_harga'] = $min_harga;
    $data['max_harga'] = $max_harga;
    $data['min_stok'] = $min_stok;
    $data['max_stok'] = $max_stok;

    $data['produk'] = $this->M_produk->get_filtered($kategori_id, $min_harga, $max_harga, $min_stok, $max_stok);

    $this->load->view('admin/produk/index', $data);
}


    public function tambah()
    {
        $data['kategori'] = $this->M_kategori->get_all();
        $this->load->view('templates/header');
        $this->load->view('admin/produk/tambah', $data);
    }

    public function simpan()
    {
        // Upload gambar jika ada
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        $gambar = '';
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        }

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar
        ];

        $this->M_produk->insert($data);
        redirect('produk');
    }


    public function update()
    {
        $id = $this->input->post('id_produk');

        // Ambil gambar lama
        $gambar_lama = $this->input->post('gambar_lama');

        // Konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        // Jika ada gambar baru
        if (!empty($_FILES['gambar']['name']) && $this->upload->do_upload('gambar')) {
            $gambar_baru = $this->upload->data('file_name');

            // Hapus gambar lama jika ada dan bukan kosong
            if ($gambar_lama && file_exists('./uploads/' . $gambar_lama)) {
                unlink('./uploads/' . $gambar_lama);
            }
        } else {
            // Tidak ada upload baru, pakai gambar lama
            $gambar_baru = $gambar_lama;
        }

        // Simpan data
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar_baru
        ];

        $this->M_produk->update($id, $data);
        redirect('produk');
    }

public function edit($id)
{
    $data['produk'] = $this->M_produk->get_by_id($id);
    $data['kategori'] = $this->M_kategori->get_all();
    $this->load->view('templates/header');
    $this->load->view('admin/produk/edit', $data);
}

public function hapus($id)
{
    $this->M_produk->delete($id);
    redirect('admin/produk');
}

}
