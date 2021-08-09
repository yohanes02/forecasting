<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Barang_m extends CI_Model
{

    function tampil()
    {
        return $this->db->query("SELECT * FROM barang a LEFT JOIN satuan b ON a.id_unit=b.id_unit LEFT JOIN supplier c ON a.id_supplier=c.id_supplier");
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

    function getDataBarang($kode)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('kode', $kode);
        return $this->db->get()->row();
    }
}
