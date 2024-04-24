<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    $logged_in = true;
} else {
    $logged_in = false;
}

// Jika pengguna belum login, redirect ke halaman login
if (!$logged_in) {
    header("Location: login.php");
    exit;
}

// Koneksi ke database
$servername = "localhost"; // Sesuaikan dengan nama host Anda
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = ""; // Sesuaikan dengan password MySQL Anda
$dbname = "db_sti202102123"; // Sesuaikan dengan nama database Anda
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil ID data buku yang akan dihapus
$id = $_GET['id'];

// Query untuk menghapus data buku
$sql = "DELETE FROM data_buku WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Redirect kembali ke halaman utama dengan pesan sukses di URL
    header("Location: index.php?message=Data%20buku%20berhasil%20dihapus");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
