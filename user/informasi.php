<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';
$informasi = query("SELECT * FROM tikets");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Akun</title>
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
    <div class="container">
        <?php foreach ($informasi as $row) : ?>
            <a href="detail.php?id=<?= $row['id'] ?>">
                <h4><?= $row['nama'] ?></h4>
            </a>
            <p>Destinasi Wisata: <?= $row['wisata'] ?></p>
            <p>Tanggal Keberangkatan: <?= $row['tanggal'] ?></p>
        <?php endforeach ?>
    </div>
</body>

</html>