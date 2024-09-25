<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="proses.php" method="POST">
            <label>Username :</label>
            <input type="text" name="username" placeholder="Username" required>
            <label>Passswod :</label>
            <input type="password" name="password" placeholder="Password" required>
            <a href="lupa.php">Lupa Password?</a>
            <button type="submit" name="login">Login</button>
        </form>
</form>
</body>
</html>