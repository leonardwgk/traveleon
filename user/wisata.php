<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';

$wisatas = query("SELECT * FROM wisatas");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Wisata</title>
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
    <div class="container-wisata">
        <table border="solid" cellpadding="10px" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pulau</th>
                    <th>Destinasi Wisata</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($wisatas as $wisata) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $wisata['pulau'] ?></td>
                        <td><?= $wisata['wisata'] ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>