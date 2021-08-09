<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Admin") {

            $d['kategori'] = $this->Kategori_m->tampil();
            $this->load->view('admin/kategori/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Admin") {
            $this->load->view('admin/kategori/tambah');
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Admin") {
            $kategori = $this->input->post('kategori');
            $ket = $this->input->post('ket');

            $d = array('category' => $kategori, 'keterangan' => $ket);

            $this->Kategori_m->input($d, 'kategori');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/kategori');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit($id_kategori)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Admin") {
            $where = array('idcat' => $id_kategori);

            $d['ktg'] = $this->Kategori_m->edit_data($where, 'kategori');

            $this->load->view('admin/kategori/edit', $d);
        } else {
            redirect('app/logout');
        }
    }

    public function simpan_ubah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Admin") {
            $id_kategori = $this->input->post('idcat');
            $kategori = $this->input->post('kategori');
            $ket = $this->input->post('ket');

            $d = array(
                'idcat' => $id_kategori,
                'category' => $kategori,
                'keterangan' => $ket
            );

            $where = array(
                'idcat' => $id_kategori
            );

            $this->Kategori_m->edit_simpan($where, $d, 'kategori');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/kategori');
        } else {
            redirect('auth/logout');
        }
    }

    public function hapus($id_kategori)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Admin") {
            $where = array(
                'idcat' => $id_kategori
            );

            $this->Kategori_m->hapus($where, 'kategori');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/kategori');
        } else {
            redirect('auth/logout');
        }
    }
}
