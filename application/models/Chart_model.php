<?php
class Chart_model extends CI_Model
{

    //get data peramalan from database
    function get_data($th, $kode)
    {

		$this->db->query('SET SESSION sql_mode = ""');

		// ONLY_FULL_GROUP_BY
		$this->db->query('SET SESSION sql_mode =
						  REPLACE(REPLACE(REPLACE(
						  @@sql_mode,
						  "ONLY_FULL_GROUP_BY,", ""),
						  ",ONLY_FULL_GROUP_BY", ""),
						  "ONLY_FULL_GROUP_BY", "")');
						  
        $this->db->select('*');
        $this->db->from('peramalan p');
        $this->db->join('(SELECT kode, Year(tgl_keluar) as tahun, 
                        Month(tgl_keluar) as bln, SUM(qty_keluar) as aktual
                        from pengeluaran WHERE Year(tgl_keluar)="' . $th . '" 
                        AND kode="' . $kode . '" GROUP BY bln) AS keluar', 'p.kode=keluar.kode and p.bln=keluar.bln', 'left');
        $this->db->where('p.kode', $kode);
        return $this->db->get()->result();
    }
}
