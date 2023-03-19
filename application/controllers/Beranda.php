<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_capaian', 'm_master']);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // $this->ceklogin();
    }

    public function ceklogin()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('gagal', 'Silahkan Login!');
            redirect(base_url('login'), 'refresh');
        }
    }

    public function index()
    {
        $menu = $this->m_master->data('tb_kategori')->result();
        if ($this->session->userdata('email') != "") {
            $kategori = $this->m_master->data('tb_kategori')->num_rows();
            $tahun = $this->m_master->data('tb_tahun')->num_rows();
            $users = $this->m_master->data('tb_users')->num_rows();
            $data = [
                'title' => 'Beranda',
                'menu'  => $menu,
                'kategori'  => $kategori,
                'tahun'  => $tahun,
                'users'  => $users,
                'isi'   => 'admin/v_beranda'
            ];
        } else {
            $kategori = $this->m_master->data('tb_kategori')->result();
            $tahun = $this->m_master->data('tb_tahun')->result();

            $data = [
                'title' => 'Beranda',
                'menu'  => $menu,
                // 'kategori'  => $kategori,
                // 'tahun'  => $tahun,
                'isi'   => 'v_home'
            ];
        }

        $this->load->view('layout/wrapper', $data);
    }
}