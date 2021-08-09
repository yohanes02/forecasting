<?php
// n = forcasting bulan ke berapa ?
$n = $this->session->userdata('bul');
$tahun = $this->session->userdata('tahun');
$kode = $this->session->userdata('kode');
if ($tahun > 2021) {
    $nextyear = true;
    $year = $tahun - 1;
} else {
    $nextyear = false;
    $year = $tahun;
}
$ny = 0;
//nilai alpha
$alpa1 = 0.1;
$alpa2 = 0.2;
$alpa3 = 0.3;
$alpa4 = 0.4;
$alpa5 = 0.5;
$alpa6 = 0.6;
$alpa7 = 0.7;
$alpa8 = 0.8;
$alpa9 = 0.9;

//mencari forcasting bulan ke 1-----------------------------------------------
if ($n == "1") {
    $query = $this->db->query("SELECT * FROM peramalan WHERE kode='$kode' AND bulan='Desember' And tahun='$year'");
    if ($query->num_rows() > 0) {
        $data = $query->num_rows();
    } else {
        $data = 0;
    }

    if ($data == 0 && $nextyear == false) {
        //forcast 1
        $alpa = $alpa1;
        $cari = 0;

        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $ny = 1;
        $thn = $tahun - 1;

        //aktual 1
        $q1 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='1' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d1 = $q1->row()->aktual;

        //aktual 2
        $q2 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='2' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d2 = $q2->row()->aktual;

        //aktual 3
        $q3 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='3' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d3 = $q3->row()->aktual;

        //aktual 4
        $q4 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='4' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d4 = $q4->row()->aktual;

        //aktual 5
        $q5 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='5' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d5 = $q5->row()->aktual;

        //aktual 6
        $q6 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='6' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d6 = $q6->row()->aktual;

        //aktual 7
        $q7 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='7' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d7 = $q7->row()->aktual;

        //aktual 8
        $q8 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='8' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d8 = $q8->row()->aktual;

        //aktual 9
        $q9 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='9' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d9 = $q9->row()->aktual;

        //aktual 10
        $q10 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='10' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d10 = $q10->row()->aktual;

        //aktual 11
        $q11 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='11' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d11 = $q11->row()->aktual;

        //aktual 12
        $q12 = $this->db->query("SELECT SUM(IF(month(tgl_keluar)='12' and year(tgl_keluar)='$thn', `qty_keluar`,0)) AS aktual from pengeluaran where kode = '$kode'");
        $d12 = $q12->row()->aktual;

        //forcast 1
        $a1 = $d1; //nilai aktual 1
        $a2 = $d2; //nilai aktual 2
        $a3 = $d3; //nilai aktual 3
        $a4 = $d4; //nilai aktual 4
        $a5 = $d5; //nilai aktual 5
        $a6 = $d6; //nilai aktual 6
        $a7 = $d7; //nilai aktual 7
        $a8 = $d8; //nilai aktual 8
        $a9 = $d9; //nilai aktual 9
        $a10 = $d10; //nilai aktual 10
        $a11 = $d11; //nilai aktual 11
        $a12 = $d12; //nilai aktual 11

        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);

        //forcast 2,3,4,5,6,7,8,9,10,11,12  =====================================> Alpha 0.1

        $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
        $E2a = $a2 - $ft2a;
        $M2a = abs($E2a);

        $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
        $E3a = $a3 - $ft3a;
        $M3a = abs($E3a);

        $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
        $E4a = $a4 - $ft4a;
        $M4a = abs($E4a);

        $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
        $E5a = $a5 - $ft5a;
        $M5a = abs($E5a);

        $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
        $E6a = $a6 - $ft6a;
        $M6a = abs($E6a);

        $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
        $E7a = $a7 - $ft7a;
        $M7a = abs($E7a);

        $ft8a = $ft7a + $alpa1 * ($a7 - $ft7a); // 8
        $E8a = $a8 - $ft8a;
        $M8a = abs($E8a);

        $ft9a = $ft8a + $alpa1 * ($a8 - $ft8a); // 9
        $E9a = $a9 - $ft9a;
        $M9a = abs($E9a);

        $ft10a = $ft9a + $alpa1 * ($a9 - $ft9a); // 10
        $E10a = $a10 - $ft10a;
        $M10a = abs($E10a);

        $ft11a = $ft10a + $alpa1 * ($a10 - $ft10a); // 11
        $E11a = $a11 - $ft11a;
        $M11a = abs($E11a);

        $ft12a = $ft11a + $alpa1 * ($a11 - $ft11a); // 12
        $E12a = $a12 - $ft12a;
        $M12a = abs($E12a);

        $ft1a = $ft12a + $alpa1 * ($a12 - $ft12a); // Januari


        //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.2

        $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
        $E2b = $a2 - $ft2b;
        $M2b = abs($E2b);

        $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
        $E3b = $a3 - $ft3b;
        $M3b = abs($E3b);

        $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
        $E4b = $a4 - $ft4b;
        $M4b = abs($E4b);

        $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
        $E5b = $a5 - $ft5b;
        $M5b = abs($E5b);

        $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
        $E6b = $a6 - $ft6b;
        $M6b = abs($E6b);

        $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
        $E7b = $a7 - $ft7b;
        $M7b = abs($E7b);

        $ft8b = $ft7b + $alpa2 * ($a7 - $ft7b); // 8
        $E8b = $a8 - $ft8b;
        $M8b = abs($E8b);

        $ft9b = $ft8b + $alpa2 * ($a8 - $ft8b); // 9
        $E9b = $a9 - $ft9b;
        $M9b = abs($E9b);

        $ft10b = $ft9b + $alpa2 * ($a9 - $ft9b); // 10
        $E10b = $a10 - $ft10b;
        $M10b = abs($E10b);

        $ft11b = $ft10b + $alpa2 * ($a10 - $ft10b); // 11
        $E11b = $a11 - $ft11b;
        $M11b = abs($E11b);

        $ft12b = $ft11b + $alpa2 * ($a11 - $ft11b); // 12
        $E12b = $a12 - $ft12b;
        $M12b = abs($E12b);

        $ft1b = $ft12b + $alpa2 * ($a12 - $ft12b); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.3
        $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
        $E2c = $a2 - $ft2c;
        $M2c = abs($E2c);

        $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
        $E3c = $a3 - $ft3c;
        $M3c = abs($E3c);

        $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
        $E4c = $a4 - $ft4c;
        $M4c = abs($E4c);

        $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
        $E5c = $a5 - $ft5c;
        $M5c = abs($E5c);

        $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
        $E6c = $a6 - $ft6c;
        $M6c = abs($E6c);

        $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
        $E7c = $a7 - $ft7c;
        $M7c = abs($E7c);

        $ft8c = $ft7c + $alpa3 * ($a7 - $ft7c); // 8
        $E8c = $a8 - $ft8c;
        $M8c = abs($E8c);

        $ft9c = $ft8c + $alpa3 * ($a8 - $ft8c); // 9
        $E9c = $a9 - $ft9c;
        $M9c = abs($E9c);

        $ft10c = $ft9c + $alpa3 * ($a9 - $ft9c); // 10
        $E10c = $a10 - $ft10c;
        $M10c = abs($E10c);

        $ft11c = $ft10c + $alpa3 * ($a10 - $ft10c); // 11
        $E11c = $a11 - $ft11c;
        $M11c = abs($E11c);

        $ft12c = $ft11c + $alpa3 * ($a11 - $ft11c); // 12
        $E12c = $a12 - $ft12c;
        $M12c = abs($E12c);

        $ft1c = $ft12c + $alpa3 * ($a12 - $ft12c); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.4
        $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
        $E2d = $a2 - $ft2d;
        $M2d = abs($E2d);

        $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
        $E3d = $a3 - $ft3d;
        $M3d = abs($E3d);

        $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
        $E4d = $a4 - $ft4d;
        $M4d = abs($E4d);

        $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
        $E5d = $a5 - $ft5d;
        $M5d = abs($E5d);

        $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
        $E6d = $a6 - $ft6d;
        $M6d = abs($E6d);

        $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
        $E7d = $a7 - $ft7d;
        $M7d = abs($E7d);

        $ft8d = $ft7d + $alpa4 * ($a7 - $ft7d); // 8
        $E8d = $a8 - $ft8d;
        $M8d = abs($E8d);

        $ft9d = $ft8d + $alpa4 * ($a8 - $ft8d); // 9
        $E9d = $a9 - $ft9d;
        $M9d = abs($E9d);

        $ft10d = $ft9d + $alpa4 * ($a9 - $ft9d); // 10
        $E10d = $a10 - $ft10d;
        $M10d = abs($E10d);

        $ft11d = $ft10d + $alpa4 * ($a10 - $ft10d); // 11
        $E11d = $a11 - $ft11d;
        $M11d = abs($E11d);

        $ft12d = $ft11d + $alpa4 * ($a11 - $ft11d); // 12
        $E12d = $a12 - $ft12d;
        $M12d = abs($E12d);

        $ft1d = $ft12d + $alpa4 * ($a12 - $ft12d); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.5
        $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
        $E2e = $a2 - $ft2e;
        $M2e = abs($E2e);

        $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
        $E3e = $a3 - $ft3e;
        $M3e = abs($E3e);

        $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
        $E4e = $a4 - $ft4e;
        $M4e = abs($E4e);

        $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
        $E5e = $a5 - $ft5e;
        $M5e = abs($E5e);

        $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
        $E6e = $a6 - $ft6e;
        $M6e = abs($E6e);

        $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
        $E7e = $a7 - $ft7e;
        $M7e = abs($E7e);

        $ft8e = $ft7e + $alpa5 * ($a7 - $ft7e); // 8
        $E8e = $a8 - $ft8e;
        $M8e = abs($E8e);

        $ft9e = $ft8e + $alpa5 * ($a8 - $ft8e); // 9
        $E9e = $a9 - $ft9e;
        $M9e = abs($E9e);

        $ft10e = $ft9e + $alpa5 * ($a9 - $ft9e); // 10
        $E10e = $a10 - $ft10e;
        $M10e = abs($E10e);

        $ft11e = $ft10e + $alpa5 * ($a10 - $ft10e); // 11
        $E11e = $a11 - $ft11e;
        $M11e = abs($E11e);

        $ft12e = $ft11e + $alpa5 * ($a11 - $ft11e); // 12
        $E12e = $a12 - $ft12e;
        $M12e = abs($E12e);

        $ft1e = $ft12e + $alpa5 * ($a12 - $ft12e); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.6
        $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
        $E2f = $a2 - $ft2f;
        $M2f = abs($E2f);

        $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
        $E3f = $a3 - $ft3f;
        $M3f = abs($E3f);

        $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
        $E4f = $a4 - $ft4f;
        $M4f = abs($E4f);

        $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
        $E5f = $a5 - $ft5f;
        $M5f = abs($E5f);

        $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
        $E6f = $a6 - $ft6f;
        $M6f = abs($E6f);

        $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
        $E7f = $a7 - $ft7f;
        $M7f = abs($E7f);

        $ft8f = $ft7f + $alpa6 * ($a7 - $ft7f); // 8
        $E8f = $a8 - $ft8f;
        $M8f = abs($E8f);

        $ft9f = $ft8f + $alpa6 * ($a8 - $ft8f); // 9
        $E9f = $a9 - $ft9f;
        $M9f = abs($E9f);

        $ft10f = $ft9f + $alpa6 * ($a9 - $ft9f); // 10
        $E10f = $a10 - $ft10f;
        $M10f = abs($E10f);

        $ft11f = $ft10f + $alpa6 * ($a10 - $ft10f); // 11
        $E11f = $a11 - $ft11f;
        $M11f = abs($E11f);

        $ft12f = $ft11f + $alpa6 * ($a11 - $ft11f); // 12
        $E12f = $a12 - $ft12f;
        $M12f = abs($E12f);

        $ft1f = $ft12f + $alpa6 * ($a12 - $ft12f); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11,12 ====================================> Alpha 0.7
        $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
        $E2g = $a2 - $ft2g;
        $M2g = abs($E2g);

        $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
        $E3g = $a3 - $ft3g;
        $M3g = abs($E3g);

        $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
        $E4g = $a4 - $ft4g;
        $M4g = abs($E4g);

        $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
        $E5g = $a5 - $ft5g;
        $M5g = abs($E5g);

        $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
        $E6g = $a6 - $ft6g;
        $M6g = abs($E6g);

        $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
        $E7g = $a7 - $ft7g;
        $M7g = abs($E7g);

        $ft8g = $ft7g + $alpa7 * ($a7 - $ft7g); // 8
        $E8g = $a8 - $ft8g;
        $M8g = abs($E8g);

        $ft9g = $ft8g + $alpa7 * ($a8 - $ft8g); // 9
        $E9g = $a9 - $ft9g;
        $M9g = abs($E9g);

        $ft10g = $ft9g + $alpa7 * ($a9 - $ft9g); // 10
        $E10g = $a10 - $ft10g;
        $M10g = abs($E10g);

        $ft11g = $ft10g + $alpa7 * ($a10 - $ft10g); // 11
        $E11g = $a11 - $ft11g;
        $M11g = abs($E11g);

        $ft12g = $ft11g + $alpa7 * ($a11 - $ft11g); // 12
        $E12g = $a12 - $ft12g;
        $M12g = abs($E12g);

        $ft1g = $ft12g + $alpa7 * ($a12 - $ft12g); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.8
        $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
        $E2h = $a2 - $ft2h;
        $M2h = abs($E2h);

        $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
        $E3h = $a3 - $ft3h;
        $M3h = abs($E3h);

        $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
        $E4h = $a4 - $ft4h;
        $M4h = abs($E4h);

        $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
        $E5h = $a5 - $ft5h;
        $M5h = abs($E5h);

        $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
        $E6h = $a6 - $ft6h;
        $M6h = abs($E6h);

        $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
        $E7h = $a7 - $ft7h;
        $M7h = abs($E7h);

        $ft8h = $ft7h + $alpa8 * ($a7 - $ft7h); // 8
        $E8h = $a8 - $ft8h;
        $M8h = abs($E8h);

        $ft9h = $ft8h + $alpa8 * ($a8 - $ft8h); // 9
        $E9h = $a9 - $ft9h;
        $M9h = abs($E9h);

        $ft10h = $ft9h + $alpa8 * ($a9 - $ft9h); // 10
        $E10h = $a10 - $ft10h;
        $M10h = abs($E10h);

        $ft11h = $ft10h + $alpa8 * ($a10 - $ft10h); // 11
        $E11h = $a11 - $ft11h;
        $M11h = abs($E11h);

        $ft12h = $ft11h + $alpa8 * ($a11 - $ft11h); // 12
        $E12h = $a12 - $ft12h;
        $M12h = abs($E12h);

        $ft1h = $ft12h + $alpa8 * ($a12 - $ft12h); // Januari

        //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.9
        $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
        $E2i = $a2 - $ft2i;
        $M2i = abs($E2i);

        $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
        $E3i = $a3 - $ft3i;
        $M3i = abs($E3i);

        $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
        $E4i = $a4 - $ft4i;
        $M4i = abs($E4i);

        $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
        $E5i = $a5 - $ft5i;
        $M5i = abs($E5i);

        $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
        $E6i = $a6 - $ft6i;
        $M6i = abs($E6i);

        $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
        $E7i = $a7 - $ft7i;
        $M7i = abs($E7i);

        $ft8i = $ft7i + $alpa9 * ($a7 - $ft7i); // 8
        $E8i = $a8 - $ft8i;
        $M8i = abs($E8i);

        $ft9i = $ft8i + $alpa9 * ($a8 - $ft8i); // 9
        $E9i = $a9 - $ft9i;
        $M9i = abs($E9i);

        $ft10i = $ft9i + $alpa9 * ($a9 - $ft9i); // 10
        $E10i = $a10 - $ft10i;
        $M10i = abs($E10i);

        $ft11i = $ft10i + $alpa9 * ($a10 - $ft10i); // 11
        $E11i = $a11 - $ft11i;
        $M11i = abs($E11i);

        $ft12i = $ft11i + $alpa9 * ($a11 - $ft11i); // 12
        $E12i = $a12 - $ft12i;
        $M12i = abs($E12i);

        $ft1i = $ft12i + $alpa9 * ($a12 - $ft12i); // Januari

        //cari forcast januari dengan EROR terkecil
        $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a + $M8a + $M9a + $M10a + $M11a + $M12a) / 12;
        $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b + $M8b + $M9b + $M10b + $M11b + $M12b) / 12;
        $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c + $M8c + $M9c + $M10c + $M11c + $M12c) / 12;
        $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d + $M8d + $M9d + $M10d + $M11d + $M12d) / 12;
        $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e + $M8e + $M9e + $M10e + $M11e + $M12e) / 12;
        $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f + $M8f + $M9f + $M10f + $M11f + $M12f) / 12;
        $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g + $M8g + $M9g + $M10g + $M11g + $M12g) / 12;
        $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h + $M8h + $M9h + $M10h + $M11h + $M12h) / 12;
        $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i + $M8i + $M9i + $M10i + $M11i + $M12i) / 12;

        $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
        if ($cari == $MAE01) {

            //forcast2
            $alpa = $alpa1;
            $ft2 = $ft2a;
            $e2 = $E2a;
            $m2 = $M2a;

            //forcast3
            $ft3 = $ft3a;
            $e3 = $E3a;
            $m3 = $M3a;

            //forcast4
            $ft4 = $ft4a;
            $e4 = $E4a;
            $m4 = $M4a;

            //forcast5
            $ft5 = $ft5a;
            $e5 = $E5a;
            $m5 = $M5a;

            //forcast6
            $ft6 = $ft6a;
            $e6 = $E6a;
            $m6 = $M6a;

            //forcast7
            $ft7 = $ft7a;
            $e7 = $E7a;
            $m7 = $M7a;

            //forcast8
            $ft8 = $ft8a;
            $e8 = $E8a;
            $m8 = $M8a;

            //forcast9
            $ft9 = $ft9a;
            $e9 = $E9a;
            $m9 = $M9a;

            //forcast10
            $ft10 = $ft10a;
            $e10 = $E10a;
            $m10 = $M10a;

            //forcast11
            $ft11 = $ft11a;
            $e11 = $E11a;
            $m11 = $M11a;

            //forcast12
            $ft12 = $ft12a;
            $e12 = $E12a;
            $m12 = $M12a;

            //forcast13
            $ft13 = $ft1a;
        } else if ($cari == $MAE02) {
            //forcast2
            $alpa = $alpa2;
            $ft2 = $ft2b;
            $e2 = $E2b;
            $m2 = $M2b;

            //forcast3
            $ft3 = $ft3b;
            $e3 = $E3b;
            $m3 = $M3b;

            //forcast4
            $ft4 = $ft4b;
            $e4 = $E4b;
            $m4 = $M4b;

            //forcast5
            $ft5 = $ft5b;
            $e5 = $E5b;
            $m5 = $M5b;

            //forcast6
            $ft6 = $ft6b;
            $e6 = $E6b;
            $m6 = $M6b;

            //forcast7
            $ft7 = $ft7b;
            $e7 = $E7b;
            $m7 = $M7b;

            //forcast8
            $ft8 = $ft8b;
            $e8 = $E8b;
            $m8 = $M8b;

            //forcast9
            $ft9 = $ft9b;
            $e9 = $E9b;
            $m9 = $M9b;

            //forcast10
            $ft10 = $ft10b;
            $e10 = $E10b;
            $m10 = $M10b;

            //forcast11
            $ft11 = $ft11b;
            $e11 = $E11b;
            $m11 = $M11b;

            //forcast12
            $ft12 = $ft12b;
            $e12 = $E12b;
            $m12 = $M12b;

            //forcast13
            $ft13 = $ft1b;
        } else if ($cari == $MAE03) {
            //forcast2
            $alpa = $alpa3;
            $ft2 = $ft2c;
            $e2 = $E2c;
            $m2 = $M2c;

            //forcast3
            $ft3 = $ft3c;
            $e3 = $E3c;
            $m3 = $M3c;

            //forcast4
            $ft4 = $ft4c;
            $e4 = $E4c;
            $m4 = $M4c;

            //forcast5
            $ft5 = $ft5c;
            $e5 = $E5c;
            $m5 = $M5c;

            //forcast6
            $ft6 = $ft6c;
            $e6 = $E6c;
            $m6 = $M6c;

            //forcast7
            $ft7 = $ft7c;
            $e7 = $E7c;
            $m7 = $M7c;

            //forcast8
            $ft8 = $ft8c;
            $e8 = $E8c;
            $m8 = $M8c;

            //forcast9
            $ft9 = $ft9c;
            $e9 = $E9c;
            $m9 = $M9c;

            //forcast10
            $ft10 = $ft10c;
            $e10 = $E10c;
            $m10 = $M10c;

            //forcast11
            $ft11 = $ft11c;
            $e11 = $E11c;
            $m11 = $M11c;

            //forcast12
            $ft12 = $ft12c;
            $e12 = $E12c;
            $m12 = $M12c;

            //forcast13
            $ft13 = $ft1c;
        } else if ($cari == $MAE04) {
            //forcast2
            $alpa = $alpa4;
            $ft2 = $ft2d;
            $e2 = $E2d;
            $m2 = $M2d;

            //forcast3
            $ft3 = $ft3d;
            $e3 = $E3d;
            $m3 = $M3d;

            //forcast4
            $ft4 = $ft4d;
            $e4 = $E4d;
            $m4 = $M4d;

            //forcast5
            $ft5 = $ft5d;
            $e5 = $E5d;
            $m5 = $M5d;

            //forcast6
            $ft6 = $ft6d;
            $e6 = $E6d;
            $m6 = $M6d;

            //forcast7
            $ft7 = $ft7d;
            $e7 = $E7d;
            $m7 = $M7d;

            //forcast8
            $ft8 = $ft8d;
            $e8 = $E8d;
            $m8 = $M8d;

            //forcast9
            $ft9 = $ft9d;
            $e9 = $E9d;
            $m9 = $M9d;

            //forcast10
            $ft10 = $ft10d;
            $e10 = $E10d;
            $m10 = $M10d;

            //forcast11
            $ft11 = $ft11d;
            $e11 = $E11d;
            $m11 = $M11d;

            //forcast12
            $ft12 = $ft12d;
            $e12 = $E12d;
            $m12 = $M12d;

            //forcast13
            $ft13 = $ft1d;
        } else if ($cari == $MAE05) {
            //forcast2
            $alpa = $alpa5;
            $ft2 = $ft2e;
            $e2 = $E2e;
            $m2 = $M2e;

            //forcast3
            $ft3 = $ft3e;
            $e3 = $E3e;
            $m3 = $M3e;

            //forcast4
            $ft4 = $ft4e;
            $e4 = $E4e;
            $m4 = $M4e;

            //forcast5
            $ft5 = $ft5e;
            $e5 = $E5e;
            $m5 = $M5e;

            //forcast6
            $ft6 = $ft6e;
            $e6 = $E6e;
            $m6 = $M6e;

            //forcast7
            $ft7 = $ft7e;
            $e7 = $E7e;
            $m7 = $M7e;

            //forcast8
            $ft8 = $ft8e;
            $e8 = $E8e;
            $m8 = $M8e;

            //forcast9
            $ft9 = $ft9e;
            $e9 = $E9e;
            $m9 = $M9e;

            //forcast10
            $ft10 = $ft10e;
            $e10 = $E10e;
            $m10 = $M10e;

            //forcast11
            $ft11 = $ft11e;
            $e11 = $E11e;
            $m11 = $M11e;

            //forcast12
            $ft12 = $ft12e;
            $e12 = $E12e;
            $m12 = $M12e;

            //forcast13
            $ft13 = $ft1e;
        } else if ($cari == $MAE06) {
            //forcast2
            $alpa = $alpa6;
            $ft2 = $ft2f;
            $e2 = $E2f;
            $m2 = $M2f;

            //forcast3
            $ft3 = $ft3f;
            $e3 = $E3f;
            $m3 = $M3f;

            //forcast4
            $ft4 = $ft4f;
            $e4 = $E4f;
            $m4 = $M4f;

            //forcast5
            $ft5 = $ft5f;
            $e5 = $E5f;
            $m5 = $M5f;

            //forcast6
            $ft6 = $ft6f;
            $e6 = $E6f;
            $m6 = $M6f;

            //forcast7
            $ft7 = $ft7f;
            $e7 = $E7f;
            $m7 = $M7f;

            //forcast8
            $ft8 = $ft8f;
            $e8 = $E8f;
            $m8 = $M8f;

            //forcast9
            $ft9 = $ft9f;
            $e9 = $E9f;
            $m9 = $M9f;

            //forcast10
            $ft10 = $ft10f;
            $e10 = $E10f;
            $m10 = $M10f;

            //forcast11
            $ft11 = $ft11f;
            $e11 = $E11f;
            $m11 = $M11f;

            //forcast12
            $ft12 = $ft12f;
            $e12 = $E12f;
            $m12 = $M12f;

            //forcast13
            $ft13 = $ft1f;
        } else if ($cari == $MAE07) {
            //forcast2
            $alpa = $alpa7;
            $ft2 = $ft2g;
            $e2 = $E2g;
            $m2 = $M2g;

            //forcast3
            $ft3 = $ft3g;
            $e3 = $E3g;
            $m3 = $M3g;

            //forcast4
            $ft4 = $ft4g;
            $e4 = $E4g;
            $m4 = $M4g;

            //forcast5
            $ft5 = $ft5g;
            $e5 = $E5g;
            $m5 = $M5g;

            //forcast6
            $ft6 = $ft6g;
            $e6 = $E6g;
            $m6 = $M6g;

            //forcast7
            $ft7 = $ft7g;
            $e7 = $E7g;
            $m7 = $M7g;

            //forcast8
            $ft8 = $ft8g;
            $e8 = $E8g;
            $m8 = $M8g;

            //forcast9
            $ft9 = $ft9g;
            $e9 = $E9g;
            $m9 = $M9g;

            //forcast10
            $ft10 = $ft10g;
            $e10 = $E10g;
            $m10 = $M10g;

            //forcast11
            $ft11 = $ft11g;
            $e11 = $E11g;
            $m11 = $M11g;

            //forcast12
            $ft12 = $ft12g;
            $e12 = $E12g;
            $m12 = $M12g;

            //forcast13
            $ft13 = $ft1g;
        } else if ($cari == $MAE08) {
            //forcast2
            $alpa = $alpa8;
            $ft2 = $ft2h;
            $e2 = $E2h;
            $m2 = $M2h;

            //forcast3
            $ft3 = $ft3h;
            $e3 = $E3h;
            $m3 = $M3h;

            //forcast4
            $ft4 = $ft4h;
            $e4 = $E4h;
            $m4 = $M4h;

            //forcast5
            $ft5 = $ft5h;
            $e5 = $E5h;
            $m5 = $M5h;

            //forcast6
            $ft6 = $ft6h;
            $e6 = $E6h;
            $m6 = $M6h;

            //forcast7
            $ft7 = $ft7h;
            $e7 = $E7h;
            $m7 = $M7h;

            //forcast8
            $ft8 = $ft8h;
            $e8 = $E8h;
            $m8 = $M8h;

            //forcast9
            $ft9 = $ft9h;
            $e9 = $E9h;
            $m9 = $M9h;

            //forcast10
            $ft10 = $ft10h;
            $e10 = $E10h;
            $m10 = $M10h;

            //forcast11
            $ft11 = $ft11h;
            $e11 = $E11h;
            $m11 = $M11h;

            //forcast12
            $ft12 = $ft12h;
            $e12 = $E12h;
            $m12 = $M12h;

            //forcast13
            $ft13 = $ft1h;
        } else if ($cari == $MAE09) {
            //forcast2
            $alpa = $alpa9;
            $ft2 = $ft2i;
            $e2 = $E2i;
            $m2 = $M2i;

            //forcast3
            $ft3 = $ft3i;
            $e3 = $E3i;
            $m3 = $M3i;

            //forcast4
            $ft4 = $ft4i;
            $e4 = $E4i;
            $m4 = $M4i;

            //forcast5
            $ft5 = $ft5i;
            $e5 = $E5i;
            $m5 = $M5i;

            //forcast6
            $ft6 = $ft6i;
            $e6 = $E6i;
            $m6 = $M6i;

            //forcast7
            $ft7 = $ft7i;
            $e7 = $E7i;
            $m7 = $M7i;

            //forcast8
            $ft8 = $ft8i;
            $e8 = $E8i;
            $m8 = $M8i;

            //forcast9
            $ft9 = $ft9i;
            $e9 = $E9i;
            $m9 = $M9i;

            //forcast10
            $ft10 = $ft10i;
            $e10 = $E10i;
            $m10 = $M10i;

            //forcast11
            $ft11 = $ft11i;
            $e11 = $E11i;
            $m11 = $M11i;

            //forcast12
            $ft12 = $ft12i;
            $e12 = $E12i;
            $m12 = $M12i;

            //forcast13
            $ft13 = $ft1i;
        }
    }

    //mencari forcasting bulan ke 2-------------------------------------------
} else if ($n == "2") {

    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    //forcast 2 =====================================> Alpha 0.1
    $a2 = $ak2; //nilai aktual 2
    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1);
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    //forcast 2 =====================================> Alpha 0.2
    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1);
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    //forcast 2 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1);
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    //forcast 2 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1);
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    //forcast 2 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1);
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    //forcast 2 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1);
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    //forcast 2 =====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1);
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    //forcast 2 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1);
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    //forcast 2 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1);
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    //cari forcast 2 dengan EROR terkecil
    $MAE01 = ($M1) / 1;
    $MAE02 = ($M1) / 1;
    $MAE03 = ($M1) / 1;
    $MAE04 = ($M1) / 1;
    $MAE05 = ($M1) / 1;
    $MAE06 = ($M1) / 1;
    $MAE07 = ($M1) / 1;
    $MAE08 = ($M1) / 1;
    $MAE09 = ($M1) / 1;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;
    }

    //mencari forcasting bulan ke 3
} else if ($n == "3") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3

    //forcast 2 dan 3  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);


    //forcast 2 dan 3 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    //forcast 2 dan 3 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    //forcast 2 dan 3 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    //forcast 2 dan 3 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    //forcast 2 dan 3 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    //forcast 2 dan 3 =====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    //forcast 2 dan 3 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    //forcast 2 dan 3 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    //cari forcast 3 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a) / 2;
    $MAE02 = ($M1 + $M2b) / 2;
    $MAE03 = ($M1 + $M2c) / 2;
    $MAE04 = ($M1 + $M2d) / 2;
    $MAE05 = ($M1 + $M2e) / 2;
    $MAE06 = ($M1 + $M2f) / 2;
    $MAE07 = ($M1 + $M2g) / 2;
    $MAE08 = ($M1 + $M2h) / 2;
    $MAE09 = ($M1 + $M2i) / 2;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;
    }

    //mencari forcasting bulan ke 4
} else if ($n == "4") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4

    //forcast 2,3,4  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);


    //forcast 2,3,4 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    //forcast 2 dan 3 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    //forcast 2,3,4 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    //forcast 2,3,4 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    //forcast 2,3,4 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    //forcast 2,3,4 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    //forcast 2,3,4 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    //forcast 2,3,4 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    //cari forcast 4 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a) / 3;
    $MAE02 = ($M1 + $M2b + $M3b) / 3;
    $MAE03 = ($M1 + $M2c + $M3c) / 3;
    $MAE04 = ($M1 + $M2d + $M3d) / 3;;
    $MAE05 = ($M1 + $M2e + $M3e) / 3;
    $MAE06 = ($M1 + $M2f + $M3f) / 3;
    $MAE07 = ($M1 + $M2g + $M3g) / 3;
    $MAE08 = ($M1 + $M2h + $M3h) / 3;
    $MAE09 = ($M1 + $M2i + $M3i) / 3;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast3
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast3
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;
    }


    //mencari forcasting bulan ke 5
} else if ($n == "5") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5

    //forcast 2,3,4,5  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);


    //forcast 2,3,4,5 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    //forcast 2,3,4,5 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    //forcast 2,3,4,5 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    //forcast 2,3,4,5 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    //forcast 2,3,4,5 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    //forcast 2,3,4,5 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    //forcast 2,3,4,5 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    //forcast 2,3,4,5 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    //cari forcast 5 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a) / 4;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b) / 4;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c) / 4;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d) / 4;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e) / 4;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f) / 4;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g) / 4;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h) / 4;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i) / 4;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;
    }

    //mencari forcasting bulan ke 6
} else if ($n == "6") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6

    //forcast 2,3,4,5,6  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);


    //forcast 2,3,4,5,6 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    //forcast 2,3,4,5,6 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    //forcast 2,3,4,5,6 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    //forcast 2,3,4,5,6 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    //forcast 2,3,4,5,6 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    //forcast 2,3,4,5,6 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    //forcast 2,3,4,5,6 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    //forcast 2,3,4,5,6 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    //cari forcast 6 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a) / 5;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b) / 5;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c) / 5;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d) / 5;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e) / 5;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f) / 5;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g) / 5;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h) / 5;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i) / 5;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;
    }

    //mencari forcasting bulan ke 7
} else if ($n == "7") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6
    $a7 = $ak7; //nilai aktual 7

    //forcast 2,3,4,5,6,7  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);

    $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
    $E7a = $a7 - $ft7a;
    $M7a = abs($E7a);



    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
    $E7b = $a7 - $ft7b;
    $M7b = abs($E7b);

    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
    $E7c = $a7 - $ft7c;
    $M7c = abs($E7c);

    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
    $E7d = $a7 - $ft7d;
    $M7d = abs($E7d);

    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
    $E7e = $a7 - $ft7e;
    $M7e = abs($E7e);

    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
    $E7f = $a7 - $ft7f;
    $M7f = abs($E7f);

    //forcast 2,3,4,5,6,7 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
    $E7g = $a7 - $ft7g;
    $M7g = abs($E7g);

    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
    $E7h = $a7 - $ft7h;
    $M7h = abs($E7h);

    //forcast 2,3,4,5,6,7 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
    $E7i = $a7 - $ft7i;
    $M7i = abs($E7i);

    //cari forcast 7 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a) / 6;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b) / 6;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c) / 6;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d) / 6;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e) / 6;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f) / 6;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g) / 6;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h) / 6;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i) / 6;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;

        //forcast7
        $ft7 = $ft7a;
        $e7 = $E7a;
        $m7 = $M7a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;

        //forcast7
        $ft7 = $ft7b;
        $e7 = $E7b;
        $m7 = $M7b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;

        //forcast7
        $ft7 = $ft7c;
        $e7 = $E7c;
        $m7 = $M7c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;

        //forcast7
        $ft7 = $ft7d;
        $e7 = $E7d;
        $m7 = $M7d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;

        //forcast7
        $ft7 = $ft7e;
        $e7 = $E7e;
        $m7 = $M7e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;

        //forcast7
        $ft7 = $ft7f;
        $e7 = $E7f;
        $m7 = $M7f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;

        //forcast7
        $ft7 = $ft7g;
        $e7 = $E7g;
        $m7 = $M7g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;

        //forcast7
        $ft7 = $ft7h;
        $e7 = $E7h;
        $m7 = $M7h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;

        //forcast7
        $ft7 = $ft7i;
        $e7 = $E7i;
        $m7 = $M7i;
    }

    //mencari forcasting bulan ke 8
} else if ($n == "8") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6
    $a7 = $ak7; //nilai aktual 7
    $a8 = $ak8; //nilai aktual 8

    //forcast 2,3,4,5,6,7,8  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);

    $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
    $E7a = $a7 - $ft7a;
    $M7a = abs($E7a);

    $ft8a = $ft7a + $alpa1 * ($a7 - $ft7a); // 8
    $E8a = $a8 - $ft8a;
    $M8a = abs($E8a);


    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
    $E7b = $a7 - $ft7b;
    $M7b = abs($E7b);

    $ft8b = $ft7b + $alpa2 * ($a7 - $ft7b); // 8
    $E8b = $a8 - $ft8b;
    $M8b = abs($E8b);

    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
    $E7c = $a7 - $ft7c;
    $M7c = abs($E7c);

    $ft8c = $ft7c + $alpa3 * ($a7 - $ft7c); // 8
    $E8c = $a8 - $ft8c;
    $M8c = abs($E8c);

    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
    $E7d = $a7 - $ft7d;
    $M7d = abs($E7d);

    $ft8d = $ft7d + $alpa4 * ($a7 - $ft7d); // 8
    $E8d = $a8 - $ft8d;
    $M8d = abs($E8d);

    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
    $E7e = $a7 - $ft7e;
    $M7e = abs($E7e);

    $ft8e = $ft7e + $alpa5 * ($a7 - $ft7e); // 8
    $E8e = $a8 - $ft8e;
    $M8e = abs($E8e);

    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
    $E7f = $a7 - $ft7f;
    $M7f = abs($E7f);

    $ft8f = $ft7f + $alpa6 * ($a7 - $ft7f); // 8
    $E8f = $a8 - $ft8f;
    $M8f = abs($E8f);

    //forcast 2,3,4,5,6,7,8 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
    $E7g = $a7 - $ft7g;
    $M7g = abs($E7g);

    $ft8g = $ft7g + $alpa7 * ($a7 - $ft7g); // 8
    $E8g = $a8 - $ft8g;
    $M8g = abs($E8g);

    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
    $E7h = $a7 - $ft7h;
    $M7h = abs($E7h);

    $ft8h = $ft7h + $alpa8 * ($a7 - $ft7h); // 8
    $E8h = $a8 - $ft8h;
    $M8h = abs($E8h);

    //forcast 2,3,4,5,6,7,8 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
    $E7i = $a7 - $ft7i;
    $M7i = abs($E7i);

    $ft8i = $ft7i + $alpa9 * ($a7 - $ft7i); // 8
    $E8i = $a8 - $ft8i;
    $M8i = abs($E8i);

    //cari forcast 8 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a) / 7;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b) / 7;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c) / 7;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d) / 7;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e) / 7;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f) / 7;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g) / 7;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h) / 7;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i) / 7;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;

        //forcast7
        $ft7 = $ft7a;
        $e7 = $E7a;
        $m7 = $M7a;

        //forcast8
        $ft8 = $ft8a;
        $e8 = $E8a;
        $m8 = $M8a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;

        //forcast7
        $ft7 = $ft7b;
        $e7 = $E7b;
        $m7 = $M7b;

        //forcast8
        $ft8 = $ft8b;
        $e8 = $E8b;
        $m8 = $M8b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;

        //forcast7
        $ft7 = $ft7c;
        $e7 = $E7c;
        $m7 = $M7c;

        //forcast8
        $ft8 = $ft8c;
        $e8 = $E8c;
        $m8 = $M8c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;

        //forcast7
        $ft7 = $ft7d;
        $e7 = $E7d;
        $m7 = $M7d;

        //forcast8
        $ft8 = $ft8d;
        $e8 = $E8d;
        $m8 = $M8d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;

        //forcast7
        $ft7 = $ft7e;
        $e7 = $E7e;
        $m7 = $M7e;

        //forcast8
        $ft8 = $ft8e;
        $e8 = $E8e;
        $m8 = $M8e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;

        //forcast7
        $ft7 = $ft7f;
        $e7 = $E7f;
        $m7 = $M7f;

        //forcast8
        $ft8 = $ft8f;
        $e8 = $E8f;
        $m8 = $M8f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;

        //forcast7
        $ft7 = $ft7g;
        $e7 = $E7g;
        $m7 = $M7g;

        //forcast8
        $ft8 = $ft8g;
        $e8 = $E8g;
        $m8 = $M8g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;

        //forcast7
        $ft7 = $ft7h;
        $e7 = $E7h;
        $m7 = $M7h;

        //forcast8
        $ft8 = $ft8h;
        $e8 = $E8h;
        $m8 = $M8h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;

        //forcast7
        $ft7 = $ft7i;
        $e7 = $E7i;
        $m7 = $M7i;

        //forcast8
        $ft8 = $ft8i;
        $e8 = $E8i;
        $m8 = $M8i;
    }

    //mencari forcasting bulan ke 9
} else if ($n == "9") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6
    $a7 = $ak7; //nilai aktual 7
    $a8 = $ak8; //nilai aktual 8
    $a9 = $ak9; //nilai aktual 9
	$a10 = $ak10;

    //forcast 2,3,4,5,6,7,8,9  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);

    $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
    $E7a = $a7 - $ft7a;
    $M7a = abs($E7a);

    $ft8a = $ft7a + $alpa1 * ($a7 - $ft7a); // 8
    $E8a = $a8 - $ft8a;
    $M8a = abs($E8a);

    $ft9a = $ft8a + $alpa1 * ($a8 - $ft8a); // 9
    $E9a = $a9 - $ft9a;
    $M9a = abs($E9a);

	$ft10a = $ft9a + $alpa1 * ($a9 - $ft9a); // 9
    $E10a = $a10 - $ft10a;
    $M10a = abs($E10a);


    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
    $E7b = $a7 - $ft7b;
    $M7b = abs($E7b);

    $ft8b = $ft7b + $alpa2 * ($a7 - $ft7b); // 8
    $E8b = $a8 - $ft8b;
    $M8b = abs($E8b);

    $ft9b = $ft8b + $alpa2 * ($a8 - $ft8b); // 9
    $E9b = $a9 - $ft9b;
    $M9b = abs($E9b);

	$ft10b = $ft9b + $alpa2 * ($a9 - $ft9b); // 9
    $E10b = $a10 - $ft10b;
    $M10b = abs($E10b);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
    $E7c = $a7 - $ft7c;
    $M7c = abs($E7c);

    $ft8c = $ft7c + $alpa3 * ($a7 - $ft7c); // 8
    $E8c = $a8 - $ft8c;
    $M8c = abs($E8c);

    $ft9c = $ft8c + $alpa3 * ($a8 - $ft8c); // 9
    $E9c = $a9 - $ft9c;
    $M9c = abs($E9c);

	$ft10c = $ft9c + $alpa3 * ($a9 - $ft9c); // 9
    $E10c = $a10 - $ft10c;
    $M10c = abs($E10c);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
    $E7d = $a7 - $ft7d;
    $M7d = abs($E7d);

    $ft8d = $ft7d + $alpa4 * ($a7 - $ft7d); // 8
    $E8d = $a8 - $ft8d;
    $M8d = abs($E8d);

    $ft9d = $ft8d + $alpa4 * ($a8 - $ft8d); // 9
    $E9d = $a9 - $ft9d;
    $M9d = abs($E9d);

	$ft10d = $ft9d + $alpa4 * ($a9 - $ft9d); // 10
    $E10d = $a10 - $ft10d;
    $M10d = abs($E10d);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
    $E7e = $a7 - $ft7e;
    $M7e = abs($E7e);

    $ft8e = $ft7e + $alpa5 * ($a7 - $ft7e); // 8
    $E8e = $a8 - $ft8e;
    $M8e = abs($E8e);

    $ft9e = $ft8e + $alpa5 * ($a8 - $ft8e); // 9
    $E9e = $a9 - $ft9e;
    $M9e = abs($E9e);

	$ft10e = $ft9e + $alpa5 * ($a9 - $ft9e); // 10
    $E10e = $a10 - $ft10e;
    $M10e = abs($E10e);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
    $E7f = $a7 - $ft7f;
    $M7f = abs($E7f);

    $ft8f = $ft7f + $alpa6 * ($a7 - $ft7f); // 8
    $E8f = $a8 - $ft8f;
    $M8f = abs($E8f);

    $ft9f = $ft8f + $alpa6 * ($a8 - $ft8f); // 9
    $E9f = $a9 - $ft9f;
    $M9f = abs($E9f);

	$ft10f = $ft9f + $alpa6 * ($a9 - $ft9f); // 10
    $E10f = $a10 - $ft10f;
    $M10f = abs($E10f);

    //forcast 2,3,4,5,6,7,8,9 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
    $E7g = $a7 - $ft7g;
    $M7g = abs($E7g);

    $ft8g = $ft7g + $alpa7 * ($a7 - $ft7g); // 8
    $E8g = $a8 - $ft8g;
    $M8g = abs($E8g);

    $ft9g = $ft8g + $alpa7 * ($a8 - $ft8g); // 9
    $E9g = $a9 - $ft9g;
    $M9g = abs($E9g);

	$ft10g = $ft9g + $alpa7 * ($a9 - $ft9g); // 10
    $E10g = $a10 - $ft10g;
    $M10g = abs($E10g);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
    $E7h = $a7 - $ft7h;
    $M7h = abs($E7h);

    $ft8h = $ft7h + $alpa8 * ($a7 - $ft7h); // 8
    $E8h = $a8 - $ft8h;
    $M8h = abs($E8h);

    $ft9h = $ft8h + $alpa8 * ($a8 - $ft8h); // 9
    $E9h = $a9 - $ft9h;
    $M9h = abs($E9h);

	$ft10h = $ft9h + $alpa8 * ($a9 - $ft9h); // 10
    $E10h = $a10 - $ft10h;
    $M10h = abs($E10h);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
    $E7i = $a7 - $ft7i;
    $M7i = abs($E7i);

    $ft8i = $ft7i + $alpa9 * ($a7 - $ft7i); // 8
    $E8i = $a8 - $ft8i;
    $M8i = abs($E8i);

    $ft9i = $ft8i + $alpa9 * ($a8 - $ft8i); // 9
    $E9i = $a9 - $ft9i;
    $M9i = abs($E9i);
	$ft10i = $ft9i + $alpa9 * ($a9 - $ft9i); // 10
    $E10i = $a10 - $ft10i;
    $M10i = abs($E10i);

    //cari forcast 9 dengan EROR terkecil
    // $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a + $M8a) / 8;
    // $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b + $M8b) / 8;
    // $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c + $M8c) / 8;
    // $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d + $M8d) / 8;
    // $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e + $M8e) / 8;
    // $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f + $M8f) / 8;
    // $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g + $M8g) / 8;
    // $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h + $M8h) / 8;
    // $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i + $M8i) / 8;

	$MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a + $M8a + $M9a) / 9;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b + $M8b + $M9b) / 9;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c + $M8c + $M9c) / 9;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d + $M8d + $M9d) / 9;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e + $M8e + $M9e) / 9;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f + $M8f + $M9f) / 9;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g + $M8g + $M9g) / 9;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h + $M8h + $M9h) / 9;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i + $M8i + $M9i) / 9;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;

        //forcast7
        $ft7 = $ft7a;
        $e7 = $E7a;
        $m7 = $M7a;

        //forcast8
        $ft8 = $ft8a;
        $e8 = $E8a;
        $m8 = $M8a;

        //forcast9
        $ft9 = $ft9a;
        $e9 = $E9a;
        $m9 = $M9a;

		$ft10 = $ft10a;
        $e10 = $E10a;
        $m10 = $M10a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;

        //forcast7
        $ft7 = $ft7b;
        $e7 = $E7b;
        $m7 = $M7b;

        //forcast8
        $ft8 = $ft8b;
        $e8 = $E8b;
        $m8 = $M8b;

        //forcast9
        $ft9 = $ft9b;
        $e9 = $E9b;
        $m9 = $M9b;

		$ft10 = $ft10b;
        $e10 = $E10b;
        $m10 = $M10b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;

        //forcast7
        $ft7 = $ft7c;
        $e7 = $E7c;
        $m7 = $M7c;

        //forcast8
        $ft8 = $ft8c;
        $e8 = $E8c;
        $m8 = $M8c;

        //forcast9
        $ft9 = $ft9c;
        $e9 = $E9c;
        $m9 = $M9c;

		$ft10 = $ft10c;
        $e10 = $E10c;
        $m10 = $M10c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;

        //forcast7
        $ft7 = $ft7d;
        $e7 = $E7d;
        $m7 = $M7d;

        //forcast8
        $ft8 = $ft8d;
        $e8 = $E8d;
        $m8 = $M8d;

        //forcast9
        $ft9 = $ft9d;
        $e9 = $E9d;
        $m9 = $M9d;

		$ft10 = $ft10d;
        $e10 = $E10d;
        $m10 = $M10d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;

        //forcast7
        $ft7 = $ft7e;
        $e7 = $E7e;
        $m7 = $M7e;

        //forcast8
        $ft8 = $ft8e;
        $e8 = $E8e;
        $m8 = $M8e;

        //forcast9
        $ft9 = $ft9e;
        $e9 = $E9e;
        $m9 = $M9e;

		$ft10 = $ft10e;
        $e10 = $E10e;
        $m10 = $M10e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;

        //forcast7
        $ft7 = $ft7f;
        $e7 = $E7f;
        $m7 = $M7f;

        //forcast8
        $ft8 = $ft8f;
        $e8 = $E8f;
        $m8 = $M8f;

        //forcast9
        $ft9 = $ft9f;
        $e9 = $E9f;
        $m9 = $M9f;

		$ft10 = $ft10f;
        $e10 = $E10f;
        $m10 = $M10f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;

        //forcast7
        $ft7 = $ft7g;
        $e7 = $E7g;
        $m7 = $M7g;

        //forcast8
        $ft8 = $ft8g;
        $e8 = $E8g;
        $m8 = $M8g;

        //forcast9
        $ft9 = $ft9g;
        $e9 = $E9g;
        $m9 = $M9g;

		$ft10 = $ft10g;
        $e10 = $E10g;
        $m10 = $M10g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;

        //forcast7
        $ft7 = $ft7h;
        $e7 = $E7h;
        $m7 = $M7h;

        //forcast8
        $ft8 = $ft8h;
        $e8 = $E8h;
        $m8 = $M8h;

        //forcast9
        $ft9 = $ft9h;
        $e9 = $E9h;
        $m9 = $M9h;

		$ft10 = $ft10h;
        $e10 = $E10h;
        $m10 = $M10h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;

        //forcast7
        $ft7 = $ft7i;
        $e7 = $E7i;
        $m7 = $M7i;

        //forcast8
        $ft8 = $ft8i;
        $e8 = $E8i;
        $m8 = $M8i;

        //forcast9
        $ft9 = $ft9i;
        $e9 = $E9i;
        $m9 = $M9i;

		$ft10 = $ft10i;
        $e10 = $E10i;
        $m10 = $M10i;
    }

    //mencari forcasting bulan ke 10
} else if ($n == "10") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6
    $a7 = $ak7; //nilai aktual 7
    $a8 = $ak8; //nilai aktual 8
    $a9 = $ak9; //nilai aktual 9
    $a10 = $ak10; //nilai aktual 10

    //forcast 2,3,4,5,6,7,8,9,10  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);

    $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
    $E7a = $a7 - $ft7a;
    $M7a = abs($E7a);

    $ft8a = $ft7a + $alpa1 * ($a7 - $ft7a); // 8
    $E8a = $a8 - $ft8a;
    $M8a = abs($E8a);

    $ft9a = $ft8a + $alpa1 * ($a8 - $ft8a); // 9
    $E9a = $a9 - $ft9a;
    $M9a = abs($E9a);

    $ft10a = $ft9a + $alpa1 * ($a9 - $ft9a); // 10
    $E10a = $a10 - $ft10a;
    $M10a = abs($E10a);


    //forcast 2,3,4,5,6,7,8,9,10 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
    $E7b = $a7 - $ft7b;
    $M7b = abs($E7b);

    $ft8b = $ft7b + $alpa2 * ($a7 - $ft7b); // 8
    $E8b = $a8 - $ft8b;
    $M8b = abs($E8b);

    $ft9b = $ft8b + $alpa2 * ($a8 - $ft8b); // 9
    $E9b = $a9 - $ft9b;
    $M9b = abs($E9b);

    $ft10b = $ft9b + $alpa2 * ($a9 - $ft9b); // 10
    $E10b = $a10 - $ft10b;
    $M10b = abs($E10b);

    //forcast 2,3,4,5,6,7,8,9,10 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
    $E7c = $a7 - $ft7c;
    $M7c = abs($E7c);

    $ft8c = $ft7c + $alpa3 * ($a7 - $ft7c); // 8
    $E8c = $a8 - $ft8c;
    $M8c = abs($E8c);

    $ft9c = $ft8c + $alpa3 * ($a8 - $ft8c); // 9
    $E9c = $a9 - $ft9c;
    $M9c = abs($E9c);

    $ft10c = $ft9c + $alpa3 * ($a9 - $ft9c); // 10
    $E10c = $a10 - $ft10c;
    $M10c = abs($E10c);

    //forcast 2,3,4,5,6,7,8,9,10 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
    $E7d = $a7 - $ft7d;
    $M7d = abs($E7d);

    $ft8d = $ft7d + $alpa4 * ($a7 - $ft7d); // 8
    $E8d = $a8 - $ft8d;
    $M8d = abs($E8d);

    $ft9d = $ft8d + $alpa4 * ($a8 - $ft8d); // 9
    $E9d = $a9 - $ft9d;
    $M9d = abs($E9d);

    $ft10d = $ft9d + $alpa4 * ($a9 - $ft9d); // 10
    $E10d = $a10 - $ft10d;
    $M10d = abs($E10d);

    //forcast 2,3,4,5,6,7,8,9 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
    $E7e = $a7 - $ft7e;
    $M7e = abs($E7e);

    $ft8e = $ft7e + $alpa5 * ($a7 - $ft7e); // 8
    $E8e = $a8 - $ft8e;
    $M8e = abs($E8e);

    $ft9e = $ft8e + $alpa5 * ($a8 - $ft8e); // 9
    $E9e = $a9 - $ft9e;
    $M9e = abs($E9e);

    $ft10e = $ft9e + $alpa5 * ($a9 - $ft9e); // 10
    $E10e = $a10 - $ft10e;
    $M10e = abs($E10e);

    //forcast 2,3,4,5,6,7,8,9,10 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
    $E7f = $a7 - $ft7f;
    $M7f = abs($E7f);

    $ft8f = $ft7f + $alpa6 * ($a7 - $ft7f); // 8
    $E8f = $a8 - $ft8f;
    $M8f = abs($E8f);

    $ft9f = $ft8f + $alpa6 * ($a8 - $ft8f); // 9
    $E9f = $a9 - $ft9f;
    $M9f = abs($E9f);

    $ft10f = $ft9f + $alpa6 * ($a9 - $ft9f); // 10
    $E10f = $a10 - $ft10f;
    $M10f = abs($E10f);

    //forcast 2,3,4,5,6,7,8,9,10 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
    $E7g = $a7 - $ft7g;
    $M7g = abs($E7g);

    $ft8g = $ft7g + $alpa7 * ($a7 - $ft7g); // 8
    $E8g = $a8 - $ft8g;
    $M8g = abs($E8g);

    $ft9g = $ft8g + $alpa7 * ($a8 - $ft8g); // 9
    $E9g = $a9 - $ft9g;
    $M9g = abs($E9g);

    $ft10g = $ft9g + $alpa7 * ($a9 - $ft9g); // 10
    $E10g = $a10 - $ft10g;
    $M10g = abs($E10g);

    //forcast 2,3,4,5,6,7,8,9,10 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
    $E7h = $a7 - $ft7h;
    $M7h = abs($E7h);

    $ft8h = $ft7h + $alpa8 * ($a7 - $ft7h); // 8
    $E8h = $a8 - $ft8h;
    $M8h = abs($E8h);

    $ft9h = $ft8h + $alpa8 * ($a8 - $ft8h); // 9
    $E9h = $a9 - $ft9h;
    $M9h = abs($E9h);

    $ft10h = $ft9h + $alpa8 * ($a9 - $ft9h); // 10
    $E10h = $a10 - $ft10h;
    $M10h = abs($E10h);

    //forcast 2,3,4,5,6,7,8,9,10 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
    $E7i = $a7 - $ft7i;
    $M7i = abs($E7i);

    $ft8i = $ft7i + $alpa9 * ($a7 - $ft7i); // 8
    $E8i = $a8 - $ft8i;
    $M8i = abs($E8i);

    $ft9i = $ft8i + $alpa9 * ($a8 - $ft8i); // 9
    $E9i = $a9 - $ft9i;
    $M9i = abs($E9i);

    $ft10i = $ft9i + $alpa9 * ($a9 - $ft9i); // 10
    $E10i = $a10 - $ft10i;
    $M10i = abs($E10i);

    //cari forcast 10 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a + $M8a) / 8;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b + $M8b) / 8;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c + $M8c) / 8;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d + $M8d) / 8;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e + $M8e) / 8;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f + $M8f) / 8;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g + $M8g) / 8;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h + $M8h) / 8;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i + $M8i) / 8;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {
        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;

        //forcast7
        $ft7 = $ft7a;
        $e7 = $E7a;
        $m7 = $M7a;

        //forcast8
        $ft8 = $ft8a;
        $e8 = $E8a;
        $m8 = $M8a;

        //forcast9
        $ft9 = $ft9a;
        $e9 = $E9a;
        $m9 = $M9a;

        //forcast10
        $ft10 = $ft10a;
        $e10 = $E10a;
        $m10 = $M10a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;

        //forcast7
        $ft7 = $ft7b;
        $e7 = $E7b;
        $m7 = $M7b;

        //forcast8
        $ft8 = $ft8b;
        $e8 = $E8b;
        $m8 = $M8b;

        //forcast9
        $ft9 = $ft9b;
        $e9 = $E9b;
        $m9 = $M9b;

        //forcast10
        $ft10 = $ft10b;
        $e10 = $E10b;
        $m10 = $M10b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;

        //forcast7
        $ft7 = $ft7c;
        $e7 = $E7c;
        $m7 = $M7c;

        //forcast8
        $ft8 = $ft8c;
        $e8 = $E8c;
        $m8 = $M8c;

        //forcast9
        $ft9 = $ft9c;
        $e9 = $E9c;
        $m9 = $M9c;

        //forcast10
        $ft10 = $ft10c;
        $e10 = $E10c;
        $m10 = $M10c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;

        //forcast7
        $ft7 = $ft7d;
        $e7 = $E7d;
        $m7 = $M7d;

        //forcast8
        $ft8 = $ft8d;
        $e8 = $E8d;
        $m8 = $M8d;

        //forcast9
        $ft9 = $ft9d;
        $e9 = $E9d;
        $m9 = $M9d;

        //forcast10
        $ft10 = $ft10d;
        $e10 = $E10d;
        $m10 = $M10d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;

        //forcast7
        $ft7 = $ft7e;
        $e7 = $E7e;
        $m7 = $M7e;

        //forcast8
        $ft8 = $ft8e;
        $e8 = $E8e;
        $m8 = $M8e;

        //forcast9
        $ft9 = $ft9e;
        $e9 = $E9e;
        $m9 = $M9e;

        //forcast10
        $ft10 = $ft10e;
        $e10 = $E10e;
        $m10 = $M10e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;

        //forcast7
        $ft7 = $ft7f;
        $e7 = $E7f;
        $m7 = $M7f;

        //forcast8
        $ft8 = $ft8f;
        $e8 = $E8f;
        $m8 = $M8f;

        //forcast9
        $ft9 = $ft9f;
        $e9 = $E9f;
        $m9 = $M9f;

        //forcast10
        $ft10 = $ft10f;
        $e10 = $E10f;
        $m10 = $M10f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;

        //forcast7
        $ft7 = $ft7g;
        $e7 = $E7g;
        $m7 = $M7g;

        //forcast8
        $ft8 = $ft8g;
        $e8 = $E8g;
        $m8 = $M8g;

        //forcast9
        $ft9 = $ft9g;
        $e9 = $E9g;
        $m9 = $M9g;

        //forcast10
        $ft10 = $ft10g;
        $e10 = $E10g;
        $m10 = $M10g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;

        //forcast7
        $ft7 = $ft7h;
        $e7 = $E7h;
        $m7 = $M7h;

        //forcast8
        $ft8 = $ft8h;
        $e8 = $E8h;
        $m8 = $M8h;

        //forcast9
        $ft9 = $ft9h;
        $e9 = $E9h;
        $m9 = $M9h;

        //forcast10
        $ft10 = $ft10h;
        $e10 = $E10h;
        $m10 = $M10h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;

        //forcast7
        $ft7 = $ft7i;
        $e7 = $E7i;
        $m7 = $M7i;

        //forcast8
        $ft8 = $ft8i;
        $e8 = $E8i;
        $m8 = $M8i;

        //forcast9
        $ft9 = $ft9i;
        $e9 = $E9i;
        $m9 = $M9i;

        //forcast10
        $ft10 = $ft10i;
        $e10 = $E10i;
        $m10 = $M10i;
    }

    //mencari forcasting bulan ke 11
} else if ($n == "11") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6
    $a7 = $ak7; //nilai aktual 7
    $a8 = $ak8; //nilai aktual 8
    $a9 = $ak9; //nilai aktual 9
    $a10 = $ak10; //nilai aktual 10
    $a11 = $ak11; //nilai aktual 11

    //forcast 2,3,4,5,6,7,8,9,10,11  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);

    $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
    $E7a = $a7 - $ft7a;
    $M7a = abs($E7a);

    $ft8a = $ft7a + $alpa1 * ($a7 - $ft7a); // 8
    $E8a = $a8 - $ft8a;
    $M8a = abs($E8a);

    $ft9a = $ft8a + $alpa1 * ($a8 - $ft8a); // 9
    $E9a = $a9 - $ft9a;
    $M9a = abs($E9a);

    $ft10a = $ft9a + $alpa1 * ($a9 - $ft9a); // 10
    $E10a = $a10 - $ft10a;
    $M10a = abs($E10a);

    $ft11a = $ft10a + $alpa1 * ($a10 - $ft10a); // 11
    $E11a = $a11 - $ft11a;
    $M11a = abs($E11a);


    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
    $E7b = $a7 - $ft7b;
    $M7b = abs($E7b);

    $ft8b = $ft7b + $alpa2 * ($a7 - $ft7b); // 8
    $E8b = $a8 - $ft8b;
    $M8b = abs($E8b);

    $ft9b = $ft8b + $alpa2 * ($a8 - $ft8b); // 9
    $E9b = $a9 - $ft9b;
    $M9b = abs($E9b);

    $ft10b = $ft9b + $alpa2 * ($a9 - $ft9b); // 10
    $E10b = $a10 - $ft10b;
    $M10b = abs($E10b);

    $ft11b = $ft10b + $alpa2 * ($a10 - $ft10b); // 11
    $E11b = $a11 - $ft11b;
    $M11b = abs($E11b);

    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
    $E7c = $a7 - $ft7c;
    $M7c = abs($E7c);

    $ft8c = $ft7c + $alpa3 * ($a7 - $ft7c); // 8
    $E8c = $a8 - $ft8c;
    $M8c = abs($E8c);

    $ft9c = $ft8c + $alpa3 * ($a8 - $ft8c); // 9
    $E9c = $a9 - $ft9c;
    $M9c = abs($E9c);

    $ft10c = $ft9c + $alpa3 * ($a9 - $ft9c); // 10
    $E10c = $a10 - $ft10c;
    $M10c = abs($E10c);

    $ft11c = $ft10c + $alpa3 * ($a10 - $ft10c); // 11
    $E11c = $a11 - $ft11c;
    $M11c = abs($E11c);

    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
    $E7d = $a7 - $ft7d;
    $M7d = abs($E7d);

    $ft8d = $ft7d + $alpa4 * ($a7 - $ft7d); // 8
    $E8d = $a8 - $ft8d;
    $M8d = abs($E8d);

    $ft9d = $ft8d + $alpa4 * ($a8 - $ft8d); // 9
    $E9d = $a9 - $ft9d;
    $M9d = abs($E9d);

    $ft10d = $ft9d + $alpa4 * ($a9 - $ft9d); // 10
    $E10d = $a10 - $ft10d;
    $M10d = abs($E10d);

    $ft11d = $ft10d + $alpa4 * ($a10 - $ft10d); // 11
    $E11d = $a11 - $ft11d;
    $M11d = abs($E11d);

    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
    $E7e = $a7 - $ft7e;
    $M7e = abs($E7e);

    $ft8e = $ft7e + $alpa5 * ($a7 - $ft7e); // 8
    $E8e = $a8 - $ft8e;
    $M8e = abs($E8e);

    $ft9e = $ft8e + $alpa5 * ($a8 - $ft8e); // 9
    $E9e = $a9 - $ft9e;
    $M9e = abs($E9e);

    $ft10e = $ft9e + $alpa5 * ($a9 - $ft9e); // 10
    $E10e = $a10 - $ft10e;
    $M10e = abs($E10e);

    $ft11e = $ft10e + $alpa5 * ($a10 - $ft10e); // 11
    $E11e = $a11 - $ft11e;
    $M11e = abs($E11e);


    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
    $E7f = $a7 - $ft7f;
    $M7f = abs($E7f);

    $ft8f = $ft7f + $alpa6 * ($a7 - $ft7f); // 8
    $E8f = $a8 - $ft8f;
    $M8f = abs($E8f);

    $ft9f = $ft8f + $alpa6 * ($a8 - $ft8f); // 9
    $E9f = $a9 - $ft9f;
    $M9f = abs($E9f);

    $ft10f = $ft9f + $alpa6 * ($a9 - $ft9f); // 10
    $E10f = $a10 - $ft10f;
    $M10f = abs($E10f);

    $ft11f = $ft10f + $alpa6 * ($a10 - $ft10f); // 11
    $E11f = $a11 - $ft11f;
    $M11f = abs($E11f);


    //forcast 2,3,4,5,6,7,8,9,10,11 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
    $E7g = $a7 - $ft7g;
    $M7g = abs($E7g);

    $ft8g = $ft7g + $alpa7 * ($a7 - $ft7g); // 8
    $E8g = $a8 - $ft8g;
    $M8g = abs($E8g);

    $ft9g = $ft8g + $alpa7 * ($a8 - $ft8g); // 9
    $E9g = $a9 - $ft9g;
    $M9g = abs($E9g);

    $ft10g = $ft9g + $alpa7 * ($a9 - $ft9g); // 10
    $E10g = $a10 - $ft10g;
    $M10g = abs($E10g);

    $ft11g = $ft10g + $alpa7 * ($a10 - $ft10g); // 11
    $E11g = $a11 - $ft11g;
    $M11g = abs($E11g);


    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
    $E7h = $a7 - $ft7h;
    $M7h = abs($E7h);

    $ft8h = $ft7h + $alpa8 * ($a7 - $ft7h); // 8
    $E8h = $a8 - $ft8h;
    $M8h = abs($E8h);

    $ft9h = $ft8h + $alpa8 * ($a8 - $ft8h); // 9
    $E9h = $a9 - $ft9h;
    $M9h = abs($E9h);

    $ft10h = $ft9h + $alpa8 * ($a9 - $ft9h); // 10
    $E10h = $a10 - $ft10h;
    $M10h = abs($E10h);

    $ft11h = $ft10h + $alpa8 * ($a10 - $ft10h); // 11
    $E11h = $a11 - $ft11h;
    $M11h = abs($E11h);

    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
    $E7i = $a7 - $ft7i;
    $M7i = abs($E7i);

    $ft8i = $ft7i + $alpa9 * ($a7 - $ft7i); // 8
    $E8i = $a8 - $ft8i;
    $M8i = abs($E8i);

    $ft9i = $ft8i + $alpa9 * ($a8 - $ft8i); // 9
    $E9i = $a9 - $ft9i;
    $M9i = abs($E9i);

    $ft10i = $ft9i + $alpa9 * ($a9 - $ft9i); // 10
    $E10i = $a10 - $ft10i;
    $M10i = abs($E10i);

    $ft11i = $ft10i + $alpa9 * ($a10 - $ft10i); // 11
    $E11i = $a11 - $ft11i;
    $M11i = abs($E11i);

    //cari forcast 11 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a + $M8a + $M9a + $M10a) / 10;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b + $M8b + $M9b + $M10b) / 10;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c + $M8c + $M9c + $M10c) / 10;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d + $M8d + $M9d + $M10d) / 10;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e + $M8e + $M9e + $M10e) / 10;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f + $M8f + $M9f + $M10f) / 10;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g + $M8g + $M9g + $M10g) / 10;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h + $M8h + $M9h + $M10h) / 10;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i + $M8i + $M9i + $M10i) / 10;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {

        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;

        //forcast7
        $ft7 = $ft7a;
        $e7 = $E7a;
        $m7 = $M7a;

        //forcast8
        $ft8 = $ft8a;
        $e8 = $E8a;
        $m8 = $M8a;

        //forcast9
        $ft9 = $ft9a;
        $e9 = $E9a;
        $m9 = $M9a;

        //forcast10
        $ft10 = $ft10a;
        $e10 = $E10a;
        $m10 = $M10a;

        //forcast11
        $ft11 = $ft11a;
        $e11 = $E11a;
        $m11 = $M11a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;

        //forcast7
        $ft7 = $ft7b;
        $e7 = $E7b;
        $m7 = $M7b;

        //forcast8
        $ft8 = $ft8b;
        $e8 = $E8b;
        $m8 = $M8b;

        //forcast9
        $ft9 = $ft9b;
        $e9 = $E9b;
        $m9 = $M9b;

        //forcast10
        $ft10 = $ft10b;
        $e10 = $E10b;
        $m10 = $M10b;

        //forcast11
        $ft11 = $ft11b;
        $e11 = $E11b;
        $m11 = $M11b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;

        //forcast7
        $ft7 = $ft7c;
        $e7 = $E7c;
        $m7 = $M7c;

        //forcast8
        $ft8 = $ft8c;
        $e8 = $E8c;
        $m8 = $M8c;

        //forcast9
        $ft9 = $ft9c;
        $e9 = $E9c;
        $m9 = $M9c;

        //forcast10
        $ft10 = $ft10c;
        $e10 = $E10c;
        $m10 = $M10c;

        //forcast11
        $ft11 = $ft11c;
        $e11 = $E11c;
        $m11 = $M11c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;

        //forcast7
        $ft7 = $ft7d;
        $e7 = $E7d;
        $m7 = $M7d;

        //forcast8
        $ft8 = $ft8d;
        $e8 = $E8d;
        $m8 = $M8d;

        //forcast9
        $ft9 = $ft9d;
        $e9 = $E9d;
        $m9 = $M9d;

        //forcast10
        $ft10 = $ft10d;
        $e10 = $E10d;
        $m10 = $M10d;

        //forcast11
        $ft11 = $ft11d;
        $e11 = $E11d;
        $m11 = $M11d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;

        //forcast7
        $ft7 = $ft7e;
        $e7 = $E7e;
        $m7 = $M7e;

        //forcast8
        $ft8 = $ft8e;
        $e8 = $E8e;
        $m8 = $M8e;

        //forcast9
        $ft9 = $ft9e;
        $e9 = $E9e;
        $m9 = $M9e;

        //forcast10
        $ft10 = $ft10e;
        $e10 = $E10e;
        $m10 = $M10e;

        //forcast11
        $ft11 = $ft11e;
        $e11 = $E11e;
        $m11 = $M11e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;

        //forcast7
        $ft7 = $ft7f;
        $e7 = $E7f;
        $m7 = $M7f;

        //forcast8
        $ft8 = $ft8f;
        $e8 = $E8f;
        $m8 = $M8f;

        //forcast9
        $ft9 = $ft9f;
        $e9 = $E9f;
        $m9 = $M9f;

        //forcast10
        $ft10 = $ft10f;
        $e10 = $E10f;
        $m10 = $M10f;

        //forcast11
        $ft11 = $ft11f;
        $e11 = $E11f;
        $m11 = $M11f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;

        //forcast7
        $ft7 = $ft7g;
        $e7 = $E7g;
        $m7 = $M7g;

        //forcast8
        $ft8 = $ft8g;
        $e8 = $E8g;
        $m8 = $M8g;

        //forcast9
        $ft9 = $ft9g;
        $e9 = $E9g;
        $m9 = $M9g;

        //forcast10
        $ft10 = $ft10g;
        $e10 = $E10g;
        $m10 = $M10g;

        //forcast11
        $ft11 = $ft11g;
        $e11 = $E11g;
        $m11 = $M11g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;

        //forcast7
        $ft7 = $ft7h;
        $e7 = $E7h;
        $m7 = $M7h;

        //forcast8
        $ft8 = $ft8h;
        $e8 = $E8h;
        $m8 = $M8h;

        //forcast9
        $ft9 = $ft9h;
        $e9 = $E9h;
        $m9 = $M9h;

        //forcast10
        $ft10 = $ft10h;
        $e10 = $E10h;
        $m10 = $M10h;

        //forcast11
        $ft11 = $ft11h;
        $e11 = $E11h;
        $m11 = $M11h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;

        //forcast7
        $ft7 = $ft7i;
        $e7 = $E7i;
        $m7 = $M7i;

        //forcast8
        $ft8 = $ft8i;
        $e8 = $E8i;
        $m8 = $M8i;

        //forcast9
        $ft9 = $ft9i;
        $e9 = $E9i;
        $m9 = $M9i;

        //forcast10
        $ft10 = $ft10i;
        $e10 = $E10i;
        $m10 = $M10i;

        //forcast11
        $ft11 = $ft11i;
        $e11 = $E11i;
        $m11 = $M11i;
    }

    //mencari forcasting bulan ke 12
} else if ($n == "12") {

    //forcast 1
    if ($nextyear == false) {
        //forcast 1
        $a1 = $ak1; //nilai aktual 1
        $ft1 = $a1;
        $E1 = 0;
        $M1 = abs($E1);
    } else {
        $a1 = $ak1; //nilai aktual 1
        $th = $this->session->userdata('tahun') - 1;
        $qr = $this->db->query("SELECT forcasting FROM peramalan WHERE kode='$kode' AND bulan='Desember' AND tahun='2021'");
        $fc1 = $qr->row()->forcasting;
        $ft1 = $fc1;
        $E1 = $a1 - $ft1;
        $M1 = abs($E1);
    }

    $a2 = $ak2; //nilai aktual 2
    $a3 = $ak3; //nilai aktual 3
    $a4 = $ak4; //nilai aktual 4
    $a5 = $ak5; //nilai aktual 5
    $a6 = $ak6; //nilai aktual 6
    $a7 = $ak7; //nilai aktual 7
    $a8 = $ak8; //nilai aktual 8
    $a9 = $ak9; //nilai aktual 9
    $a10 = $ak10; //nilai aktual 10
    $a11 = $ak11; //nilai aktual 11
    $a12 = $ak12; //nilai aktual 11

    //forcast 2,3,4,5,6,7,8,9,10,11,12  =====================================> Alpha 0.1

    $ft2a = $ft1 + $alpa1 * ($a1 - $ft1); // 2
    $E2a = $a2 - $ft2a;
    $M2a = abs($E2a);

    $ft3a = $ft2a + $alpa1 * ($a2 - $ft2a); // 3
    $E3a = $a3 - $ft3a;
    $M3a = abs($E3a);

    $ft4a = $ft3a + $alpa1 * ($a3 - $ft3a); // 4
    $E4a = $a4 - $ft4a;
    $M4a = abs($E4a);

    $ft5a = $ft4a + $alpa1 * ($a4 - $ft4a); // 5
    $E5a = $a5 - $ft5a;
    $M5a = abs($E5a);

    $ft6a = $ft5a + $alpa1 * ($a5 - $ft5a); // 6
    $E6a = $a6 - $ft6a;
    $M6a = abs($E6a);

    $ft7a = $ft6a + $alpa1 * ($a6 - $ft6a); // 7
    $E7a = $a7 - $ft7a;
    $M7a = abs($E7a);

    $ft8a = $ft7a + $alpa1 * ($a7 - $ft7a); // 8
    $E8a = $a8 - $ft8a;
    $M8a = abs($E8a);

    $ft9a = $ft8a + $alpa1 * ($a8 - $ft8a); // 9
    $E9a = $a9 - $ft9a;
    $M9a = abs($E9a);

    $ft10a = $ft9a + $alpa1 * ($a9 - $ft9a); // 10
    $E10a = $a10 - $ft10a;
    $M10a = abs($E10a);

    $ft11a = $ft10a + $alpa1 * ($a10 - $ft10a); // 11
    $E11a = $a11 - $ft11a;
    $M11a = abs($E11a);

    $ft12a = $ft11a + $alpa1 * ($a11 - $ft11a); // 12
    $E12a = $a12 - $ft12a;
    $M12a = abs($E12a);



    //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.2

    $ft2b = $ft1 + $alpa2 * ($a1 - $ft1); // 2
    $E2b = $a2 - $ft2b;
    $M2b = abs($E2b);

    $ft3b = $ft2b + $alpa2 * ($a2 - $ft2b); // 3
    $E3b = $a3 - $ft3b;
    $M3b = abs($E3b);

    $ft4b = $ft3b + $alpa2 * ($a3 - $ft3b); // 4
    $E4b = $a4 - $ft4b;
    $M4b = abs($E4b);

    $ft5b = $ft4b + $alpa2 * ($a4 - $ft4b); // 5
    $E5b = $a5 - $ft5b;
    $M5b = abs($E5b);

    $ft6b = $ft5b + $alpa2 * ($a5 - $ft5b); // 6
    $E6b = $a6 - $ft6b;
    $M6b = abs($E6b);

    $ft7b = $ft6b + $alpa2 * ($a6 - $ft6b); // 7
    $E7b = $a7 - $ft7b;
    $M7b = abs($E7b);

    $ft8b = $ft7b + $alpa2 * ($a7 - $ft7b); // 8
    $E8b = $a8 - $ft8b;
    $M8b = abs($E8b);

    $ft9b = $ft8b + $alpa2 * ($a8 - $ft8b); // 9
    $E9b = $a9 - $ft9b;
    $M9b = abs($E9b);

    $ft10b = $ft9b + $alpa2 * ($a9 - $ft9b); // 10
    $E10b = $a10 - $ft10b;
    $M10b = abs($E10b);

    $ft11b = $ft10b + $alpa2 * ($a10 - $ft10b); // 11
    $E11b = $a11 - $ft11b;
    $M11b = abs($E11b);

    $ft12b = $ft11b + $alpa2 * ($a11 - $ft11b); // 12
    $E12b = $a12 - $ft12b;
    $M12b = abs($E12b);

    //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.3
    $ft2c = $ft1 + $alpa3 * ($a1 - $ft1); // 2
    $E2c = $a2 - $ft2c;
    $M2c = abs($E2c);

    $ft3c = $ft2c + $alpa3 * ($a2 - $ft2c); // 3
    $E3c = $a3 - $ft3c;
    $M3c = abs($E3c);

    $ft4c = $ft3c + $alpa3 * ($a3 - $ft3c); // 4
    $E4c = $a4 - $ft4c;
    $M4c = abs($E4c);

    $ft5c = $ft4c + $alpa3 * ($a4 - $ft4c); // 5
    $E5c = $a5 - $ft5c;
    $M5c = abs($E5c);

    $ft6c = $ft5c + $alpa3 * ($a5 - $ft5c); // 6
    $E6c = $a6 - $ft6c;
    $M6c = abs($E6c);

    $ft7c = $ft6c + $alpa3 * ($a6 - $ft6c); // 7
    $E7c = $a7 - $ft7c;
    $M7c = abs($E7c);

    $ft8c = $ft7c + $alpa3 * ($a7 - $ft7c); // 8
    $E8c = $a8 - $ft8c;
    $M8c = abs($E8c);

    $ft9c = $ft8c + $alpa3 * ($a8 - $ft8c); // 9
    $E9c = $a9 - $ft9c;
    $M9c = abs($E9c);

    $ft10c = $ft9c + $alpa3 * ($a9 - $ft9c); // 10
    $E10c = $a10 - $ft10c;
    $M10c = abs($E10c);

    $ft11c = $ft10c + $alpa3 * ($a10 - $ft10c); // 11
    $E11c = $a11 - $ft11c;
    $M11c = abs($E11c);

    $ft12c = $ft11c + $alpa3 * ($a11 - $ft11c); // 12
    $E12c = $a12 - $ft12c;
    $M12c = abs($E12c);

    //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.4
    $ft2d = $ft1 + $alpa4 * ($a1 - $ft1); // 2
    $E2d = $a2 - $ft2d;
    $M2d = abs($E2d);

    $ft3d = $ft2d + $alpa4 * ($a2 - $ft2d); // 3
    $E3d = $a3 - $ft3d;
    $M3d = abs($E3d);

    $ft4d = $ft3d + $alpa4 * ($a3 - $ft3d); // 4
    $E4d = $a4 - $ft4d;
    $M4d = abs($E4d);

    $ft5d = $ft4d + $alpa4 * ($a4 - $ft4d); // 5
    $E5d = $a5 - $ft5d;
    $M5d = abs($E5d);

    $ft6d = $ft5d + $alpa4 * ($a5 - $ft5d); // 6
    $E6d = $a6 - $ft6d;
    $M6d = abs($E6d);

    $ft7d = $ft6d + $alpa4 * ($a6 - $ft6d); // 7
    $E7d = $a7 - $ft7d;
    $M7d = abs($E7d);

    $ft8d = $ft7d + $alpa4 * ($a7 - $ft7d); // 8
    $E8d = $a8 - $ft8d;
    $M8d = abs($E8d);

    $ft9d = $ft8d + $alpa4 * ($a8 - $ft8d); // 9
    $E9d = $a9 - $ft9d;
    $M9d = abs($E9d);

    $ft10d = $ft9d + $alpa4 * ($a9 - $ft9d); // 10
    $E10d = $a10 - $ft10d;
    $M10d = abs($E10d);

    $ft11d = $ft10d + $alpa4 * ($a10 - $ft10d); // 11
    $E11d = $a11 - $ft11d;
    $M11d = abs($E11d);

    $ft12d = $ft11d + $alpa4 * ($a11 - $ft11d); // 12
    $E12d = $a12 - $ft12d;
    $M12d = abs($E12d);

    //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.5
    $ft2e = $ft1 + $alpa5 * ($a1 - $ft1); // 2
    $E2e = $a2 - $ft2e;
    $M2e = abs($E2e);

    $ft3e = $ft2e + $alpa5 * ($a2 - $ft2e); // 3
    $E3e = $a3 - $ft3e;
    $M3e = abs($E3e);

    $ft4e = $ft3e + $alpa5 * ($a3 - $ft3e); // 4
    $E4e = $a4 - $ft4e;
    $M4e = abs($E4e);

    $ft5e = $ft4e + $alpa5 * ($a4 - $ft4e); // 5
    $E5e = $a5 - $ft5e;
    $M5e = abs($E5e);

    $ft6e = $ft5e + $alpa5 * ($a5 - $ft5e); // 6
    $E6e = $a6 - $ft6e;
    $M6e = abs($E6e);

    $ft7e = $ft6e + $alpa5 * ($a6 - $ft6e); // 7
    $E7e = $a7 - $ft7e;
    $M7e = abs($E7e);

    $ft8e = $ft7e + $alpa5 * ($a7 - $ft7e); // 8
    $E8e = $a8 - $ft8e;
    $M8e = abs($E8e);

    $ft9e = $ft8e + $alpa5 * ($a8 - $ft8e); // 9
    $E9e = $a9 - $ft9e;
    $M9e = abs($E9e);

    $ft10e = $ft9e + $alpa5 * ($a9 - $ft9e); // 10
    $E10e = $a10 - $ft10e;
    $M10e = abs($E10e);

    $ft11e = $ft10e + $alpa5 * ($a10 - $ft10e); // 11
    $E11e = $a11 - $ft11e;
    $M11e = abs($E11e);

    $ft12e = $ft11e + $alpa5 * ($a11 - $ft11e); // 12
    $E12e = $a12 - $ft12e;
    $M12e = abs($E12e);


    //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.6
    $ft2f = $ft1 + $alpa6 * ($a1 - $ft1); // 2
    $E2f = $a2 - $ft2f;
    $M2f = abs($E2f);

    $ft3f = $ft2f + $alpa6 * ($a2 - $ft2f); // 3
    $E3f = $a3 - $ft3f;
    $M3f = abs($E3f);

    $ft4f = $ft3f + $alpa6 * ($a3 - $ft3f); // 4
    $E4f = $a4 - $ft4f;
    $M4f = abs($E4f);

    $ft5f = $ft4f + $alpa6 * ($a4 - $ft4f); // 5
    $E5f = $a5 - $ft5f;
    $M5f = abs($E5f);

    $ft6f = $ft5f + $alpa6 * ($a5 - $ft5f); // 6
    $E6f = $a6 - $ft6f;
    $M6f = abs($E6f);

    $ft7f = $ft6f + $alpa6 * ($a6 - $ft6f); // 7
    $E7f = $a7 - $ft7f;
    $M7f = abs($E7f);

    $ft8f = $ft7f + $alpa6 * ($a7 - $ft7f); // 8
    $E8f = $a8 - $ft8f;
    $M8f = abs($E8f);

    $ft9f = $ft8f + $alpa6 * ($a8 - $ft8f); // 9
    $E9f = $a9 - $ft9f;
    $M9f = abs($E9f);

    $ft10f = $ft9f + $alpa6 * ($a9 - $ft9f); // 10
    $E10f = $a10 - $ft10f;
    $M10f = abs($E10f);

    $ft11f = $ft10f + $alpa6 * ($a10 - $ft10f); // 11
    $E11f = $a11 - $ft11f;
    $M11f = abs($E11f);

    $ft12f = $ft11f + $alpa6 * ($a11 - $ft11f); // 12
    $E12f = $a12 - $ft12f;
    $M12f = abs($E12f);


    //forcast 2,3,4,5,6,7,8,9,10,11,12 ====================================> Alpha 0.7
    $ft2g = $ft1 + $alpa7 * ($a1 - $ft1); // 2
    $E2g = $a2 - $ft2g;
    $M2g = abs($E2g);

    $ft3g = $ft2g + $alpa7 * ($a2 - $ft2g); // 3
    $E3g = $a3 - $ft3g;
    $M3g = abs($E3g);

    $ft4g = $ft3g + $alpa7 * ($a3 - $ft3g); // 4
    $E4g = $a4 - $ft4g;
    $M4g = abs($E4g);

    $ft5g = $ft4g + $alpa7 * ($a4 - $ft4g); // 5
    $E5g = $a5 - $ft5g;
    $M5g = abs($E5g);

    $ft6g = $ft5g + $alpa7 * ($a5 - $ft5g); // 6
    $E6g = $a6 - $ft6g;
    $M6g = abs($E6g);

    $ft7g = $ft6g + $alpa7 * ($a6 - $ft6g); // 7
    $E7g = $a7 - $ft7g;
    $M7g = abs($E7g);

    $ft8g = $ft7g + $alpa7 * ($a7 - $ft7g); // 8
    $E8g = $a8 - $ft8g;
    $M8g = abs($E8g);

    $ft9g = $ft8g + $alpa7 * ($a8 - $ft8g); // 9
    $E9g = $a9 - $ft9g;
    $M9g = abs($E9g);

    $ft10g = $ft9g + $alpa7 * ($a9 - $ft9g); // 10
    $E10g = $a10 - $ft10g;
    $M10g = abs($E10g);

    $ft11g = $ft10g + $alpa7 * ($a10 - $ft10g); // 11
    $E11g = $a11 - $ft11g;
    $M11g = abs($E11g);

    $ft12g = $ft11g + $alpa7 * ($a11 - $ft11g); // 12
    $E12g = $a12 - $ft12g;
    $M12g = abs($E12g);


    //forcast 2,3,4,5,6,7,8,9,10,11,12 =====================================> Alpha 0.8
    $ft2h = $ft1 + $alpa8 * ($a1 - $ft1); // 2
    $E2h = $a2 - $ft2h;
    $M2h = abs($E2h);

    $ft3h = $ft2h + $alpa8 * ($a2 - $ft2h); // 3
    $E3h = $a3 - $ft3h;
    $M3h = abs($E3h);

    $ft4h = $ft3h + $alpa8 * ($a3 - $ft3h); // 4
    $E4h = $a4 - $ft4h;
    $M4h = abs($E4h);

    $ft5h = $ft4h + $alpa8 * ($a4 - $ft4h); // 5
    $E5h = $a5 - $ft5h;
    $M5h = abs($E5h);

    $ft6h = $ft5h + $alpa8 * ($a5 - $ft5h); // 6
    $E6h = $a6 - $ft6h;
    $M6h = abs($E6h);

    $ft7h = $ft6h + $alpa8 * ($a6 - $ft6h); // 7
    $E7h = $a7 - $ft7h;
    $M7h = abs($E7h);

    $ft8h = $ft7h + $alpa8 * ($a7 - $ft7h); // 8
    $E8h = $a8 - $ft8h;
    $M8h = abs($E8h);

    $ft9h = $ft8h + $alpa8 * ($a8 - $ft8h); // 9
    $E9h = $a9 - $ft9h;
    $M9h = abs($E9h);

    $ft10h = $ft9h + $alpa8 * ($a9 - $ft9h); // 10
    $E10h = $a10 - $ft10h;
    $M10h = abs($E10h);

    $ft11h = $ft10h + $alpa8 * ($a10 - $ft10h); // 11
    $E11h = $a11 - $ft11h;
    $M11h = abs($E11h);

    $ft12h = $ft11h + $alpa8 * ($a11 - $ft11h); // 12
    $E12h = $a12 - $ft12h;
    $M12h = abs($E12h);

    //forcast 2,3,4,5,6,7,8,9,10,11 =====================================> Alpha 0.9
    $ft2i = $ft1 + $alpa9 * ($a1 - $ft1); // 2
    $E2i = $a2 - $ft2i;
    $M2i = abs($E2i);

    $ft3i = $ft2i + $alpa9 * ($a2 - $ft2i); // 3
    $E3i = $a3 - $ft3i;
    $M3i = abs($E3i);

    $ft4i = $ft3i + $alpa9 * ($a3 - $ft3i); // 4
    $E4i = $a4 - $ft4i;
    $M4i = abs($E4i);

    $ft5i = $ft4i + $alpa9 * ($a4 - $ft4i); // 5
    $E5i = $a5 - $ft5i;
    $M5i = abs($E5i);

    $ft6i = $ft5i + $alpa9 * ($a5 - $ft5i); // 6
    $E6i = $a6 - $ft6i;
    $M6i = abs($E6i);

    $ft7i = $ft6i + $alpa9 * ($a6 - $ft6i); // 7
    $E7i = $a7 - $ft7i;
    $M7i = abs($E7i);

    $ft8i = $ft7i + $alpa9 * ($a7 - $ft7i); // 8
    $E8i = $a8 - $ft8i;
    $M8i = abs($E8i);

    $ft9i = $ft8i + $alpa9 * ($a8 - $ft8i); // 9
    $E9i = $a9 - $ft9i;
    $M9i = abs($E9i);

    $ft10i = $ft9i + $alpa9 * ($a9 - $ft9i); // 10
    $E10i = $a10 - $ft10i;
    $M10i = abs($E10i);

    $ft11i = $ft10i + $alpa9 * ($a10 - $ft10i); // 11
    $E11i = $a11 - $ft11i;
    $M11i = abs($E11i);

    $ft12i = $ft11i + $alpa9 * ($a11 - $ft11i); // 12
    $E12i = $a12 - $ft12i;
    $M12i = abs($E12i);

    //cari forcast 11 dengan EROR terkecil
    $MAE01 = ($M1 + $M2a + $M3a + $M4a + $M5a + $M6a + $M7a + $M8a + $M9a + $M10a + $M11a) / 11;
    $MAE02 = ($M1 + $M2b + $M3b + $M4b + $M5b + $M6b + $M7b + $M8b + $M9b + $M10b + $M11b) / 11;
    $MAE03 = ($M1 + $M2c + $M3c + $M4c + $M5c + $M6c + $M7c + $M8c + $M9c + $M10c + $M11c) / 11;
    $MAE04 = ($M1 + $M2d + $M3d + $M4d + $M5d + $M6d + $M7d + $M8d + $M9d + $M10d + $M11d) / 11;
    $MAE05 = ($M1 + $M2e + $M3e + $M4e + $M5e + $M6e + $M7e + $M8e + $M9e + $M10e + $M11e) / 11;
    $MAE06 = ($M1 + $M2f + $M3f + $M4f + $M5f + $M6f + $M7f + $M8f + $M9f + $M10f + $M11f) / 11;
    $MAE07 = ($M1 + $M2g + $M3g + $M4g + $M5g + $M6g + $M7g + $M8g + $M9g + $M10g + $M11g) / 11;
    $MAE08 = ($M1 + $M2h + $M3h + $M4h + $M5h + $M6h + $M7h + $M8h + $M9h + $M10h + $M11h) / 11;
    $MAE09 = ($M1 + $M2i + $M3i + $M4i + $M5i + $M6i + $M7i + $M8i + $M9i + $M10i + $M11i) / 11;

    $cari = min($MAE01, $MAE02, $MAE03, $MAE04, $MAE05, $MAE06, $MAE07, $MAE08, $MAE09);
    if ($cari == $MAE01) {

        //forcast2
        $alpa = $alpa1;
        $ft2 = $ft2a;
        $e2 = $E2a;
        $m2 = $M2a;

        //forcast3
        $ft3 = $ft3a;
        $e3 = $E3a;
        $m3 = $M3a;

        //forcast4
        $ft4 = $ft4a;
        $e4 = $E4a;
        $m4 = $M4a;

        //forcast5
        $ft5 = $ft5a;
        $e5 = $E5a;
        $m5 = $M5a;

        //forcast6
        $ft6 = $ft6a;
        $e6 = $E6a;
        $m6 = $M6a;

        //forcast7
        $ft7 = $ft7a;
        $e7 = $E7a;
        $m7 = $M7a;

        //forcast8
        $ft8 = $ft8a;
        $e8 = $E8a;
        $m8 = $M8a;

        //forcast9
        $ft9 = $ft9a;
        $e9 = $E9a;
        $m9 = $M9a;

        //forcast10
        $ft10 = $ft10a;
        $e10 = $E10a;
        $m10 = $M10a;

        //forcast11
        $ft11 = $ft11a;
        $e11 = $E11a;
        $m11 = $M11a;

        //forcast12
        $ft12 = $ft12a;
        $e12 = $E12a;
        $m12 = $M12a;
    } else if ($cari == $MAE02) {
        //forcast2
        $alpa = $alpa2;
        $ft2 = $ft2b;
        $e2 = $E2b;
        $m2 = $M2b;

        //forcast3
        $ft3 = $ft3b;
        $e3 = $E3b;
        $m3 = $M3b;

        //forcast4
        $ft4 = $ft4b;
        $e4 = $E4b;
        $m4 = $M4b;

        //forcast5
        $ft5 = $ft5b;
        $e5 = $E5b;
        $m5 = $M5b;

        //forcast6
        $ft6 = $ft6b;
        $e6 = $E6b;
        $m6 = $M6b;

        //forcast7
        $ft7 = $ft7b;
        $e7 = $E7b;
        $m7 = $M7b;

        //forcast8
        $ft8 = $ft8b;
        $e8 = $E8b;
        $m8 = $M8b;

        //forcast9
        $ft9 = $ft9b;
        $e9 = $E9b;
        $m9 = $M9b;

        //forcast10
        $ft10 = $ft10b;
        $e10 = $E10b;
        $m10 = $M10b;

        //forcast11
        $ft11 = $ft11b;
        $e11 = $E11b;
        $m11 = $M11b;

        //forcast12
        $ft12 = $ft12b;
        $e12 = $E12b;
        $m12 = $M12b;
    } else if ($cari == $MAE03) {
        //forcast2
        $alpa = $alpa3;
        $ft2 = $ft2c;
        $e2 = $E2c;
        $m2 = $M2c;

        //forcast3
        $ft3 = $ft3c;
        $e3 = $E3c;
        $m3 = $M3c;

        //forcast4
        $ft4 = $ft4c;
        $e4 = $E4c;
        $m4 = $M4c;

        //forcast5
        $ft5 = $ft5c;
        $e5 = $E5c;
        $m5 = $M5c;

        //forcast6
        $ft6 = $ft6c;
        $e6 = $E6c;
        $m6 = $M6c;

        //forcast7
        $ft7 = $ft7c;
        $e7 = $E7c;
        $m7 = $M7c;

        //forcast8
        $ft8 = $ft8c;
        $e8 = $E8c;
        $m8 = $M8c;

        //forcast9
        $ft9 = $ft9c;
        $e9 = $E9c;
        $m9 = $M9c;

        //forcast10
        $ft10 = $ft10c;
        $e10 = $E10c;
        $m10 = $M10c;

        //forcast11
        $ft11 = $ft11c;
        $e11 = $E11c;
        $m11 = $M11c;

        //forcast12
        $ft12 = $ft12c;
        $e12 = $E12c;
        $m12 = $M12c;
    } else if ($cari == $MAE04) {
        //forcast2
        $alpa = $alpa4;
        $ft2 = $ft2d;
        $e2 = $E2d;
        $m2 = $M2d;

        //forcast3
        $ft3 = $ft3d;
        $e3 = $E3d;
        $m3 = $M3d;

        //forcast4
        $ft4 = $ft4d;
        $e4 = $E4d;
        $m4 = $M4d;

        //forcast5
        $ft5 = $ft5d;
        $e5 = $E5d;
        $m5 = $M5d;

        //forcast6
        $ft6 = $ft6d;
        $e6 = $E6d;
        $m6 = $M6d;

        //forcast7
        $ft7 = $ft7d;
        $e7 = $E7d;
        $m7 = $M7d;

        //forcast8
        $ft8 = $ft8d;
        $e8 = $E8d;
        $m8 = $M8d;

        //forcast9
        $ft9 = $ft9d;
        $e9 = $E9d;
        $m9 = $M9d;

        //forcast10
        $ft10 = $ft10d;
        $e10 = $E10d;
        $m10 = $M10d;

        //forcast11
        $ft11 = $ft11d;
        $e11 = $E11d;
        $m11 = $M11d;

        //forcast12
        $ft12 = $ft12d;
        $e12 = $E12d;
        $m12 = $M12d;
    } else if ($cari == $MAE05) {
        //forcast2
        $alpa = $alpa5;
        $ft2 = $ft2e;
        $e2 = $E2e;
        $m2 = $M2e;

        //forcast3
        $ft3 = $ft3e;
        $e3 = $E3e;
        $m3 = $M3e;

        //forcast4
        $ft4 = $ft4e;
        $e4 = $E4e;
        $m4 = $M4e;

        //forcast5
        $ft5 = $ft5e;
        $e5 = $E5e;
        $m5 = $M5e;

        //forcast6
        $ft6 = $ft6e;
        $e6 = $E6e;
        $m6 = $M6e;

        //forcast7
        $ft7 = $ft7e;
        $e7 = $E7e;
        $m7 = $M7e;

        //forcast8
        $ft8 = $ft8e;
        $e8 = $E8e;
        $m8 = $M8e;

        //forcast9
        $ft9 = $ft9e;
        $e9 = $E9e;
        $m9 = $M9e;

        //forcast10
        $ft10 = $ft10e;
        $e10 = $E10e;
        $m10 = $M10e;

        //forcast11
        $ft11 = $ft11e;
        $e11 = $E11e;
        $m11 = $M11e;

        //forcast12
        $ft12 = $ft12e;
        $e12 = $E12e;
        $m12 = $M12e;
    } else if ($cari == $MAE06) {
        //forcast2
        $alpa = $alpa6;
        $ft2 = $ft2f;
        $e2 = $E2f;
        $m2 = $M2f;

        //forcast3
        $ft3 = $ft3f;
        $e3 = $E3f;
        $m3 = $M3f;

        //forcast4
        $ft4 = $ft4f;
        $e4 = $E4f;
        $m4 = $M4f;

        //forcast5
        $ft5 = $ft5f;
        $e5 = $E5f;
        $m5 = $M5f;

        //forcast6
        $ft6 = $ft6f;
        $e6 = $E6f;
        $m6 = $M6f;

        //forcast7
        $ft7 = $ft7f;
        $e7 = $E7f;
        $m7 = $M7f;

        //forcast8
        $ft8 = $ft8f;
        $e8 = $E8f;
        $m8 = $M8f;

        //forcast9
        $ft9 = $ft9f;
        $e9 = $E9f;
        $m9 = $M9f;

        //forcast10
        $ft10 = $ft10f;
        $e10 = $E10f;
        $m10 = $M10f;

        //forcast11
        $ft11 = $ft11f;
        $e11 = $E11f;
        $m11 = $M11f;

        //forcast12
        $ft12 = $ft12f;
        $e12 = $E12f;
        $m12 = $M12f;
    } else if ($cari == $MAE07) {
        //forcast2
        $alpa = $alpa7;
        $ft2 = $ft2g;
        $e2 = $E2g;
        $m2 = $M2g;

        //forcast3
        $ft3 = $ft3g;
        $e3 = $E3g;
        $m3 = $M3g;

        //forcast4
        $ft4 = $ft4g;
        $e4 = $E4g;
        $m4 = $M4g;

        //forcast5
        $ft5 = $ft5g;
        $e5 = $E5g;
        $m5 = $M5g;

        //forcast6
        $ft6 = $ft6g;
        $e6 = $E6g;
        $m6 = $M6g;

        //forcast7
        $ft7 = $ft7g;
        $e7 = $E7g;
        $m7 = $M7g;

        //forcast8
        $ft8 = $ft8g;
        $e8 = $E8g;
        $m8 = $M8g;

        //forcast9
        $ft9 = $ft9g;
        $e9 = $E9g;
        $m9 = $M9g;

        //forcast10
        $ft10 = $ft10g;
        $e10 = $E10g;
        $m10 = $M10g;

        //forcast11
        $ft11 = $ft11g;
        $e11 = $E11g;
        $m11 = $M11g;

        //forcast12
        $ft12 = $ft12g;
        $e12 = $E12g;
        $m12 = $M12g;
    } else if ($cari == $MAE08) {
        //forcast2
        $alpa = $alpa8;
        $ft2 = $ft2h;
        $e2 = $E2h;
        $m2 = $M2h;

        //forcast3
        $ft3 = $ft3h;
        $e3 = $E3h;
        $m3 = $M3h;

        //forcast4
        $ft4 = $ft4h;
        $e4 = $E4h;
        $m4 = $M4h;

        //forcast5
        $ft5 = $ft5h;
        $e5 = $E5h;
        $m5 = $M5h;

        //forcast6
        $ft6 = $ft6h;
        $e6 = $E6h;
        $m6 = $M6h;

        //forcast7
        $ft7 = $ft7h;
        $e7 = $E7h;
        $m7 = $M7h;

        //forcast8
        $ft8 = $ft8h;
        $e8 = $E8h;
        $m8 = $M8h;

        //forcast9
        $ft9 = $ft9h;
        $e9 = $E9h;
        $m9 = $M9h;

        //forcast10
        $ft10 = $ft10h;
        $e10 = $E10h;
        $m10 = $M10h;

        //forcast11
        $ft11 = $ft11h;
        $e11 = $E11h;
        $m11 = $M11h;

        //forcast12
        $ft12 = $ft12h;
        $e12 = $E12h;
        $m12 = $M12h;
    } else if ($cari == $MAE09) {
        //forcast2
        $alpa = $alpa9;
        $ft2 = $ft2i;
        $e2 = $E2i;
        $m2 = $M2i;

        //forcast3
        $ft3 = $ft3i;
        $e3 = $E3i;
        $m3 = $M3i;

        //forcast4
        $ft4 = $ft4i;
        $e4 = $E4i;
        $m4 = $M4i;

        //forcast5
        $ft5 = $ft5i;
        $e5 = $E5i;
        $m5 = $M5i;

        //forcast6
        $ft6 = $ft6i;
        $e6 = $E6i;
        $m6 = $M6i;

        //forcast7
        $ft7 = $ft7i;
        $e7 = $E7i;
        $m7 = $M7i;

        //forcast8
        $ft8 = $ft8i;
        $e8 = $E8i;
        $m8 = $M8i;

        //forcast9
        $ft9 = $ft9i;
        $e9 = $E9i;
        $m9 = $M9i;

        //forcast10
        $ft10 = $ft10i;
        $e10 = $E10i;
        $m10 = $M10i;

        //forcast11
        $ft11 = $ft11i;
        $e11 = $E11i;
        $m11 = $M11i;

        //forcast12
        $ft12 = $ft12i;
        $e12 = $E12i;
        $m12 = $M12i;
    }
    //kirim ke tabel data ini
}
