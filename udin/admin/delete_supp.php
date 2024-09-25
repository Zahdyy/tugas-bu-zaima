<?php
include 'db.php';

if (isset($_GET['id_sup'])) {
    $id_sup = $_GET['id_sup'];

    $sql = "DELETE FROM supplier WHERE id_sup = '$id_sup'";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: supplier.php");
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "ID Supplier tidak ditemukan.";
}
?>
