<?php
include 'db.php'; 

if (isset($_GET['id_sup'])) {
    $id_sup = $_GET['id_sup'];

    $sql = "SELECT * FROM supplier WHERE id_sup = '$id_sup'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sup = $_POST['id_sup'];
    $nama_sup = $_POST['nama_sup'];
    $kontak_sup = $_POST['kontak_sup'];
    $nama_barang = $_POST['nama_barang'];

    $sql_update = "UPDATE supplier SET nama_sup='$nama_sup', kontak_sup='$kontak_sup', nama_barang='$nama_barang' WHERE id_sup='$id_sup'";

    if ($koneksi->query($sql_update) === TRUE) {
        header("Location: supplier.php"); 
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
        <h2>Update Supplier</h2>
        <form action="update_supp.php" method="POST">
            <input type="hidden" name="id_sup" value="<?php echo $row['id_sup']; ?>">
            <label>Nama Supplier :</label>
            <input type="text" name="nama_sup" value="<?php echo $row['nama_sup']; ?>" required>
            <label>Kontak Supplier :</label>
            <input type="text" name="kontak_sup" value="<?php echo $row['kontak_sup']; ?>" required> 
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required> 
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>