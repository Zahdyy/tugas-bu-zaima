<?php
include 'db.php'; 

if (isset($_GET['no_gudang'])) {
    $no_gudang = $_GET['no_gudang'];

    $sql = "SELECT * FROM storage WHERE no_gudang = '$no_gudang'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_gudang = $_POST['no_gudang'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];

    $sql_update = "UPDATE storage SET nama_gudang='$nama_gudang', lokasi_gudang='$lokasi_gudang' WHERE no_gudang='$no_gudang'";

    if ($koneksi->query($sql_update) === TRUE) {
        header("Location: storage.php"); 
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
        <h2>Update Storage</h2>
        <form action="update_sg.php" method="POST">
            <input type="hidden" name="no_gudang" value="<?php echo $row['no_gudang']; ?>">
            <label>Nama Gudang :</label>
            <input type="text" name="nama_gudang" value="<?php echo $row['nama_gudang']; ?>" required>
            <label>Lokasi Gudang :</label>
            <input type="text" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang']; ?>" required> 
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>