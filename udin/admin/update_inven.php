<?php
include 'db.php'; 

if (isset($_GET['no_seri'])) {
    $no_seri = $_GET['no_seri'];

    $sql = "SELECT * FROM inventory WHERE no_seri = '$no_seri'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_seri = $_POST['no_seri'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi = $_POST['lokasi_gudang'];

    $sql_update = "UPDATE inventory SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', kuantitas_stok='$kuantitas_stok', lokasi_gudang='$lokasi' WHERE no_seri='$no_seri'";

    if ($koneksi->query($sql_update) === TRUE) {
        header("Location: inven.php"); 
        exit;
    } else {
        echo "Error: " . $koneksi->error;
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
        <h2>Update Inventory</h2>
        <form action="update_inven.php" method="POST">
            <input type="hidden" name="no_seri" value="<?php echo $row['no_seri']; ?>">
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
            <label>Jenis Barang :</label>
            <input type="text" name="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" required>
            <label>Kuantitas Stok :</label>
            <input type="number" name="kuantitas_stok" value="<?php echo $row['kuantitas_stok']; ?>" required>
            <label>Lokasi :</label>
            <input type="text" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang']; ?>" required> 
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>