<?php
require "../koneksi.php";

if (isset($_POST['daftar'])) {
    if (daftar($_POST) > 0) {
        echo "
        <script>
            alert('Akun Berhasil Dibuat!');
        </script>
        ";
        header('location: masuk.php');
    } else {
        echo mysqli_error($koneksi);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="header">
        <h1 class="company">TRAVELEON</h1>
        <a href="masuk.php"><button class="logoutbtn">Masuk</button></a>
    </div>
    <div class="navbar">
    </div>
    <div class="content">
        <h1>Daftar</h1>
        <form class="formulir" action="" method="post">
            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="nama" required><br>
            <label for="namakel">Nama Keluarga:</label><br>
            <input type="text" name="namakel" id="namakel" required><br>
            <label for="nik">NIK:</label><br>
            <input type="number" name="nik" id="nik" required><br>
            <label for="umur">Umur:</label><br>
            <input type="number" name="umur" id="umur" required><br>
            <label for="telepon">Telepon:</label><br>
            <input type="number" name="telepon" id="telepon" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br>
            <label for="negara">Negara:</label><br>
            <input type="text" name="negara" id="negara" required><br>
            <label for="provinsi">Provinsi:</label><br>
            <input type="text" name="provinsi" id="provinsi" required><br>
            <label for="kota">Kota:</label><br>
            <input type="text" name="kota" id="kota" required><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" name="alamat" id="alamat" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br>

            <button class="order" name="daftar" type="submit">Daftar</button>
        </form>
    </div>
</body>

</html>