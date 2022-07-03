<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_master']);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function password()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'password_lama',
            'Password Lama',
            'required',
            array(
                'required'        => 'Password Lama harus diisi'
            )
        );

        $valid->set_rules(
            'password_baru',
            'Password Baru',
            'required|min_length[8]',
            array(
                'required'        => 'Password Baru harus diisi',
                'min_length'        => 'Password minimal 8 kombinasi karakter!'
            )
        );

        $valid->set_rules(
            'password_konf',
            'Konfirmasi Password',
            'required',
            array(
                'required'        => 'Konfirmasi Password harus diisi'
            )
        );


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            $menu = $this->m_master->data('tb_kategori')->result();
            $data = array(
                'title'        => 'Ganti Password',
                'menu'  => $menu,
                'isi'        => 'admin/v_ganti'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $password_konf = $this->input->post('password_konf');

            $cek = $this->m_master->data_where('tb_users', 'password', sha1($password_lama));

            if ($cek->num_rows() > 0) {
                if ($password_baru != $password_konf) {
                    $this->session->set_flashdata('sukses', "Konfirmasi Password Tidak Sama!");
                    redirect('settings/password');
                } else {
                    $email = $this->session->userdata('email');
                    $data = array(
                        'password' => sha1($password_baru)
                    );
                    $this->m_master->edit('tb_users', $data, 'email_user', $email);
                    $this->session->set_flashdata('sukses', "Password berhasil diubah!");
                    redirect('beranda');
                }
            } else {
                $this->session->set_flashdata('sukses', "Password Lama Salah!");
                redirect('settings/password');
            }
        }
    }
}