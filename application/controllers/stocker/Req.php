<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Req extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Req_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['request'] = $this->Req_m->tampil();
            $this->load->view('stocker/request/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $this->load->view('stocker/request/tambah');
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $tgl = date("Y-m-d");
            $kode = $this->input->post('kodeb');
            $jumlah = $this->input->post('jumlah');
            $tgl_kirim = $this->input->post('tgl_kirim');
            $status = "proccessed";

            $d = array(
                'tgl_request' => $tgl,
                'kode' => $kode,
                'qty_barang' => $jumlah,
                'tgl_kirim' => $tgl_kirim,
                'status_request' => $status,
            );

            $this->Req_m->input($d, 'request');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/req');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit($id_request)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array('id_request' => $id_request);

            $d['request'] = $this->Req_m->edit_data($where, 'request');

            $this->load->view('stocker/request/edit', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan_ubah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $id = $this->input->post('id_request');
            $kode = $this->input->post('kodeb');
            $jumlah = $this->input->post('jumlah');
            $tgl_kirim = $this->input->post('tgl_kirim');

            $d = array(
                'kode' => $kode,
                'qty_barang' => $jumlah,
                'tgl_kirim' => $tgl_kirim
            );

            $where = array(
                'id_request' => $id
            );

            $this->Req_m->edit_simpan($where, $d, 'request');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/req');
        } else {
            redirect('auth/logout');
        }
    }

    public function hapus($id_request)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array(
                'id_request' => $id_request
            );

            $this->Req_m->hapus($where, 'request');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/req');
        } else {
            redirect('auth/logout');
        }
    }
}
