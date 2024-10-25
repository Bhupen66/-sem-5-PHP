<?php
// orders.php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Include database connection and other necessary files
// e.g., include 'db_connection.php';

// Fetch orders from the database
// Example query (assuming a PDO connection):
// $stmt = $pdo->query('SELECT * FROM orders');
// $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="css/orders.css">
</head>
<body>
    <div class="main-content">
        <header>
            <h1>Manage Orders</h1>
        </header>
        <section>
            <!-- Orders Table -->
            <div class="table-container">
                <h2>Order List</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Example data loop (replace with actual data fetching code)
                        foreach ($orders as $order) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($order['order_id']) . '</td>';
                            echo '<td>' . htmlspecialchars($order['customer_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($order['customer_email']) . '</td>';
                            echo '<td>$' . number_format($order['total_amount'], 2) . '</td>';
                            echo '<td>' . htmlspecialchars($order['status']) . '</td>';
                            echo '<td>
                                    <a href="view_order.php?id=' . htmlspecialchars($order['order_id']) . '">View</a> |
                                    <a href="edit_order.php?id=' . htmlspecialchars($order['order_id']) . '">Edit</a> |
                                    <a href="delete_order.php?id=' . htmlspecialchars($order['order_id']) . '" onclick="return confirm(\'Are you sure?\')">Delete</a>
                                  </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
