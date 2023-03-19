<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$data = [
			'isi'	=> 'v_home',
			'menu'	=> $menu,
			'title'	=> 'database'
		];
		$this->load->view('layout/wrapper', $data);
	}
}