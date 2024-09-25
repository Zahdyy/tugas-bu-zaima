<?php
include 'db.php';

if (isset($_GET['no_seri'])) {
    $no_seri = $_GET['no_seri'];

    $sql = "DELETE FROM inventory WHERE no_seri = '$no_seri'";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: inven.php");
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "No Seri tidak ditemukan.";
}
?>
