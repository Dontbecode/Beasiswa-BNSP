  <!-- Koneksi ke Database -->
<?php

$host = "localhost"; // Ganti dengan nama host MySQL Anda
$username = "root"; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$database = "beasiswa_dev"; // Ganti dengan nama database yang Anda gunakan

$koneksi = mysqli_connect($host, $username, $password, $database);
  // jika databse tidak terhubung
if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
