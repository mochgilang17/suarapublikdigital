<?php
// deklarasikan variabel untuk menyimpan detail koneksi database
$servername = "localhost"; // nama host, biasanya localhost
$database = "suarapublikdigital"; // nama database yang akan Anda buat
$username = "root"; // nama user database, biasanya root
$password = ""; // password user database, biasanya kosong

// buat koneksi dengan database menggunakan fungsi mysqli_connect
$conn = mysqli_connect($servername, $username, $password, $database);

// cek apakah koneksi berhasil atau tidak
if (!$conn) {
    // jika gagal, tampilkan pesan error
    die("Koneksi gagal: " . mysqli_connect_error());
}
// jika berhasil, tampilkan pesan sukses
echo "Koneksi berhasil";
