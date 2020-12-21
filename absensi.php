<?php
require 'mysqli.php';
require 'zklibrary.php';
require 'verifikasi.php';

$server_db = new Koneksi();
$verifikasi = new Verifikasi();

$db_query = $server_db->mulai();

$zk = new ZKLibrary('192.168.0.51', 4370);
$zk->connect();
$zk->disableDevice();

// $users = $zk->getUser();
$db_mesin = $zk->getAttendance();

$jumlah_mesin = count($db_mesin);

$db_absensi = $db_query->query('SELECT * FROM absen');
$jumlah_absensi = count($db_absensi);
// var_dump($db_absensi);
echo "<br>Data kehadiran dari mesin = ".$jumlah_mesin."<br>Data absensi database = ".$jumlah_absensi."<br><br>";

$today = date("Y-m-d");  

echo "Data dari mesin: <br>";
foreach ($db_mesin as $kehadiran_mesin) {
  echo " Nama: ".$kehadiran_mesin[1]."    Absen Jam: ".$kehadiran_mesin[3]."<br>";
}
echo "<br><br><br>";
echo "Data dari database: <br>";
foreach ($db_absensi as $kehadiran_absensi) {
  echo " Nama: ".$kehadiran_absensi['nama']."    Absen Jam: ".$kehadiran_absensi['waktu']."<br>";
}

echo "<br>===========<br>";

$zk->enableDevice();
$zk->disconnect();
// print_r($today);
// hanya simpan data hari ini ke database
$db_absensi_today = $db_query->query("SELECT * FROM absen WHERE waktu LIKE '{$today}%'");
$data_mesin_today = $verifikasi->cek_today($today, $db_mesin);
// print_r($db_absensi_today);


echo "Data dari mesin today: <br>";
foreach ($data_mesin_today as $kehadiran_mesin_today) {
  echo " Nama: ".$kehadiran_mesin_today[1]."    Absen Jam: ".$kehadiran_mesin_today[3]."<br>";
}
echo "<br><br><br>";
echo "Data dari database today: <br>";
foreach ($db_absensi_today as $kehadiran_absensi_today) {
  echo " Nama: ".$kehadiran_absensi_today['nama']."    Absen Jam: ".$kehadiran_absensi_today['waktu']."<br>";
}


$data_mesin_non_duplikat_absensi = $verifikasi->cek_duplikat($data_mesin_today, $db_absensi_today);
