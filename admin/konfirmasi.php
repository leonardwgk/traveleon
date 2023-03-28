<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header('location: ../login/masuk.php');
    exit;
}

require '../koneksi.php';

$id = $_GET['id'];

if (konfirmasi($id) > 0) {
    echo "
    <script>
    alert('Tiket Berhasil Dikonfirmasi!');
    document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Tiket Gagal Dikonfirmasi!');
    document.location.href = 'index.php';
    </script>
    ";
}
