<?php
$host = 'localhost'; // Nama host (biasanya 'localhost')
$user = 'root'; // Username untuk MySQL
$password = ''; // Password untuk MySQL, biasanya kosong di XAMPP
$database = 'daftar_satwa'; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
