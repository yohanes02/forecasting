<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incoming extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Incoming_m', 'Order_m']);
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            //untuk menampilkan data incoming pada modal
            $d['orders'] = $this->Order_m->tampil();
            $d['incoming'] = $this->Incoming_m->tampil();
            $d['incom'] = $this->Incoming_m->incom();
            $this->load->view('stocker/incoming/home', $d);
        } else {
            redirect('auth/logout');
        }
    }
}
