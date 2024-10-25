<?php
// summary.php
include 'db_connection.php';

header('Content-Type: application/json');

try {
    // Fetch total sales
    $stmt = $pdo->query('SELECT SUM(total_amount) AS total_sales FROM orders');
    $totalSales = $stmt->fetchColumn();

    // Fetch total orders
    $stmt = $pdo->query('SELECT COUNT(*) AS total_orders FROM orders');
    $totalOrders = $stmt->fetchColumn();

    // Fetch recent orders (for the chart)
    $stmt = $pdo->query('SELECT DATE(order_date) AS date, SUM(total_amount) AS total FROM orders GROUP BY DATE(order_date)');
    $recentOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare data for Chart.js
    $dates = [];
    $totals = [];
    foreach ($recentOrders as $order) {
        $dates[] = $order['date'];
        $totals[] = $order['total'];
    }

    echo json_encode([
        'total_sales' => $totalSales,
        'total_orders' => $totalOrders,
        'chart_data' => [
            'dates' => $dates,
            'totals' => $totals
        ]
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Data fetch failed: ' . $e->getMessage()]);
}
?>
