<?php
include 'db.php';

if (isset($_GET['no_gudang'])) {
    $no_gudang = $_GET['no_gudang'];

    $sql = "DELETE FROM storage WHERE no_gudang = '$no_gudang'";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: storage.php");
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "No Gudang tidak ditemukan.";
}
?>
