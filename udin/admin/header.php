<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <h1>Welcome Admin</h1>
        <h2>Admin Dashboard</h2>
        <input type="search" name="search" placeholder="Search....">
        <nav>
            <ul>
                <li><a href="inven.php">Inventory</a></li>
                <li><a href="storage.php">Storage</a></li>
                <li><a href="supplier.php">Supplier</a></li>
            </ul>
        </nav>
        <div class="logout-container">
            <form action="../user" method="post">
                <button type="submit" class="logout">Logout</button>
            </form>
        </div>
    </header>
</body>
</html>