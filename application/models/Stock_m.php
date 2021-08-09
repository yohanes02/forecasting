<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Stock_m extends CI_Model
{

    function tampil()
    {
        return $this->db->query("SELECT * FROM stock a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON a.id_unit=c.id_unit");
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

    function lapstock()
    {
        return $this->db->query("SELECT * FROM stock a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON a.id_unit=c.id_unit LEFT JOIN supplier d ON b.id_supplier=d.id_supplier");
    }
}
