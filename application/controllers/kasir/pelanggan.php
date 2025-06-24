<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['pelanggan'] = $this->M_pelanggan->get_all();
        $this->load->view('templates/header');
        $this->load->view('kasir/pelanggan/index', $data);
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('kasir/pelanggan/tambah');
    }

    public function simpan()
    {
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email'          => $this->input->post('email'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat')
        ];

        $this->M_pelanggan->insert($data);
        redirect('kasir/pelanggan');
    }

    public function edit($id)
    {
        $data['pelanggan'] = $this->M_pelanggan->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('kasir/pelanggan/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_pelanggan');
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email'          => $this->input->post('email'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat')
        ];

        $this->M_pelanggan->update($id, $data);
        redirect('kasir/pelanggan');
    }

    public function hapus($id)
    {
        $this->M_pelanggan->delete($id);
        redirect('kasir/pelanggan');
    }
}
