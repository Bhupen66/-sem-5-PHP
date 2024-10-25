<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];

    // If the cart session variable is not set, create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the product to the cart
    $_SESSION['cart'][] = $product_id;

    // Redirect back to the homepage
    header("Location: index.php");
    exit();
}
?>