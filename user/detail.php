<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';

$id = $_GET['id'];
$informasi = query("SELECT * FROM tikets WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="header">
        <h1 class="company">TRAVELEON</h1>
        <a href="../login/logout.php"><button class="logoutbtn">Logout</button></a>
    </div>
    <div class="navbar">
        <a href="../index.php">Beli Tiket</a>
        <a href="informasi.php">Informasi Akun</a>
        <a href="wisata.php">Daftar Wisata</a>
    </div>
    <div class="detail-tiket">
        <?php foreach ($informasi as $row) : ?>
            <h4><?= $row['nama'] ?></h4>
            <p>Status: <?= $row['status'] ?></p>
            <p>Destinasi Wisata: <?= $row['wisata'] ?></p>
            <p>Tanggal Keberangkatan: <?= $row['tanggal'] ?></p>
            <p>Jumlah Kursi: <?= $row['jumlah'] ?></p>
        <?php endforeach ?>
    </div>
</body>

</html>