<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapstock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $d['stock'] = $this->Stock_m->lapstock();
            $this->load->view('stocker/laporan/lapstock', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function print()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['stock'] = $this->Stock_m->lapstock();
            $this->load->view('stocker/laporan/cetak/ctk_lapstock', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function xls()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['stock'] = $this->Stock_m->lapstock();
            $this->load->view('stocker/laporan/excel/xls_lapstock', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function pdf()
    {
        $this->load->library('f_pdf');
        $d['stock'] = $this->Stock_m->lapstock();
        $this->load->view('stocker/laporan/pdf/lapstock_pdf', $d); //memanggil view 
    }
}
