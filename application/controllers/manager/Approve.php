<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approve extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Req_m');
        $this->load->helper(['aw_helper', 'string']);
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $d['request'] = $this->Req_m->tampil_order();
            $this->load->view('manager/approve/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function acc($id_request)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $d = array(
                'status_request' => 'approved'
            );

            $where = array(
                'id_request' => $id_request
            );

            $this->Req_m->edit_simpan($where, $d, 'request');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pesanan telah di setujui !! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


            // Simpan ke orderan setelah Approve
            $huruf = random_string('alpha', 3);
            $upper = strtoupper($huruf);
            $angka = random_string('numeric', 4);
            $autokode = $upper . $angka;

            // mengambil nilai harga barang 
            $query = $this->Req_m->get_harga();
            $data = $query->row();
            $harga = $data->harga;
            $jumlah = $data->qty_barang;

            $id_order = $autokode;
            $total = $jumlah * $harga;
            $approval = $this->session->userdata('nama_lengkap');
            $status = "approved";
            $tgl_order = date('Y-m-d');

            $u = array(
                'id_order' => $id_order,
                'id_request' => $id_request,
                'harga_total' => $total,
                'approval' => $approval,
                'status_order' => $status,
                'tanggal_order' => $tgl_order
            );

            $this->Req_m->input($u, 'orders');


            redirect('manager/approve');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit($id_request)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {
            $where = array('id_request' => $id_request);

            $d['request'] = $this->Req_m->edit_data($where, 'request');

            $this->load->view('manager/approve/edit', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan_ubah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {
            $id_request = $this->input->post('id');
            $jumlah = $this->input->post('jumlah');
            $tgl_kirim = $this->input->post('tgl_kirim');
            $status = 'approved';

            $d = array(
                'qty_barang' => $jumlah,
                'tgl_kirim' => $tgl_kirim,
                'status_request' => $status
            );

            $where = array(
                'id_request' => $id_request
            );

            $this->Req_m->edit_simpan($where, $d, 'request');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pesanan berhasil diubah dan disetujui !! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            // Simpan ke orderan setelah Approve
            $huruf = random_string('alpha', 3);
            $upper = strtoupper($huruf);
            $angka = random_string('numeric', 4);
            $autokode = $upper . $angka;

            // mengambil nilai harga barang 
            $query = $this->Req_m->get_harga2($id_request);
            $data = $query->row();
            $harga = $data->harga;

            $id_order = $autokode;
            $total = $jumlah * $harga;
            $approval = $this->session->userdata('nama_lengkap');
            $status = "approved";
            $tgl_order = date('Y-m-d');

            $u = array(
                'id_order' => $id_order,
                'id_request' => $id_request,
                'harga_total' => $total,
                'approval' => $approval,
                'status_order' => $status,
                'tanggal_order' => $tgl_order
            );

            $this->Req_m->input($u, 'orders');

            redirect('manager/approve');
        } else {
            redirect('auth/logout');
        }
    }
}
