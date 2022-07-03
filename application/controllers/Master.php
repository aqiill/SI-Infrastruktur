<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_master']);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function tahun()
    {
        $tahun = $this->m_master->data('tb_tahun')->result();
        $data = [
            'title' => 'data tahun',
            'tahun' => $tahun,
            'isi'   => 'admin/v_tahun.php'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah_tahun()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'tahun',
            'Tahun',
            'required|exact_length[4]',
            array(
                'required'        => 'Tahun harus diisi',
                'exact_length'        => 'Tahun tidak valid!',
            )
        );
        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('master/tahun'));
        } else {
            $tahun = $this->input->post('tahun');
            $data = [
                'tahun' => $tahun
            ];

            $this->m_master->add('tb_tahun', $data);

            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
            redirect(base_url('master/tahun'));
        }
    }

    public function hapus_tahun($id = null)
    {
        if ($id == "") show_404();

        $this->m_master->delete('tb_tahun', 'id_tahun', $id);

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        redirect(base_url('master/tahun'));
    }

    public function kategori()
    {
        $kategori = $this->m_master->data('tb_kategori')->result();
        $data = [
            'title' => 'data kategori',
            'kategori' => $kategori,
            'isi'   => 'admin/v_kategori.php'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah_kategori()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'kategori',
            'Kategori',
            'required|alpha_numeric_spaces',
            array(
                'required'        => 'Kategori harus diisi',
                'alpha_numeric_spaces'        => 'Kategori tidak valid!',
            )
        );
        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('master/kategori'));
        } else {
            $kategori = strtolower($this->input->post('kategori'));
            $data = [
                'nama_kategori' => $kategori,
                'display' => 'none'
            ];

            $this->m_master->add('tb_kategori', $data);

            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
            redirect(base_url('master/kategori'));
        }
    }

    public function edit_status($display = null, $id = null)
    {
        if ($display == "" || $id == "") show_404();

        if ($display == "b") {
            $display = "block";
        } elseif ($display == "n") {
            $display = "none";
        }

        $data = [
            'display' => $display
        ];

        $this->m_master->edit('tb_kategori', $data, 'id_kategori', $id);

        $this->session->set_flashdata('sukses', 'Display berhasil diubah!');
        redirect(base_url('master/kategori'));
    }

    public function hapus_kategori($id = null)
    {
        if ($id == "") show_404();

        $this->m_master->delete('tb_kategori', 'id_kategori', $id);

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        redirect(base_url('master/kategori'));
    }

    public function users()
    {
        $users = $this->m_master->data('tb_users')->result();
        $data = [
            'title' => 'data users',
            'users' => $users,
            'isi'   => 'admin/v_users.php'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah_user()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_user',
            'Nama',
            'required|alpha_numeric_spaces',
            array(
                'required'        => 'Nama harus diisi',
                'alpha_numeric_spaces'        => 'Nama tidak valid!',
            )
        );

        $valid->set_rules(
            'email_user',
            'Email',
            'required|valid_email',
            array(
                'required'        => 'Email harus diisi',
                'valid_email'        => 'Email tidak valid!',
            )
        );

        $valid->set_rules(
            'password',
            'Passowrd',
            'required|min_length[8]',
            array(
                'required'        => 'Passowrd harus diisi',
                'min_length'        => 'Panjang Password minimal 8 karakter kombinasi!',
            )
        );

        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('master/kategori'));
        } else {
            $nama_user = strtolower($this->input->post('nama_user'));
            $email = strtolower($this->input->post('email_user'));
            $password = $this->input->post('password');

            $data = [
                'nama_user' => $nama_user,
                'email_user' => $email,
                'password' => sha1($password)
            ];

            $this->m_master->add('tb_users', $data);

            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
            redirect(base_url('master/users'));
        }
    }

    public function hapus_user($id = null)
    {
        if ($id == "") show_404();

        $this->m_master->delete('tb_users', 'id_user', $id);

        $this->session->set_flashdata('sukses', 'Data berhasil dihapus!');
        redirect(base_url('master/users'));
    }

    public function reset($id = null)
    {
        if ($id == "") show_404();

        $data = [
            'password' => sha1('qwerty123')
        ];

        $this->m_master->edit('tb_users', $data, 'id_user', $id);

        $this->session->set_flashdata('sukses', 'Password baru anda adalah <b>qwerty123</b>');
        redirect(base_url('master/users'));
    }
}