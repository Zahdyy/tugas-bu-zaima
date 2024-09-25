<?php
include 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id_sup']) || empty($_POST['nama_sup']) || empty($_POST['kontak_sup']) || 
        empty($_POST['nama_barang']) || empty($_POST['id_user'])) {
    } else {
        $id_sup = $_POST['id_sup'];
        $nama_sup= $_POST['nama_sup'];
        $kontak_sup = $_POST['kontak_sup'];
        $nama_barang = $_POST['nama_barang'];
        $id_user = $_POST['id_user'];

        $sql_check = "SELECT * FROM supplier WHERE id_sup ='$id_sup'";
        $result_check = $koneksi->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            echo "ID Supllier sudah ada, gunakan yang lain.";
        } else {
            $sql = "INSERT INTO supplier (id_sup, nama_sup, kontak_sup, nama_barang, id_user)
                    VALUES ('$id_sup', '$nama_sup', '$kontak_sup', '$nama_barang', '$id_user')";

            if ($koneksi->query($sql) === TRUE) {
                header("Location: supplier.php");
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
        <h2>Create Supplier</h2>
        <form action="create_supp.php" method="POST">
            <label>ID Supplier :</label>
            <input type="text" name="id_sup" required>
            <label>Nama Supplier :</label>
            <input type="text" name="nama_sup" required>
            <label>Kontak Supplier :</label>
            <input type="text" name="kontak_sup" required>
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" required>
            <label>ID User :</label>
            <input type="text" name="id_user" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
