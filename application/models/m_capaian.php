<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_capaian extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('tb_tahun', $table . '.id_tahun = tb_tahun.id_tahun');
        $this->db->join('tb_kategori', $table . '.id_kategori = tb_kategori.id_kategori');
        return $this->db->get();
    }
}