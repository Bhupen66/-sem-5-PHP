<?php
session_start();

// Sample connection and query
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelry_shop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the category from the query string, default to 'ring'
$category = $_GET['category'] ?? 'ring';

$sql = "SELECT id, name, image, price FROM jewelry WHERE category = '$category'";
$result = $conn->query($sql);
$items = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop <?php echo ucfirst($category); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .sidebar {
            position: sticky;
            top: 60px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #343a40;
        }
        .sidebar a.active {
            background-color: #007bff;
            color: white;
        }
        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }
        .section-title {
            margin-top: 80px;
            margin-bottom: 40px;
        }
        .card {
            border: none;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Jewelry Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart <span class="badge badge-pill badge-info"><?php echo count($_SESSION['cart'] ?? []); ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Page Content -->
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar for Categories -->
        <nav class="col-md-3 col-lg-2 sidebar bg-light">
            <h5 class="mt-4">Categories</h5>
            <a href="rings.php?category=ring" class="<?php echo ($category == 'ring') ? 'active' : ''; ?>">Rings</a>
            <a href="rings.php?category=earring" class="<?php echo ($category == 'earring') ? 'active' : ''; ?>">Earrings</a>
            <a href="rings.php?category=necklace" class="<?php echo ($category == 'necklace') ? 'active' : ''; ?>">Necklaces</a>
            <a href="rings.php?category=bracelet" class="<?php echo ($category == 'bracelet') ? 'active' : ''; ?>">Bracelets</a>
            <a href="rings.php?category=pendant" class="<?php echo ($category == 'pendant') ? 'active' : ''; ?>">Pendants</a>
        </nav>

        <!-- Main Content for Jewelry Items -->
        <main class="col-md-9 col-lg-10">
            <h2 class="text-center section-title"><?php echo ucfirst($category); ?> Collection</h2>
            <div class="row">
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $item['name']; ?></h5>
                                    <p class="card-text">$<?php echo $item['price']; ?></p>
                                    <form action="cart.php" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-success">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center w-100">No items found in this category.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<!-- Footer, etc. -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
