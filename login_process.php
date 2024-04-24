<?php
session_start();

$servername = "localhost"; // Sesuaikan dengan nama host Anda
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = ""; // Sesuaikan dengan password MySQL Anda
$dbname = "db_sti202102123"; // Sesuaikan dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil nilai yang dikirimkan dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan query untuk memeriksa apakah username dan password sesuai dengan yang ada di database
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Jika hasil query menghasilkan satu baris, berarti login berhasil
if ($result->num_rows == 1) {
    // Login berhasil, set session dan redirect ke halaman utama
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    // Jika tidak, tampilkan pesan login gagal dan redirect kembali ke halaman login
    $_SESSION['login_error'] = "Username atau password salah.";
    header("Location: login.php");
}

$conn->close();
