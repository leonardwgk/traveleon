<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: login/masuk.php');
    exit;
}

require 'koneksi.php';

//ambil id dari session
$id = $_SESSION['id'];

// query ke form
$tiket = query("SELECT * FROM users WHERE id = $id")[0];

//query wisata
$wisatas = query("SELECT * FROM wisatas");

//kirim data
if (isset($_POST['submit'])) {
    if (pesan($_POST) > 0) {
        echo "
        <script>
        alert('Tiket Berhasil Dipesan!');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Tiket Gagal Dipesan!');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="header">
        <h1 class="company">TRAVELEON</h1>
        <a href="login/logout.php"><button class="logoutbtn">Logout</button></a>
    </div>
    <div class="navbar">
        <a href="index.php">Beli Tiket</a>
        <a href="user/informasi.php">Informasi Akun</a>
        <a href="user/wisata.php">Daftar Wisata</a>
    </div>
    <div class="content">
        <h1>Formulir Pemesanan Tiket</h1>
        <form class="formulir" action="" method="post">
            <input type="hidden" name="id" value="<?= $tiket['id'] ?>">

            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="nama" required value="<?= $tiket['nama'] ?>"><br>
            <label for="nik">NIK:</label><br>
            <input type="number" name="nik" id="nik" required value="<?= $tiket['nik'] ?>"><br>
            <label for="negara">Negara:</label><br>
            <input type="text" name="negara" id="negara" required value="<?= $tiket['negara'] ?>"><br>
            <label for="provinsi">Provinsi:</label><br>
            <input type="text" name="provinsi" id="provinsi" required value="<?= $tiket['provinsi'] ?>"><br>
            <label for="kota">Kota:</label><br>
            <input type="text" name="kota" id="kota" required value="<?= $tiket['kota'] ?>"><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" name="alamat" id="alamat" required value="<?= $tiket['alamat'] ?>"><br>
            <label for="telepon">Telepon:</label><br>
            <input type="number" name="telepon" id="telepon" required value="<?= $tiket['telepon'] ?>"><br>
            <label for="umur">Umur:</label><br>
            <input type="number" name="umur" id="umur" required value="<?= $tiket['umur'] ?>"><br>
            <label for="tanggal">Tanggal Keberangkatan:</label><br>
            <input type="date" name="tanggal" id="tanggal" required><br>
            <label for="wisata">Tempat Wisata:</label><br>
            <select name="wisata" id="wisata">
                <?php foreach ($wisatas as $wisata) : ?>
                    <option value="<?= $wisata['wisata'] ?>"><?= $wisata['wisata'] ?></option>
                <?php endforeach ?>
            </select><br>
            <label for="jumlah">Jumlah Kursi:</label><br>
            <input type="number" name="jumlah" id="jumlah" required><br>

            <button class="order" name="submit" type="submit">Pesan Tiket</button>
        </form>
    </div>
</body>

</html>