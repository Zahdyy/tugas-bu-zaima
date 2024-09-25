<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_stok");

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");


    if (mysqli_num_rows($data) > 0) {
        $ambildata = mysqli_fetch_assoc($data);
        $_SESSION['log'] = 'logged';
        $_SESSION['level'] = $ambildata['level'];
        if ($ambildata['level'] === 'admin') {
            header('Location: ../admin/inven.php');
        } 
    } else {
        echo "Invalid username or password";
    }
}
?>