<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            //default session tgl
            $st['tg1'] = "";
            $st['tg2'] = "";
            $this->session->set_userdata($st);

            $d['order'] = $this->Order_m->tampil_order();
            $this->load->view('stocker/laporan/laporder', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function filter()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['order'] = $this->Order_m->filter();
            $this->load->view('stocker/laporan/laporder', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function print()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            //mengecek session salah satu tanggal
            $tgl1 = $this->session->userdata('tg1');

            if ($tgl1 == "") {
                $d['order'] = $this->Order_m->ctk_order();
            } else {
                $d['order'] = $this->Order_m->filter();
            }

            $this->load->view('stocker/laporan/cetak/ctk_laporder', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function xls()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            //mengecek session salah satu tanggal
            $tgl1 = $this->session->userdata('tg1');

            if ($tgl1 == "") {
                $d['order'] = $this->Order_m->ctk_order();
            } else {
                $d['order'] = $this->Order_m->filter();
            }

            $this->load->view('stocker/laporan/excel/xls_laporder', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function pdf()
    {
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-request-order.pdf";

        //mengecek session salah satu tanggal
        $tgl1 = $this->session->userdata('tg1');

        if ($tgl1 == "") {
            $d['order'] = $this->Order_m->ctk_order();
        } else {
            $d['order'] = $this->Order_m->filter();
        }

        $this->pdf->load_view('stocker/laporan/pdf/laporder_pdf', $d);
    }

    public function set()
    {
        $st['tg1'] = $this->input->post('tanggal_awal');
        $st['tg2'] = $this->input->post('tanggal_akhir');
        $this->session->set_userdata($st);
        redirect('stocker/laporder/filter');
    }
}
