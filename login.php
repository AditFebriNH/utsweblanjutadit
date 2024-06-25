<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect ke halaman utama jika sudah login
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan verifikasi username dan password di database
    // Jika valid, set session
    // Jika tidak valid, tampilkan pesan error
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>

<body>
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">


    </form>
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
    
        </tr>
</table>
</body>

</html>