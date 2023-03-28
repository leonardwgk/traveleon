<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require "../koneksi.php";

$id = $_GET['id'];

$edit = query("SELECT * FROM users WHERE id = $id")[0];

if (isset($_POST['submit'])) {
    if (editakun($_POST) > 0) {
        echo "
        <script>
            alert('Akun Berhasil Diedit!');
            document.location.href = 'akun.php';
        </script>
        ";
        header('location: akun.php');
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
    <title>Edit Akun</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="header">
        <h1 class="company">TRAVELEON</h1>
        <a href="logout.php"><button class="logoutbtn">Logout</button></a>
    </div>
    <div class="navbar">
    </div>
    <div class="content">
        <h1>Edit Akun</h1>
        <form class="formulir" action="" method="post">
            <input type="hidden" name="id" value="<?= $edit['id'] ?>">

            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="nama" required value="<?= $edit['nama'] ?>"><br>
            <label for="namakel">Nama Keluarga:</label><br>
            <input type="text" name="namakel" id="namakel" required value="<?= $edit['namakel'] ?>"><br>
            <label for="nik">NIK:</label><br>
            <input type="number" name="nik" id="nik" required value="<?= $edit['nik'] ?>"><br>
            <label for="umur">Umur:</label><br>
            <input type="number" name="umur" id="umur" required value="<?= $edit['umur'] ?>"><br>
            <label for="telepon">Telepon:</label><br>
            <input type="number" name="telepon" id="telepon" required value="<?= $edit['telepon'] ?>"><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required value="<?= $edit['email'] ?>"><br>
            <label for="negara">Negara:</label><br>
            <input type="text" name="negara" id="negara" required value="<?= $edit['negara'] ?>"><br>
            <label for="provinsi">Provinsi:</label><br>
            <input type="text" name="provinsi" id="provinsi" required value="<?= $edit['provinsi'] ?>"><br>
            <label for="kota">Kota:</label><br>
            <input type="text" name="kota" id="kota" required value="<?= $edit['kota'] ?>"><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" name="alamat" id="alamat" required value="<?= $edit['alamat'] ?>"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required value="<?= $edit['password'] ?>"><br>

            <button class="order" name="submit" type="submit">Edit</button>
        </form>
    </div>
</body>

</html>