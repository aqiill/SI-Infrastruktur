<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function data($table)
    {
        return $this->db->get($table);
    }

    public function data_where($table, $key, $id)
    {
        return $this->db->get_where($table, [$key => $id]);
    }

    public function add($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function delete($table, $key, $id)
    {
        return $this->db->delete($table, [$key => $id]);
    }

    public function edit($table, $data, $key, $id)
    {
        return $this->db->update($table, $data, [$key => $id]);
    }
}