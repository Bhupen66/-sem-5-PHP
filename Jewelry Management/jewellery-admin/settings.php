<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="main-content">
        <header>
            <h1>Admin Panel</h1>
            <button class="logout" onclick="window.location.href='logout.php'">Logout</button>
        </header>
        <section>
            <!-- Summary Statistics -->
            <div class="summary-container">
                <div class="summary-item">
                    <h2>Total Sales</h2>
                    <p id="total-sales">$0.00</p>
                </div>
                <div class="summary-item">
                    <h2>Total Orders</h2>
                    <p id="total-orders">0</p>
                </div>
            </div>

            <!-- Chart Container -->
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </section>
        <script src="js/dashboard.js"></script>
    </div>
</body>
</html>
