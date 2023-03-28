<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'traveleon');

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function daftar($data)
{
    global $koneksi;
    //ambil data
    $email = strtolower(stripslashes($data['email']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $nama = htmlspecialchars($data['nama']);
    $namakel = htmlspecialchars($data['namakel']);
    $nik = htmlspecialchars($data['nik']);
    $umur = htmlspecialchars($data['umur']);
    $telepon = htmlspecialchars($data['telepon']);
    $negara = htmlspecialchars($data['negara']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $kota = htmlspecialchars($data['kota']);
    $alamat = htmlspecialchars($data['alamat']);
    $role = 'user';


    //cek email
    $result = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Email Sudah Terdaftar!');
        </script>
        ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //insert ke db
    $query = "INSERT INTO users VALUES
    ('', '$nama', '$namakel', '$nik', '$umur', '$telepon', '$email', '$negara', '$provinsi', '$kota', '$alamat', '$password', '$role')
    ";
    mysqli_query($koneksi, $query);


    return mysqli_affected_rows($koneksi);
}

function pesan($data)
{
    global $koneksi;
    //ambil data
    $nama = htmlspecialchars($data['nama']);
    $nik = htmlspecialchars($data['nik']);
    $negara = htmlspecialchars($data['negara']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $kota = htmlspecialchars($data['kota']);
    $alamat = htmlspecialchars($data['alamat']);
    $telepon = htmlspecialchars($data['telepon']);
    $umur = htmlspecialchars($data['umur']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $wisata = htmlspecialchars($data['wisata']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $status = 'Diproses';

    //insert data
    $query = "INSERT INTO tikets VALUES
        ('', '$nama', '$nik', '$negara', '$provinsi', '$kota', '$alamat', '$telepon', '$umur', '$tanggal', '$wisata', '$jumlah', '$status')
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tikets WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function hapusakun($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM users WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function konfirmasi($id)
{
    global $koneksi;

    //query ke db
    $query = "UPDATE tikets SET
            status = 'Dikonfirmasi'
            WHERE id = $id
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function editakun($data)
{
    global $koneksi;
    //ambil data
    $id = $data['id'];
    $email = strtolower(stripslashes($data['email']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $nama = htmlspecialchars($data['nama']);
    $namakel = htmlspecialchars($data['namakel']);
    $nik = htmlspecialchars($data['nik']);
    $umur = htmlspecialchars($data['umur']);
    $telepon = htmlspecialchars($data['telepon']);
    $negara = htmlspecialchars($data['negara']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $kota = htmlspecialchars($data['kota']);
    $alamat = htmlspecialchars($data['alamat']);

    //query ke db
    $query = "UPDATE users SET
        email = '$email',
        password = '$password',
        nama = '$nama',
        namakel = '$namakel',
        nik = '$nik',
        umur = '$umur',
        telepon = '$telepon',
        negara = '$negara',
        provinsi = '$provinsi',
        kota = '$kota',
        alamat = '$alamat'
    WHERE id = $id
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function tambahwisata($data)
{
    global $koneksi;

    //ambil data
    $pulau = htmlspecialchars($data['pulau']);
    $wisata = htmlspecialchars($data['wisata']);

    //query ke db
    $query = "INSERT INTO wisatas VALUE 
    ('', '$pulau', '$wisata')
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
