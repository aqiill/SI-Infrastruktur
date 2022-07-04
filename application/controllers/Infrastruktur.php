<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infrastruktur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_capaian', 'm_master']);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function kategori($kategori)
    {

        $capaian = $this->m_capaian->data_infrastruktur('tb_capaian', $kategori)->result();

        $menu = $this->m_master->data('tb_kategori')->result();
        $data = [
            'title' => 'data infrastruktur',
            'menu' => $menu,
            'capaian' => $capaian,
            'isi'   => 'admin/v_capaian.php'
        ];

        $this->load->view('layout/wrapper', $data);
    }

    public function tambah_capaian($id_kategori = null)
    {
        if ($id_kategori == null) show_404();

        $data = [
            'uraian' => $this->input->post('uraian'),
            'sumber' => $this->input->post('sumber'),
            'id_kategori' => $id_kategori
        ];

        $this->m_master->add('tb_capaian', $data);

        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
        redirect(base_url('infrastruktur/kategori/' . $id_kategori));
    }

    public function capaian($id_capaian)
    {

        $hasil_capaian = $this->m_capaian->data_hasil('tb_hasil_capaian', $id_capaian)->result();

        $menu = $this->m_master->data('tb_kategori')->result();
        $tahun = $this->m_master->data('tb_tahun')->result();

        if (isset($hasil_capaian[0]->nama_kategori)) {
            $breadcrumb = strtoupper(strtolower($hasil_capaian[0]->nama_kategori));
        } else {
            $breadcrumb = 'INFRASTRUKTUR';
        }

        $data = [
            'title' => 'DATA ' . $breadcrumb,
            'menu' => $menu,
            'hasil_capaian' => $hasil_capaian,
            'tahun' => $tahun,
            'isi'   => 'admin/v_hasil_capaian.php'
        ];

        $this->load->view('layout/wrapper', $data);
    }

    public function tambah_hasil_capaian($id_capaian = null)
    {
        if ($id_capaian == null) show_404();

        $data = [
            'id_capaian' => $id_capaian,
            'id_tahun' => $this->input->post('tahun'),
            'capaian' => $this->input->post('capaian'),
            'satuan' => $this->input->post('satuan'),
        ];

        $this->m_master->add('tb_hasil_capaian', $data);

        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
        redirect(base_url('infrastruktur/capaian/' . $id_capaian));
    }

    public function hapus_capaian($id_capaian = null, $id_hasil_capaian = null)
    {
        if ($id_capaian == "" || $id_hasil_capaian == "") show_404();

        $this->m_master->delete('tb_hasil_capaian', 'id_hasil_capaian', $id_hasil_capaian);

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        redirect(base_url('infrastruktur/capaian/' . $id_capaian));
    }
}