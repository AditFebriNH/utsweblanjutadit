<?php
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

// Tangkap data yang dikirim dari formulir
$kode_buku = $_POST['kode_buku'];
$isbn = $_POST['isbn'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$sekilas_isi = $_POST['sekilas_isi'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$stok = $_POST['stok'];

// Query untuk menyimpan data ke dalam database
$sql = "INSERT INTO data_buku (kode_buku, isbn, judul_buku, pengarang, sekilas_isi, tanggal_masuk, stok) 
        VALUES ('$kode_buku', '$isbn', '$judul_buku', '$pengarang', '$sekilas_isi', '$tanggal_masuk', $stok)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data buku berhasil ditambahkan');</script>";
    echo "<script>window.location.href = 'index.php';</script>"; // Redirect ke halaman index
} else {
    echo "Gagal menambahkan data: " . $conn->error;
}


// Tutup koneksi
$conn->close();
