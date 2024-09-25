<?php
include "db.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
<body>
    <?php
    include "header.php";
    ?>
    <div class="content">  
    <h2>INVENTORY</h2>
    <div class="button-container">
            <form action="create_inven.php" method="post">
                <button type="submit" class="create">Create</button>
            </form>
    </div>
    <?php
    $inven ="SELECT no_seri, nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, id_user FROM inventory";
    $result = $koneksi->query($inven);

    echo '<table><tr><th>No Seri</th><th>Nama Barang</th><th>Jenis Barang</th><th>Kuantitas Stok</th><th>Lokasi Gudang</th><th>ID User</th><th>Action</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['no_seri'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . $row['jenis_barang'] . "</td>";
            echo "<td>" . $row['kuantitas_stok'] . "</td>";
            echo "<td>" . $row['lokasi_gudang'] . "</td>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td><button><a href='delete_inven.php?no_seri=" . $row['no_seri'] . "' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?');\">Delete</button></a>
                  <button><a href='update_inven.php?no_seri=" . $row['no_seri'] . "'>Update</button></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
    <?php include 'footer.php'; ?>
</body>
</html>