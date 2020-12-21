<?php

class Verifikasi
{
  public function cek_today ($today, $db_mesin)
  {
    // echo "<br>Today = ".$today."<br>";
    $array_mesin = [];

    // ekstrak data mesin
    foreach ($db_mesin as $data_mesin) {
      //ekstark data absensi
      // x foreach ($db_absensi as $data_absensi) {
        // jika data mesin == today
        if (strpos($data_mesin[3], $today) !== false) {
          // jika data mesin nama dan data mesin waktu belum ada di database
          // x if ($data_mesin[1] !== $data_absensi['nama'] && $data_mesin[3] !== $data_absensi['waktu']) {
            // maka push data mesin ke array_mesin
            array_push($array_mesin, $data_mesin);
          // x }
        }
      // x }
      
    }
    
    echo "Data mesin sama dengan today = "; print_r(count($array_mesin)); echo "<br>";
    return $array_mesin;
  }

  public function cek_duplikat ($data_mesin_today, $db_absensi_today)
  {
    // $data_submit = array_diff($data_mesin_today, $data_absensi_today);
    // print_r($data_submit);

    // hanya boleh simpan dua data tiap orang
    // foreach ($db)
    $data_submit = [];

    // foreach ($data_mesin_today as $mesin_today) {
    //   foreach ($db_absensi_today as $absensi_today) {
    //     if ($mesin_today[1] !== $absensi_today['nama'] && $mesin_today[3] !== $absensi_today['waktu']) {
    //       array_push($data_submit, $mesin_today);
    //     }
    //   }
    // }
print_r($data_mesin_today); echo "<br><br>"; print_r($db_absensi_today); echo "<br><br>";
    $angka = count($data_mesin_today);
    for ($i=0; $i <=$angka ; $i++) { 
      if ($mesin_today[$i][1] !== $absensi_today[$i]['nama'] OR $mesin_today[$i][3] !== $absensi_today[$i]['waktu']) {
        array_push($data_submit, $mesin_today[$i]);
      }
    }
    print_r($data_submit);
  }
}