<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
