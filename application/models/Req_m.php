<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Req_m extends CI_Model
{

    function tampil()
    {
        return $this->db->query("SELECT * FROM request a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON b.id_unit=c.id_unit where status_request != 'approved'");
    }

    function tampil_order()
    {
        return $this->db->query("SELECT * FROM request a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON b.id_unit=c.id_unit LEFT JOIN supplier d ON b.id_supplier=d.id_supplier where a.status_request='proccessed'");
    }

    function get_harga()
    {
        $kode = $this->uri->segment(4);
        return $this->db->query("SELECT * FROM request a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON b.id_unit=c.id_unit LEFT JOIN supplier d ON b.id_supplier=d.id_supplier where id_request='$kode'");
    }

    function get_harga2($id_request)
    {
        return $this->db->query("SELECT * FROM request a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON b.id_unit=c.id_unit LEFT JOIN supplier d ON b.id_supplier=d.id_supplier where id_request='$id_request'");
    }

    function input($d, $table)
    {
        $this->db->insert($table, $d);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function edit_simpan($where, $d, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $d);
    }


    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
