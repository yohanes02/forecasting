<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Used_m extends CI_Model
{

    function tampil()
    {
        return $this->db->query("SELECT * FROM pengeluaran a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON a.id_unit=c.id_unit");
    }

    function filter()
    {
        $tgl1 = $this->session->userdata('tg1');
        $tgl2 = $this->session->userdata('tg2');

        if ($tgl2 == "") {
            return $this->db->query("SELECT * FROM pengeluaran a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON a.id_unit=c.id_unit WHERE tgl_keluar = '" . $tgl1 . "'");
        } else {
            return $this->db->query("SELECT * FROM pengeluaran a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON a.id_unit=c.id_unit WHERE tgl_keluar BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
        }
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
