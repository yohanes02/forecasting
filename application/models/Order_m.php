<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Order_m extends CI_Model
{

    function tampil()
    {
        return $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit where a.status_order='approved'");
    }

    function filter()
    {
        $tgl1 = $this->session->userdata('tg1');
        $tgl2 = $this->session->userdata('tg2');

        if ($tgl2 == "") {
            return $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit LEFT JOIN stock f ON b.kode=f.kode WHERE tanggal_order = '" . $tgl1 . "'");
        } else {
            return $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit LEFT JOIN stock f ON b.kode=f.kode WHERE tanggal_order BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
        }
    }

    function tampil_order()
    {
        return $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit");
    }

    function ctk_order()
    {
        return $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit LEFT JOIN stock f ON b.kode=f.kode");
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
