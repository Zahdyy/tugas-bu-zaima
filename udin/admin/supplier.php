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
    <h2>SUPPLIER</h2>
    <div class="button-container">
            <form action="create_supp.php" method="post">
                <button type="submit" class="create">Create</button>
            </form>
    </div>
    <?php
    $supp ="SELECT id_sup, nama_sup, kontak_sup, nama_barang, id_user FROM supplier";
    $result = $koneksi->query($supp);

    echo '<table><tr><th>ID Supplier</th><th>Nama Supplier</th><th>Kontak Supplier</th><th>Nama Baranag</th><<th>ID User</th><th>Action</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_sup'] . "</td>";
            echo "<td>" . $row['nama_sup'] . "</td>";
            echo "<td>" . $row['kontak_sup'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td><button><a href='delete_supp.php?id_sup=" . $row['id_sup'] . "' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?');\">Delete</button></a>
                  <button><a href='update_supp.php?id_sup=" . $row['id_sup'] . "'>Update</button></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
    <?php include 'footer.php'; ?>
</body>
</html>