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
        // $this->ceklogin();
    }

    public function ceklogin()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('gagal', 'Silahkan Login!');
            redirect(base_url('login'), 'refresh');
        }
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
        if ($id_kategori == null || $this->session->userdata('email') == "") show_404();

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
        if ($id_capaian == null || $this->session->userdata('email') == "") show_404();

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

    public function hapus_hasil_capaian($id_capaian = null, $id_hasil_capaian = null)
    {
        if ($id_capaian == "" || $id_hasil_capaian == "" || $this->session->userdata('email') == "") show_404();

        $this->m_master->delete('tb_hasil_capaian', 'id_hasil_capaian', $id_hasil_capaian);

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        redirect(base_url('infrastruktur/capaian/' . $id_capaian));
    }

    public function hapus_capaian($id_kategori = null, $id_capaian = null)
    {
        if ($id_kategori == "" || $id_capaian == "" || $this->session->userdata('email') == "") show_404();

        $this->m_master->delete('tb_capaian', 'id_capaian', $id_capaian);

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        redirect(base_url('infrastruktur/kategori/' . $id_kategori));
    }

    public function cari()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'cari',
            'Cari',
            'required|alpha_numeric_spaces',
            array(
                'required'        => 'Cari harus diisi',
                'alpha_numeric_spaces'        => 'Pencarian tidak valid!',
            )
        );

        // $valid->set_rules(
        //     'kategori',
        //     'Kategori',
        //     'required|numeric',
        //     array(
        //         'required'        => 'Kategori harus diisi',
        //         'numeric'        => 'Pencarian tidak valid!',
        //     )
        // );

        // $valid->set_rules(
        //     'tahun',
        //     'Tahun',
        //     'required|numeric',
        //     array(
        //         'required'        => 'Tahun harus diisi',
        //         'numeric'        => 'Pencarian tidak valid!',
        //     )
        // );

        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url());
        } else {
            $i = $this->input;

            $cari = $i->post('cari');
            // $kategori = $i->post('kategori');
            // $tahun = $i->post('tahun');

            $hasil = $this->m_capaian->cari($cari)->result();
            $menu = $this->m_master->data('tb_kategori')->result();
            $data = [
                'isi' => 'v_cari',
                'title' => 'hasil pencarian',
                'menu' => $menu,
                'cari' => $cari,
                'hasil' => $hasil
            ];
            $this->load->view('layout/wrapper', $data);
        }
    }
}