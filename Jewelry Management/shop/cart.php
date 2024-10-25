<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Remove item from cart
if (isset($_GET['remove_from_cart'])) {
    $index = $_GET['remove_from_cart'];
    array_splice($_SESSION['cart'], $index, 1);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Your Cart</h1>
        <div class="cart-items">
            <?php if (count($cart) > 0): ?>
                <ul>
                    <?php foreach ($cart as $index => $item): ?>
                        <li>
                            <?= $item['name'] ?> - $<?= $item['price'] ?>
                            <a href="?remove_from_cart=<?= $index ?>" class="btn">Remove</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Total: $<?= array_sum(array_column($cart, 'price')) ?></strong></p>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
        <a href="index.php" class="cart-link">Continue Shopping</a>
    </div>
</body>
</html>
