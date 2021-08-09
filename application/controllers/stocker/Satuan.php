<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['satuan'] = $this->Satuan_m->tampil();
            $this->load->view('stocker/satuan/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $this->load->view('stocker/satuan/tambah');
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $kategori = $this->input->post('satuan');
            $ket = $this->input->post('ket');

            $d = array('unit' => $kategori, 'keterangan' => $ket);

            $this->Satuan_m->input($d, 'satuan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/satuan');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit($id_unit)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array('id_unit' => $id_unit);

            $d['satuan'] = $this->Satuan_m->edit_data($where, 'satuan');

            $this->load->view('stocker/satuan/edit', $d);
        } else {
            redirect('app/logout');
        }
    }

    public function simpan_ubah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $id_unit = $this->input->post('idunit');
            $satuan = $this->input->post('satuan');
            $ket = $this->input->post('ket');

            $d = array(
                'id_unit' => $id_unit,
                'unit' => $satuan,
                'keterangan' => $ket
            );

            $where = array(
                'id_unit' => $id_unit
            );

            $this->Satuan_m->edit_simpan($where, $d, 'satuan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/satuan');
        } else {
            redirect('auth/logout');
        }
    }

    public function hapus($id_unit)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array(
                'id_unit' => $id_unit
            );

            $this->Satuan_m->hapus($where, 'satuan');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/satuan');
        } else {
            redirect('auth/logout');
        }
    }
}
