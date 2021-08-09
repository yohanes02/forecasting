<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapincom extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Incoming_m', 'Order_m']);
        $this->load->helper(['aw_helper', 'string']);
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            //default session tgl
            $st['tg1'] = "";
            $this->session->set_userdata($st);

            $d['supplier'] = $this->db->get('supplier');
            $d['incoming'] = $this->Incoming_m->tampil();
            $this->load->view('Manager/laporan/lapincom', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function filter()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $d['supplier'] = $this->db->get('supplier');
            $d['incoming'] = $this->Incoming_m->filter();
            $this->load->view('Manager/laporan/lapincom', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function print()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            //mengecek session salah satu tanggal
            $tgl1 = $this->session->userdata('tg1');

            if ($tgl1 == "") {
                $d['incoming'] = $this->Incoming_m->tampil();
            } else {
                $d['incoming'] = $this->Incoming_m->filter();
            }

            $this->load->view('Manager/laporan/cetak/ctk_incom', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function pdf()
    {
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-penerimaan-barang.pdf";

        //mengecek session salah satu tanggal
        $tgl1 = $this->session->userdata('tg1');

        if ($tgl1 == "") {
            $d['incoming'] = $this->Incoming_m->tampil();
        } else {
            $d['incoming'] = $this->Incoming_m->filter();
        }

        $this->pdf->load_view('Manager/laporan/pdf/lapincom_pdf', $d);
    }

    public function rqs()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $st['sup'] = $this->input->post('supplier');
            $this->session->set_userdata($st);
            redirect('Manager/lapincom/result');
        } else {
            redirect('auth/logout');
        }
    }

    public function result()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $d['incoming'] = $this->Incoming_m->result();

            $tgl1 = $this->session->userdata('tg1');
            $sup = $this->session->userdata('sup');
            $d['incom'] = $this->db->query("SELECT * FROM penerimaan a LEFT JOIN orders b ON a.id_order=b.id_order LEFT JOIN request c ON b.id_request=c.id_request LEFT JOIN barang d ON c.kode=d.kode LEFT JOIN satuan e ON d.id_unit=e.id_unit LEFT JOIN supplier f ON d.id_supplier=f.id_supplier WHERE a.tgl_terima = '" . $tgl1 . "' AND f.id_supplier='" . $sup . "' limit 1");
            $d['autokode'] = $this->Incoming_m->get_kode();
            $this->load->view('Manager/laporan/cetak/ctk_quality', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function set()
    {
        $st['tg1'] = $this->input->post('tanggal_awal');
        $this->session->set_userdata($st);
        redirect('Manager/lapincom/filter');
    }
}
