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
$id_buku = $_POST['id'];
$kode_buku = $_POST['kode_buku'];
$isbn = $_POST['isbn'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$sekilas_isi = $_POST['sekilas_isi'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$stok = $_POST['stok'];

// Query untuk mengupdate data buku ke dalam database
$sql = "UPDATE data_buku SET kode_buku=?, isbn=?, judul_buku=?, pengarang=?, sekilas_isi=?, tanggal_masuk=?, stok=? WHERE id=?";

// Menyiapkan pernyataan SQL
$stmt = $conn->prepare($sql);

// Bind parameter ke statement
$stmt->bind_param("ssssssii", $kode_buku, $isbn, $judul_buku, $pengarang, $sekilas_isi, $tanggal_masuk, $stok, $id_buku);

// Mengeksekusi pernyataan SQL
if ($stmt->execute()) {
    echo "<script>alert('Data buku berhasil diupdate.'); window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('Gagal mengupdate data buku.'); window.history.back();</script>";
}

// Tutup koneksi
$conn->close();
