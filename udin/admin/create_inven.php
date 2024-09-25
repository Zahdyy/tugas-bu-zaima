<?php
include 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['no_seri']) || empty($_POST['nama_barang']) || empty($_POST['jenis_barang']) || 
        empty($_POST['kuantitas_stok']) || empty($_POST['lokasi_gudang']) || empty($_POST['id_user'])) {
    } else {
        $no_seri = $_POST['no_seri'];
        $nama_barang = $_POST['nama_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $kuantitas_stok = $_POST['kuantitas_stok'];
        $lokasi_gudang = $_POST['lokasi_gudang'];
        $id_user = $_POST['id_user'];

        $sql_check = "SELECT * FROM inventory WHERE no_seri='$no_seri'";
        $result_check = $koneksi->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            echo "No Seri sudah ada, gunakan yang lain.";
        } else {
            $sql = "INSERT INTO inventory (no_seri, nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, id_user)
                    VALUES ('$no_seri', '$nama_barang', '$jenis_barang', '$kuantitas_stok', '$lokasi_gudang', '$id_user')";

            if ($koneksi->query($sql) === TRUE) {
                header("Location: inven.php");
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylec.css">
</head>
<body>
    <div class="login-container">
        <h2>Create Inventory</h2>
        <form action="create_inven.php" method="POST">
            <label>No Seri :</label>
            <input type="text" name="no_seri" required>
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" required>
            <label>Jenis Barang :</label>
            <input type="text" name="jenis_barang" required>
            <label>Kuantitas Stok :</label>
            <input type="number" name="kuantitas_stok" required>
            <label>Lokasi Gudang :</label>
            <input type="text" name="lokasi_gudang" required>
            <label>ID User :</label>
            <input type="text" name="id_user" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
