<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function cek($table, $email, $password)
    {
        return $this->db->get_where($table, ['email_user' => $email, 'password' => $password]);
    }
}