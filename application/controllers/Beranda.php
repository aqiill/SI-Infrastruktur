<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_capaian']);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title' => 'Data',
            'isi'   => 'admin/v_beranda'
        ];
        $this->load->view('layout/wrapper', $data);
    }
}