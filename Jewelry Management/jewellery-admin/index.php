<?php
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Admin Panel</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="index.php?page=dashboard">Dashboard</a></li>
            <li><a href="products.php">Manage Products</a></li>
            <li><a href="orders.php">Manage Orders</a></li>
            <li><a href="users.php">Manage Users</a></li>
            <li><a href="settings.php">Summary</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Dashboard</h1>
            <button class="logout" onclick="window.location.href='logout.php'">Logout</button>
        </header>
        <section>
            <?php
            // Load page content based on query parameter
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            switch ($page) {
                case 'dashboard':
                    echo '<h2>Welcome to the Admin Panel</h2><p>Here you can manage your jewellery store efficiently.</p>';
                    break;
                case 'products':
                    include 'products.php';
                    break;
                case 'orders':
                    include 'orders.php';
                    break;
                case 'users':
                    include 'users.php';
                    break;
                case 'settings':
                    include 'settings.php';
                    break;
                default:
                    echo '<h2>404 Not Found</h2>';
                    break;
            }
            ?>
        </section>
    </div>
</body>
</html>
