<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Forcast_m extends CI_Model
{
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
