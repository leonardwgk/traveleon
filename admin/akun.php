<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';

$users = query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun</title>
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
        <table class="table" border="solid" cellpadding="10px" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $user['nama'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <a href="editakun.php?id=<?= $user['id'] ?>"><button class="konfirmasi">Edit</button></a>
                            <a href="hapusakun.php?id=<?= $user['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Akun Ini?')"><button class="hapus">Hapus</button></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>