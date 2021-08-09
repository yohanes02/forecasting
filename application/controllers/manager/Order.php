<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_m');
        $this->load->helper('aw_helper');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $d['order'] = $this->Order_m->tampil_order();
            $this->load->view('manager/order/home', $d);
        } else {
            redirect('auth/logout');
        }
    }
}
