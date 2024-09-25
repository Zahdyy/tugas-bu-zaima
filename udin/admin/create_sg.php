<?php
include 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['no_gudang']) || empty($_POST['nama_gudang']) || empty($_POST['lokasi_gudang']) || empty($_POST['id_user'])) {
    } else {
        $no_gudang = $_POST['no_gudang'];
        $nama_gudang = $_POST['nama_gudang'];
        $lokasi_gudang = $_POST['lokasi_gudang'];
        $id_user = $_POST['id_user'];

        $sql_check = "SELECT * FROM inventory WHERE no_gudang='$no_gudang'";
        $result_check = $koneksi->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            echo "No Gudang sudah ada, gunakan yang lain.";
        } else {
            $sql = "INSERT INTO storage (no_gudang, nama_gudang, lokasi_gudang, id_user)
                    VALUES ('$no_gudang', '$nama_gudang', '$lokasi_gudang', '$id_user')";

            if ($koneksi->query($sql) === TRUE) {
                header("Location: storage.php");
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
        <h2>Create Storage</h2>
        <form action="create_sg.php" method="POST">
            <label>No Gudang :</label>
            <input type="text" name="no_gudang" required>
            <label>Nama Gudang :</label>
            <input type="text" name="nama_gudang" required>
            <label>Lokasi Gudang :</label>
            <input type="text" name="lokasi_gudang" required>
            <label>ID User :</label>
            <input type="text" name="id_user" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
