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
    <h2>STORAGE</h2>
    <div class="button-container">
            <form action="create_sg.php" method="post">
                <button type="submit" class="create">Create</button>
            </form>
    </div>
    <?php
    $sg ="SELECT no_gudang, nama_gudang, lokasi_gudang,id_user FROM storage";
    $result = $koneksi->query($sg);

    echo '<table><tr><th>No Gudang</th><th>Nama Gudang</th><th>Lokasi Gudang</th><th>ID User</th><th>Action</th></tr>';
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['no_gudang'] . "</td>";
            echo "<td>" . $row['nama_gudang'] . "</td>";
            echo "<td>" . $row['lokasi_gudang'] . "</td>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td><button><a href='delete_sg.php?no_gudang=" . $row['no_gudang'] . "' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?');\">Delete</button></a>
                  <button><a href='update_sg.php?no_gudang=" . $row['no_gudang'] . "'>Update</button></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
    <?php include 'footer.php'; ?>
</body>
</html>