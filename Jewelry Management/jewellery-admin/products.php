<?php
// products.php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Include database connection and other necessary files
// e.g., include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="css/products.css">
</head>
<body>
    <div class="main-content">

        <header>
            <h1>Manage Products</h1>
        </header>
        <section>
            <!-- Add Product Form -->
            <div class="form-container">
                <h2>Add or Edit Product</h2>
                <form action="process_product.php" method="post">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" required>

                    <label for="product_price">Price</label>
                    <input type="number" id="product_price" name="product_price" step="0.01" required>

                    <label for="product_description">Description</label>
                    <textarea id="product_description" name="product_description" rows="4" required></textarea>

                    <label for="product_image">Image URL</label>
                    <input type="text" id="product_image" name="product_image">

                    <button type="submit">Save Product</button>
                </form>
            </div>

            <!-- Products Table -->
            <div class="table-container">
                <h2>Product List</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Product Row -->
                        <tr>
                            <td>1</td>
                            <td>Gold Necklace</td>
                            <td>$500.00</td>
                            <td>Elegant gold necklace with diamonds.</td>
                            <td><img src="imge/1.png" alt="Gold Necklace" width="100"></td>
                            <td>
                                <a href="edit_product.php?id=1">Edit</a> |
                                <a href="delete_product.php?id=1" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>ring</td>
                            <td>$50.00</td>
                            <td>Elegant gold necklace with diamonds.</td>
                            <td><img src="imge/2.png" alt="Gold Necklace" width="100"></td>
                            <td>
                                <a href="edit_product.php?id=1">Edit</a> |
                                <a href="delete_product.php?id=1" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <!-- Repeat for other products -->
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
