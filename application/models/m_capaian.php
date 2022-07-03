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

    public function data_infrastruktur($table, $kategori)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('tb_kategori', $table . '.id_kategori = tb_kategori.id_kategori');
        $this->db->where($table . '.id_kategori', $kategori);
        return $this->db->get();
    }

    public function data_hasil($table, $id_capaian)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('tb_capaian', $table . '.id_capaian = tb_capaian.id_capaian');
        $this->db->join('tb_tahun', $table . '.id_tahun = tb_tahun.id_tahun');
        $this->db->join('tb_kategori', 'tb_capaian.id_kategori = tb_kategori.id_kategori');
        $this->db->where($table . '.id_capaian', $id_capaian);
        return $this->db->get();
    }
}