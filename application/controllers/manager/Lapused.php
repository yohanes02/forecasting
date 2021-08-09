<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapused extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Used_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            //default session tgl
            $st['tg1'] = "";
            $st['tg2'] = "";
            $this->session->set_userdata($st);

            $d['used'] = $this->Used_m->tampil();
            $this->load->view('Manager/laporan/lapused', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function filter()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $d['used'] = $this->Used_m->filter();
            $this->load->view('Manager/laporan/lapused', $d);
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
                $d['used'] = $this->Used_m->tampil();
            } else {
                $d['used'] = $this->Used_m->filter();
            }
            $this->load->view('Manager/laporan/cetak/ctk_lapused', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function xls()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            //mengecek session salah satu tanggal
            $tgl1 = $this->session->userdata('tg1');

            if ($tgl1 == "") {
                $d['used'] = $this->Used_m->tampil();
            } else {
                $d['used'] = $this->Used_m->filter();
            }

            $this->load->view('Manager/laporan/excel/xls_lapused', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function pdf()
    {
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-penggunaan-barang.pdf";

        //mengecek session salah satu tanggal
        $tgl1 = $this->session->userdata('tg1');

        if ($tgl1 == "") {
            $d['used'] = $this->Used_m->tampil();
        } else {
            $d['used'] = $this->Used_m->filter();
        }

        $this->pdf->load_view('Manager/laporan/pdf/lapused_pdf', $d);
    }

    public function set()
    {
        $st['tg1'] = $this->input->post('tanggal_awal');
        $st['tg2'] = $this->input->post('tanggal_akhir');
        $this->session->set_userdata($st);
        redirect('Manager/lapused/filter');
    }
}
