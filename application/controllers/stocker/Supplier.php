<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['supplier'] = $this->Supplier_m->tampil();
            $this->load->view('stocker/supplier/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $this->load->view('stocker/supplier/tambah');
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $supplier = $this->input->post('supplier');
            $hp = $this->input->post('hp');
            $alamat = $this->input->post('alamat');

            $d = array(
                'nm_supplier' => $supplier,
                'telp' => $hp,
                'alamat' => $alamat
            );

            $this->Supplier_m->input($d, 'supplier');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/supplier');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit($id_supplier)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array('id_supplier' => $id_supplier);

            $d['supplier'] = $this->Supplier_m->edit_data($where, 'supplier');

            $this->load->view('stocker/supplier/edit', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan_ubah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $id_sup = $this->input->post('id_sup');
            $supplier = $this->input->post('supplier');
            $hp = $this->input->post('hp');
            $alamat = $this->input->post('alamat');

            $d = array(
                'id_supplier' => $id_sup,
                'nm_supplier' => $supplier,
                'telp' => $hp,
                'alamat' => $alamat
            );

            $where = array(
                'id_supplier' => $id_sup
            );

            $this->Supplier_m->edit_simpan($where, $d, 'supplier');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/supplier');
        } else {
            redirect('auth/logout');
        }
    }

    public function hapus($id_supplier)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array(
                'id_supplier' => $id_supplier
            );

            $this->Supplier_m->hapus($where, 'supplier');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/supplier');
        } else {
            redirect('auth/logout');
        }
    }
}
