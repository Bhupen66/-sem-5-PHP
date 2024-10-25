<?php
session_start();

// Check if the cart session is empty, initialize it as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle the addition of products to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    // Simulate retrieving the product from the database using the product ID
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jewelry_shop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, price, image FROM jewelry WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        // Check if the product already exists in the cart
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        }
    }

    $conn->close();

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}

// Handle removing an item from the cart
if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    unset($_SESSION['cart'][$removeId]);
    header("Location: cart.php");
    exit();
}

// Handle clearing the entire cart
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
/* Dropdown styles */
.nav-item.dropdown {
    position: relative;
}

.nav-link.dropdown-toggle {
    color: #007bff;
    font-weight: 600;
    transition: color 0.3s ease;
}




.navbar-nav.mx-auto {
    flex: 1;
    justify-content: center;
}

.navbar-nav.ml-auto {
    margin-left: auto;
}

        .container {
            margin-top: 80px;
        }
        h2 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #333;
            text-align: center;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table img {
            width: 60px;
            height: auto;
        }
        .btn-primary, .btn-danger, .btn-secondary {
            padding: 10px 20px;
            font-size: 16px;
        }
        .total-container {
            text-align: right;
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
        .total-container h4 {
            font-size: 28px;
        }
        .btn-clear-cart, .btn-checkout, .btn-continue-shopping {
            margin-top: 20px;
            font-size: 18px;
        }
        .empty-cart {
            text-align: center;
            font-size: 24px;
            color: #888;
            margin-top: 50px;
        }
    </style>
</head>
<body>

        <!-- Navbar with Home, Search, Cart, Contact, Logout -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">Jewelry Shop</a>
            <li class="nav-item">Hello, <?php echo $_SESSION['user']; ?></li>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                        
                    </li>
                   
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

<div class="container">
    <h2>Your Shopping Cart</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <p class="empty-cart">Your cart is empty. <a href="index.php">Start shopping</a>.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            <td>
                                <a href="cart.php?remove=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="total-container">
            <h4>Total: $<?php echo number_format($total, 2); ?></h4>
            <a href="checkout.php" class="btn btn-primary btn-checkout">Proceed to Checkout</a>
            <a href="cart.php?clear=1" class="btn btn-danger btn-clear-cart">Clear Cart</a>
            <a href="index.php" class="btn btn-secondary btn-continue-shopping">Continue Shopping</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
