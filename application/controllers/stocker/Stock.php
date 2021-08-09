<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
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

            $d['stock'] = $this->Stock_m->tampil();
            $this->load->view('stocker/stock/home', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function use()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            //ambil data barang
            $d['kdbarang'] = $this->db->query("Select kode, nm_barang from barang");

            $this->load->view('stocker/stock/use', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
            $tgl = $this->input->post('tgl');
            $kode = $this->input->post('kodeb');
            $jlh = $this->input->post('jumlah');

            $query = $this->db->query("SELECT quality, id_unit, min_stock FROM stock where kode='$kode'");
            $data = $query->row();
            $stok = $data->quality;
            $unit = $data->id_unit;
            $min = $data->min_stock;


            if ($data == "0" || $stok == "0" || $jlh > $stok) {
?>
                <script>
                    alert('Stok Tidak Cukup !!');
                    window.history.back();
                </script>
<?php
            } else {
                $end = $stok - $jlh;
                if ($end == "0") {
                    $status = "Stok Habis !";
                } else if ($end <= $min && $end != "0") {
                    $status = "Stok Akan Habis";
                } else {
                    $status = "Tersedia";
                }

                $user = $this->session->userdata("nama_lengkap");

                $d = array(
                    'tgl_keluar' => $tgl,
                    'kode' => $kode,
                    'beg_qty' => $stok,
                    'qty_keluar' => $jlh,
                    'end_qty' => $end,
                    'id_unit' => $unit,
                    'staff_gudang' => $user
                );

                $this->Stock_m->input($d, 'pengeluaran');

                // update stok
                $q = array(
                    'quality' => $end,
                    'status' => $status
                );

                $where = array(
                    'kode' => $kode
                );

                $this->Stock_m->edit_simpan($where, $q, 'stock');

                $this->session->set_flashdata('message', '<div class="alert alert-success background-success" role="alert"> 
                    Penggunaan Barang Telah Berhasil diproses ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-remove"></i></button></div>');
                redirect('stocker/stock');
            }
        } else {
            redirect('auth/logout');
        }
    }
}
