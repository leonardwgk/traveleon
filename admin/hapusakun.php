<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';
//ambil id dari url
$id = $_GET['id'];

if (hapusakun($id) > 0) {
    echo "
    <script>
    alert('Akun Berhasil Dihapus!');
    document.location.href = 'akun.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Akun Gagal Dihapus!');
    document.location.href = 'akun.php';
    </script>
    ";
}
