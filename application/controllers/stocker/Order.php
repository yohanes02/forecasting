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

    public function check()
    {
        $idk = $this->input->post('id_order');
        if ($idk == "") {
            echo "<script>alert('Mohon mencentang pilihan list terlebih dahulu !');window.history.back();</script>";
            echo "<script>$('#modal-order').modal('show');</script>";
        } else {
            $d['order'] = $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit where a.id_order='$idk'");
            $this->load->view('stocker/incoming/check', $d);
        }
    }

    public function cart()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {

            // $idr = $_POST['id_order']; // Ambil data id_order yang di kirim melalui form submit
            $idk = $this->input->post('id_order'); // Ambil data id_order yang di kirim melalui form submit
            $rusak = $this->input->post('rusak');
            $ket = $this->input->post('ket');
            $status = "completed";

            // Update status order
            $d = array(
                'id_order' => $idk,
                'status_order' => $status
            );

            $where = array(
                'id_order' => $idk
            );

            $this->Order_m->edit_simpan($where, $d, 'orders');

            // Simpan Data Penerimaan Barang

            $qr = $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit where a.id_order='$idk'");
            $data = $qr->row();
            $kd = $data->kode;
            $id_unit = $data->id_unit;
            $qty = $data->qty_barang;

            $qtyB = $qty - $rusak;


            $qr2 = $this->db->query("SELECT quality from stock where kode='$kd'");
            $cekquality = $qr2->num_rows();

            if ($cekquality > 0) {
                $dt = $qr2->row();
                $qty_awal = $dt->quality;
                $allstok = $qty_awal + $qtyB;
            } else {
                $qty_awal = 0;
                $allstok = $qty_awal + $qtyB;
            }


            $tgl = date('Y-m-d');
            $staff = $this->session->userdata('nama_lengkap');

            $ar = array(
                'tgl_terima' => $tgl,
                'id_order' => $idk,
                'qty_awal' => $qty_awal,
                'qty_masuk' => $qty,
                'minus' => $rusak,
                'keterangan' => $ket,
                'qty_stock' => $allstok,
                'staff_gudang' => $staff,
            );

            $this->Order_m->input($ar, 'penerimaan');

            //Memasukkan atau Menambahkan ke Stock
            $sql = $this->db->query("SELECT kode FROM stock where kode='$kd'");
            $cek = $sql->num_rows();

            if ($cek > 0) {
                $min = "5";
                if ($allstok <= $min) {
                    $st = "Stok Akan Habis";
                } else {
                    $st = "Tersedia";
                }
                $this->db->query("UPDATE `stock` SET `quality` = '$allstok', `status` = '$st' WHERE `stock`.`kode` = '$kd'");
            } else {

                $min = "5";
                if ($allstok <= $min) {
                    $st = "Stok Akan Habis";
                } else {
                    $st = "Tersedia";
                }
                $arr = array(
                    'kode' => $kd,
                    'id_unit' => $id_unit,
                    'quality' => $qty,
                    'min_stock' => $min,
                    'status' => $st
                );

                $this->Order_m->input($arr, 'stock');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Stock barang telah ditambahkan !! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('stocker/incoming');
        } else {
            redirect('auth/logout');
        }
    }
}
