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
    }

    public function index()
    {
        $menu = $this->m_master->data('tb_kategori')->result();
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
        $this->load->view('layout/wrapper', $data);
    }
}