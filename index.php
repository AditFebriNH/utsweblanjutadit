<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    $logged_in = true;
} else {
    $logged_in = false;
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

// Ambil data buku dari database
$sql = "SELECT * FROM data_buku";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>

        <h2>Data Buku</h2>
        <?php if ($logged_in) : ?>
            <form action="tambah_data.php">
                <button type="submit">Tambah Data</button>
            </form>
            <form action="logout.php" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        <?php else : ?>
            <form action="login.php">
                <button type="submit">Login</button>
            </form>
        <?php endif; ?>

    </nav>
    <table>
        <tr>
            <th>ID</th>
            <th>Kode Buku</th>
            <th>ISBN</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Sekilas Isi</th>
            <th>Tanggal Masuk</th>
            <th>Stok</th>
            <?php if ($logged_in) : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["kode_buku"] . "</td>";
                echo "<td>" . $row["isbn"] . "</td>";
                echo "<td>" . $row["judul_buku"] . "</td>";
                echo "<td>" . $row["pengarang"] . "</td>";
                echo "<td>" . $row["sekilas_isi"] . "</td>";
                echo "<td>" . $row["tanggal_masuk"] . "</td>";
                echo "<td>" . $row["stok"] . "</td>";
                if ($logged_in) {
                    echo "<td><a href='edit_data.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_data.php?id=" . $row["id"] . "'>Hapus</a></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data buku</td></tr>";
        }
        ?>
    </table>
    <script>
        // Ambil pesan dari URL jika ada
        const urlParams = new URLSearchParams(window.location.search);
        const message = urlParams.get('message');

        // Jika ada pesan, tampilkan dalam popup
        if (message) {
            alert(message);
        }
    </script>

</body>

</html>

<?php
$conn->close();
?>