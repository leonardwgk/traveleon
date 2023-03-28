<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';
//ambil id dari url
$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "
    <script>
    alert('Tiket Berhasil Dihapus!');
    document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Tiket Gagal Dihapus!');
    document.location.href = 'index.php';
    </script>
    ";
}
