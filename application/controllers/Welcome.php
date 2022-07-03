<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$this->load->view('welcome_message');
	}

	public function data()
	{
		$data = $this->m_capaian->data('tb_hasil_capaian')->result();
		echo "<pre>";
		print_r($data);
		echo "<pre>";
	}
}