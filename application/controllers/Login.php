<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_login']);
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index()
    {

        $valid = $this->form_validation;

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'        => 'Email harus diisi',
                'valid_email'        => 'Email tidak valid',
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required'        => 'Password harus diisi',
            )
        );

        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            $data = [
                'title' => 'SINFRAS'
            ];
            $this->load->view('login', $data);
        } else {
            $i = $this->input;

            $email = $i->post('email');
            $password = $i->post('password');

            $login = $this->m_login->cek('tb_users', $email, sha1($password));

            if ($login->num_rows() > 0) {
                $this->session->set_userdata('nama', $login->row()->nama_user);
                $this->session->set_userdata('email', $login->row()->email_user);
                $this->session->set_flashdata('sukses', 'Login Berhasil!');
                redirect(base_url('beranda'));
            } else {
                $this->session->set_flashdata('sukses', 'Username/Password Salah!');
                redirect(base_url('login'));
            }
        }
    }
}