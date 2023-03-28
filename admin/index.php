<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';

$tiket = query("SELECT * FROM tikets");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="header">
        <h1 class="company">TRAVELEON</h1>
        <a href="../login/logout.php"><button class="logoutbtn">Logout</button></a>
    </div>
    <div class="navbar">
        <a href="index.php">List Tiket</a>
        <a href="akun.php">Kelola Akun</a>
        <a href="wisata.php">Kelola Wisata</a>
    </div>
    <div class="container-wisata">
        <h1>Selamat Datang, Admin!</h1>
        <table border="solid" cellpadding="10px" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Jumlah Kursi</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($tiket as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td><?= $row['wisata'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="konfirmasi.php?id=<?= $row['id'] ?>"><button class=" konfirmasi">Konfirmasi</button></a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Tiket Ini?')"><button class="hapus">Hapus</button></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>