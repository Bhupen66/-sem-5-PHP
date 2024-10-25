<?php
session_start();
$id = $_GET['id'];
// Mock data (replace with real product database query)
$product = [
    "id" => $id,
    "name" => "Diamond Ring",
    "price" => 1000
];
$_SESSION['cart'][] = $product;
header("Location: ../cart.php");
exit();
?>
