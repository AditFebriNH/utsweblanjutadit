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

// Tangkap id buku yang akan di-edit dari URL
$id_buku = $_GET['id'];

// Query untuk mengambil data buku berdasarkan id
$sql = "SELECT * FROM data_buku WHERE id = $id_buku";
$result = $conn->query($sql);

// Periksa apakah data buku ditemukan
if ($result->num_rows > 0) {
    // Loop melalui setiap baris data buku
    while ($row = $result->fetch_assoc()) {
        // Tangkap data buku yang akan diedit
        $kode_buku = $row['kode_buku'];
        $isbn = $row['isbn'];
        $judul_buku = $row['judul_buku'];
        $pengarang = $row['pengarang'];
        $sekilas_isi = $row['sekilas_isi'];
        $tanggal_masuk = $row['tanggal_masuk'];
        $stok = $row['stok'];
?>
        <!-- Form untuk mengedit data buku -->
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id_buku; ?>">
            <input type="text" name="kode_buku" value="<?php echo $kode_buku; ?>">
            <input type="text" name="isbn" value="<?php echo $isbn; ?>">
            <input type="text" name="judul_buku" value="<?php echo $judul_buku; ?>">
            <input type="text" name="pengarang" value="<?php echo $pengarang; ?>">
            <textarea name="sekilas_isi"><?php echo $sekilas_isi; ?></textarea>
            <input type="text" name="tanggal_masuk" value="<?php echo $tanggal_masuk; ?>">
            <input type="number" name="stok" value="<?php echo $stok; ?>">
            <input type="submit" value="Simpan Perubahan">
        </form>
<?php
    }
} else {
    echo "Data buku tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>