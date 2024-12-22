<?php
// Konfigurasi koneksi ke database
$host = 'localhost';       // Nama host, biasanya 'localhost'
$dbname = 'pendaftranseni'; // Nama database yang sudah Anda buat
$username = 'root';        // Username database, biasanya 'root' untuk XAMPP
$password = '';            // Password, biasanya kosong untuk localhost atau disesuaikan jika menggunakan password

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
