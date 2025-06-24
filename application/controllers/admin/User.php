<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index()
    {
        $data['users'] = $this->M_user->get_all();
        $this->load->view('templates/header');
        $this->load->view('admin/user/index', $data);
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('admin/user/tambah');
    }

    public function simpan()
    {
        $data = [
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'), // tidak di-hash dulu
            'role'     => $this->input->post('role')
        ];
        $this->M_user->insert($data);
        redirect('admin/user');
    }

    public function edit($id)
    {
        $data['user'] = $this->M_user->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('admin/user/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_user');
        $data = [
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'), // tidak di-hash dulu
            'role'     => $this->input->post('role')
        ];
        $this->M_user->update($id, $data);
        redirect('admin/user');
    }

    public function hapus($id)
    {
        $this->M_user->delete($id);
        redirect('admin/user');
    }
}
