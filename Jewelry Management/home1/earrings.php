<?php
session_start();

// Fetch earrings from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelry_shop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, image, price FROM jewelry WHERE category = 'earring'";
$result = $conn->query($sql);
$earrings = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $earrings[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Earrings</title>
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

<!-- Earrings Collection Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title">Earrings Collection</h2>
        <div class="row">
            <?php foreach ($earrings as $earring): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo $earring['image']; ?>" class="card-img-top" alt="<?php echo $earring['name']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $earring['name']; ?></h5>
                            <p class="card-text">$<?php echo $earring['price']; ?></p>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $earring['id']; ?>">
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Footer, etc. -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
