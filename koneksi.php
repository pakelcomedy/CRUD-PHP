<?php
$koneksi = mysqli_connect("localhost", "root", "", "user");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
