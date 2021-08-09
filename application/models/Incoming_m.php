<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Incoming_m extends CI_Model
{

    function tampil()
    {
        return $this->db->query("SELECT * FROM penerimaan a LEFT JOIN orders b ON a.id_order=b.id_order LEFT JOIN request c ON b.id_request=c.id_request LEFT JOIN barang d ON c.kode=d.kode LEFT JOIN satuan e ON d.id_unit=e.id_unit LEFT JOIN supplier f ON d.id_supplier=f.id_supplier");
    }

    function incom()
    {
        $query = $this->db->query("SELECT id_order FROM orders where status_order='approved'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function filter()
    {
        $tgl1 = $this->session->userdata('tg1');

        return $this->db->query("SELECT * FROM penerimaan a LEFT JOIN orders b ON a.id_order=b.id_order LEFT JOIN request c ON b.id_request=c.id_request LEFT JOIN barang d ON c.kode=d.kode LEFT JOIN satuan e ON d.id_unit=e.id_unit LEFT JOIN supplier f ON d.id_supplier=f.id_supplier WHERE tgl_terima = '" . $tgl1 . "'");
    }

    function result()
    {
        $tgl1 = $this->session->userdata('tg1');
        $sup = $this->session->userdata('sup');

        return $this->db->query("SELECT * FROM penerimaan a LEFT JOIN orders b ON a.id_order=b.id_order LEFT JOIN request c ON b.id_request=c.id_request LEFT JOIN barang d ON c.kode=d.kode LEFT JOIN satuan e ON d.id_unit=e.id_unit LEFT JOIN supplier f ON d.id_supplier=f.id_supplier WHERE a.tgl_terima = '" . $tgl1 . "' AND f.id_supplier='" . $sup . "'");
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

    function get_kode()
    {
        $huruf = random_string('alpha', 2);
        $upper = strtoupper($huruf);
        $angka = random_string('numeric', 2);
        $angka2 = random_string('numeric', 3);
        $tahun = date('Y');
        $kode = "CWH";
        $autokode = $kode . $angka . '-' . $upper . $tahun . $angka2;
        return $autokode;
    }
}
