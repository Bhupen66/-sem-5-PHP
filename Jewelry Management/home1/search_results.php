<?php
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

// Get the search query from the URL parameter
$query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

if ($query) {
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT id, name, image, price FROM jewelry WHERE name LIKE ? OR description LIKE ?");
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    $searchResults = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    } else {
        $searchResults = [];
    }

    $stmt->close();
} else {
    $searchResults = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
        <div class="row">
            <?php if (!empty($searchResults)): ?>
                <?php foreach ($searchResults as $item): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                                <p class="card-text">$<?php echo htmlspecialchars($item['price']); ?></p>
                                <a href="item.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No results found for "<?php echo htmlspecialchars($query); ?>".</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
