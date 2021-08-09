<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_m');
		$this->load->model('Barang_m');
		$this->load->model('Chart_model');
		$this->load->helper('aw_helper');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

			//kirim data
			$d['dtbarang'] = $this->Dashboard_m->barang();
			$d['dtstock'] = $this->Dashboard_m->stock();
			$d['dtsupplier'] = $this->Dashboard_m->supplier();
			$d['dtincoming'] = $this->Dashboard_m->incoming();
			$d['dtused'] = $this->Dashboard_m->used();
			$d['dtrequest'] = $this->Dashboard_m->request();
			$d['rusak'] = $this->Dashboard_m->rusak();
			//ambil data barang dan tahun
			$d['barang'] = $this->db->get('barang');
			$d['tahun'] = $this->db->query("SELECT tahun FROM `peramalan` GROUP BY tahun");

			//get post data
			if (isset($_POST['year'])) {
				$th = $this->input->post('year');
				$kode = $this->input->post('code');

				$data = $this->Barang_m->getDataBarang($kode);
				$d['namabarang'] = $data->nm_barang;
			} else {
				$th = date('Y');
				$kode = "NMSMA4530";

				$data = $this->Barang_m->getDataBarang($kode);
				$d['namabarang'] = $data->nm_barang;
			}

			$data = $this->Chart_model->get_data($th, $kode);
			$d['data'] = json_encode($data);

			$this->load->view('dashboard/stocker', $d);
		} else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

			//kirim data
			$d['order'] = $this->Dashboard_m->order();
			$d['dtrequest'] = $this->Dashboard_m->request();
			$d['rusak'] = $this->Dashboard_m->rusak();
			$d['user'] = $this->Dashboard_m->user();
			//ambil data barang dan tahun
			$d['barang'] = $this->db->get('barang');
			$d['tahun'] = $this->db->query("SELECT tahun FROM `peramalan` GROUP BY tahun");

			//get post data
			if (isset($_POST['year'])) {
				$th = $this->input->post('year');
				$kode = $this->input->post('code');

				$data = $this->Barang_m->getDataBarang($kode);
				$d['namabarang'] = $data->nm_barang;
			} else {
				$th = date('Y');
				$kode = "NMSMA4530";

				$data = $this->Barang_m->getDataBarang($kode);
				$d['namabarang'] = $data->nm_barang;
			}

			$data = $this->Chart_model->get_data($th, $kode);
			$d['data'] = json_encode($data);

			$this->load->view('dashboard/manager', $d);
		} else {
			redirect('auth/logout');
		}
	}
}
