<?php

class Koneksi {
  public function mulai()
  {
    $host = 'localhost';
    $user = 'admin';
    $password = '00000000';
    $db = 'master_absen';

    $mysqli = new mysqli($host,$user,$password,$db);
    // print_r($mysqli->query('SELECT * FROM absen')); echo "<br><br><br>";
    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    } else {
      return $mysqli;
    }
  }  
}
