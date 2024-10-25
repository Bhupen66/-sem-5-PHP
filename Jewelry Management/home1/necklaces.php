<?php
session_start();

// Fetch necklaces from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelry_shop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, image, price FROM jewelry WHERE category = 'necklace'";
$result = $conn->query($sql);
$necklaces = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $necklaces[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Necklaces</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar, etc. -->

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Necklaces Collection</h2>
        <div class="row">
            <?php foreach ($necklaces as $necklace): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo $necklace['image']; ?>" class="card-img-top" alt="<?php echo $necklace['name']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $necklace['name']; ?></h5>
                            <p class="card-text">$<?php echo $necklace['price']; ?></p>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $necklace['id']; ?>">
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
