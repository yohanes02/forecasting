<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_m');
        $this->load->helper(['aw_helper', 'string']);
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['barang'] = $this->Barang_m->tampil();
            $this->load->view('stocker/barang/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            //ambil data satuan
            $d['satuan'] = $this->db->get('satuan');

            //ambil data supplier
            $d['supplier'] = $this->db->get('supplier');

            $this->load->view('stocker/barang/tambah', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $kode = $this->input->post('kode');
            
            $barang = $this->input->post('nm_barang');
            $harga = $this->input->post('harga');
            $satuan = $this->input->post('id_satuan');
            $supplier = $this->input->post('id_supplier');

            $d = array(
                'kode' => $kode,
                
                'nm_barang' => $barang,
                'harga' => $harga,
                'id_unit' => $satuan,
                'id_supplier' => $supplier
            );

            $this->Barang_m->input($d, 'barang');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/barang');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit($kode)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array('kode' => $kode);

            $d['barang'] = $this->Barang_m->edit_data($where, 'barang');

            //ambil data satuan
            $d['satuan'] = $this->db->get('satuan');

            //ambil data supplier
            $d['supplier'] = $this->db->get('supplier');

            $this->load->view('stocker/barang/edit', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan_ubah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $kode = $this->input->post('kode');
            
            $barang = $this->input->post('nm_barang');
            $harga = $this->input->post('harga');
            $satuan = $this->input->post('id_satuan');
            $supplier = $this->input->post('id_supplier');

            $d = array(
                
                'nm_barang' => $barang,
                'harga' => $harga,
                'id_unit' => $satuan,
                'id_supplier' => $supplier
            );

            $where = array(
                'kode' => $kode
            );

            $this->Barang_m->edit_simpan($where, $d, 'barang');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/barang');
        } else {
            redirect('auth/logout');
        }
    }

    public function hapus($kode)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $where = array(
                'kode' => $kode
            );

            $this->Barang_m->hapus($where, 'barang');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/barang');
        } else {
            redirect('auth/logout');
        }
    }
}
