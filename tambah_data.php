<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>

<body>
    <h2>Tambah Data Buku</h2>
    <form action="proses_tambah_data.php" method="post">
        <label for="kode_buku">Kode Buku:</label><br>
        <input type="text" id="kode_buku" name="kode_buku" required><br><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" required><br><br>

        <label for="judul_buku">Judul Buku:</label><br>
        <input type="text" id="judul_buku" name="judul_buku" required><br><br>

        <label for="pengarang">Pengarang:</label><br>
        <input type="text" id="pengarang" name="pengarang" required><br><br>

        <label for="sekilas_isi">Sekilas Isi:</label><br>
        <textarea id="sekilas_isi" name="sekilas_isi" rows="4" required></textarea><br><br>

        <label for="tanggal_masuk">Tanggal Masuk:</label><br>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" required><br><br>

        <label for="stok">Stok:</label><br>
        <input type="number" id="stok" name="stok" required><br><br>

        <input type="submit" value="Tambah Data">
    </form>
</body>

</html>