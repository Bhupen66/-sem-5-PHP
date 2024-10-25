<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelry_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get top jewelry products (e.g., top 5 products)
$sql = "SELECT id, name, image, price FROM jewelry LIMIT 5";
$result = $conn->query($sql);

$topJewelry = [];

if ($result->num_rows > 0) {
    // Fetch all products
    while($row = $result->fetch_assoc()) {
        $topJewelry[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
