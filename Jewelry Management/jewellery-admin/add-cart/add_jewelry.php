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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $category = $_POST['category'];  // Collecting the category

    // SQL query to insert data into the jewelry table
    $sql = "INSERT INTO jewelry (name, image, price, category) VALUES (?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $name, $image, $price, $category); // 's' for string and 'd' for double (price)

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Jewelry added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
