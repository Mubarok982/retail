<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        if ($this->session->userdata('login') === TRUE) {
            redirect('dashboard');
        }

        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek login melalui model
        $user = $this->M_login->cek_login($username, $password);

        if ($user) {
            // Simpan data ke session jika login berhasil
            $this->session->set_userdata([
                'id_user'    => $user->id_user,
                'nama_user'  => $user->nama_user,
                'username'   => $user->username,
                'role'       => $user->role,
                'login'      => TRUE,
                'jam_login'  => date('H:i') // waktu login disimpan
            ]);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
