<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
    }

    public function index()
    {
        $data['kategori'] = $this->M_kategori->get_all();
        $this->load->view('templates/header');
        $this->load->view('admin/kategori/index', $data);
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('admin/kategori/tambah');
    }

    public function simpan()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi'     => $this->input->post('deskripsi')
        ];
        $this->M_kategori->insert($data);
        redirect('admin/kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->M_kategori->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('admin/kategori/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_kategori');
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi'     => $this->input->post('deskripsi')
        ];
        $this->M_kategori->update($id, $data);
        redirect('admin/kategori');
    }

    public function hapus($id)
    {
        $this->M_kategori->delete($id);
        redirect('admin/kategori');
    }
}
