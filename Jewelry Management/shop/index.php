<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Sample products array
$products = [
    ['id' => 1, 'name' => 'T-shirt', 'price' => 20, 'image' => 'tshirt.jpg'],
    ['id' => 2, 'name' => 'Jeans', 'price' => 40, 'image' => 'jeans.jpg'],
    ['id' => 3, 'name' => 'Shoes', 'price' => 60, 'image' => 'shoes.jpg'],
];

// Add item to cart
if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['add_to_cart'];
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $_SESSION['cart'][] = $product;
            break;
        }
    }
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Shop Items</h1>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
                    <h2><?= $product['name'] ?></h2>
                    <p>$<?= $product['price'] ?></p>
                    <a href="?add_to_cart=<?= $product['id'] ?>" class="btn">Add to Cart</a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="cart.php" class="cart-link">Go to Cart</a>
    </div>
</body>
</html>
