<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Used extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Used_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            $d['used'] = $this->Used_m->tampil();
            $this->load->view('stocker/used/home', $d);
        } else {
            redirect('auth/logout');
        }
    }
}
