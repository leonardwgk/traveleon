<?php
session_start();
if (isset($_SESSION['masuk'])) {
    header('location: ../user/index.php');
    exit;
}

require "../koneksi.php";

if (isset($_POST['masuk'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //cek email
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

    //cek hasil
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            //set session
            $_SESSION['masuk'] = true;
            $_SESSION['id'] = $row['id'];

            if ($row['role'] == 'admin') {
                header('location: ../admin/index.php');
            } elseif ($row['role'] == 'user') {
                header('location: ../index.php');
                exit;
            }
        } else {
            echo "<script>
            alert('Email / Password Salah!');
            </script>";
        }
    }
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
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
        <h1>Masuk</h1>
        <form class="formulir" action="" method="post">
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br>

            <button class="order" type="submit" name="masuk">Masuk</button>
            <p>Belum Memiliki Akun? <a class="daftar" href="daftar.php">Daftar Sekarang!</a></p>
        </form>
    </div>
</body>

</html>