<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Dashboard_m extends CI_Model
{
    function barang()
    {
        $query = $this->db->get('barang');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function stock()
    {
        $query = $this->db->get('stock');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function supplier()
    {
        $query = $this->db->get('supplier');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function incoming()
    {
        $query = $this->db->query("SELECT id_order FROM orders where status_order='approved'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function used()
    {
        $query = $this->db->get('pengeluaran');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function request()
    {
        $query = $this->db->query("SELECT * FROM request a LEFT JOIN barang b ON a.kode=b.kode LEFT JOIN satuan c ON b.id_unit=c.id_unit where status_request != 'approved'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function rusak()
    {
        $query = $this->db->query("SELECT * FROM penerimaan where minus !='0,00'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function user()
    {
        $query = $this->db->query("SELECT * FROM users");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function order()
    {
        $query = $this->db->query("SELECT * FROM orders a LEFT JOIN request b ON a.id_request=b.id_request LEFT JOIN barang c ON b.kode=c.kode LEFT JOIN supplier d ON c.id_supplier=d.id_supplier LEFT JOIN satuan e ON c.id_unit=e.id_unit");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
