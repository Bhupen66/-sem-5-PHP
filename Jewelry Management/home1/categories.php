<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Categories</title>
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
        .category-section {
            margin-top: 80px;
        }
        .category-card {
            border: none;
            transition: transform 0.3s ease;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .category-card img {
            width: 100%;
            height: auto;
            border-radius: 15px;
        }
        .category-card-title {
            font-size: 24px;
            margin-top: 15px;
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
                <a class="nav-link" href="cart.php">Cart <span class="badge badge-pill badge-info"><?php echo count($_SESSION['cart']); ?></span></a>
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

<!-- Jewelry Categories Section -->
<section class="category-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Explore Our Jewelry Categories</h2>
        <div class="row">

            <!-- Example Category: Necklaces -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card category-card">
                    <img src="images/necklaces.jpg" alt="Necklaces">
                    <div class="card-body text-center">
                        <h4 class="category-card-title">Necklaces</h4>
                        <a href="necklaces.php" class="btn btn-primary mt-2">Shop Necklaces</a>
                    </div>
                </div>
            </div>

            <!-- Example Category: Earrings -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card category-card">
                    <img src="images/earrings.jpg" alt="Earrings">
                    <div class="card-body text-center">
                        <h4 class="category-card-title">Earrings</h4>
                        <a href="earrings.php" class="btn btn-primary mt-2">Shop Earrings</a>
                    </div>
                </div>
            </div>

            <!-- Example Category: Rings -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card category-card">
                    <img src="images/rings.jpg" alt="Rings">
                    <div class="card-body text-center">
                        <h4 class="category-card-title">Rings</h4>
                        <a href="rings.php" class="btn btn-primary mt-2">Shop Rings</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
