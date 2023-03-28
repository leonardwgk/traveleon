<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';

$wisatas = query("SELECT * FROM wisatas");

if (isset($_POST['tambah'])) {
    if (tambahwisata($_POST) > 0) {
        echo "
        <script>
        alert('Tempat Wisata Berhasil Ditambah');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Tempat Wisata Gagal Ditambah');
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
    <title>Kelola Wisata</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/wisata.css">
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
        <div class="form">
            <h1>Tambah Tempat Wisata</h1>
            <p>Tekan Tambah Untuk Menambahkan Tempat Wisata!</p>

            <form class="tambah-wisata" action="" method="post">
                <label for="pulau">Pulau:</label><br>
                <input type="text" name="pulau" id="pulau"><br>
                <label for="wisata">Tempat Wisata:</label><br>
                <input type="text" name="wisata" id="wisata"><br>

                <button class="tambah" name="tambah" type="submit">Tambah</button>
            </form>
        </div><br><br>
        <table border="solid" cellspacing="0" cellpadding="10px" class="table">
            <tr>
                <th>No</th>
                <th>Pulau</th>
                <th>Tempat Wisata</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($wisatas as $wisata) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $wisata['pulau'] ?></td>
                    <td><?= $wisata['wisata'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>