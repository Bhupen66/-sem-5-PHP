<?php
    session_start();

    // Simulating user login for this example
    $_SESSION['user'] = 'Bhupen';

    // Sample products list from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jewelry_shop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Pagination settings
    $productsPerPage = 6; // Number of products to show per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page or default to 1
    $offset = ($page - 1) * $productsPerPage; // Calculate offset for SQL query

    // Fetch total number of products
    $totalSql = "SELECT COUNT(*) as total FROM jewelry";
    $totalResult = $conn->query($totalSql);

    if ($totalResult->num_rows > 0) {
        $totalRow = $totalResult->fetch_assoc();
        $totalProducts = $totalRow['total'];

        // Calculate total pages
        $totalPages = ceil($totalProducts / $productsPerPage);
    } else {
        // If no products are found, set default values to avoid undefined variable errors
        $totalProducts = 0;
        $totalPages = 1;
    }


    // Fetch products for the current page
    $sql = "SELECT id, name, image, price FROM jewelry LIMIT $productsPerPage OFFSET $offset";
    $result = $conn->query($sql);
    $topJewelry = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $topJewelry[] = $row;
        }
    }

    $conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jewelry Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="index1.css">


    </head>
    <body>

        <!-- Navbar with Home, Search, Cart, Contact, Logout -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">Jewelry Shop</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                
                <form class="form-inline mx-auto search-form" method="GET" action="search_results.php">
                    <input class="form-control mr-sm-2 search-input" type="search" name="query" placeholder="Search jewelry" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 search-button" type="submit">Search</button>
                </form>
                
            <li class="nav-item">welcome, <?php echo $_SESSION['user']; ?></li>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="rings.php?category=ring" class="<?php echo ($category == 'ring') ? 'active' : ''; ?>">Rings</a>
                                <a href="rings.php?category=earring" class="<?php echo ($category == 'earring') ? 'active' : ''; ?>">Earrings</a>
                                <a href="rings.php?category=necklace" class="<?php echo ($category == 'necklace') ? 'active' : ''; ?>">Necklaces</a>
                                <a href="rings.php?category=bracelet" class="<?php echo ($category == 'bracelet') ? 'active' : ''; ?>">Bracelets</a>
                                <a href="rings.php?category=pendant" class="<?php echo ($category == 'pendant') ? 'active' : ''; ?>">Pendants</a>
                            </div>
                        </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart <span class="badge badge-pill badge-info">
                            <?php echo count($_SESSION['cart'] ?? []); ?>
                        </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>


        <!-- Greeting Banner -->
        <section class="home-banner text-center text-white">
            <div class="container">
                <h1>Welcome to Our <samp style="color: pink;">  Jewelry</samp> Shop</h1>
                <p class="lead">Explore our exclusive collection and shop for the finest jewelry.</p>
                <a href="#top-products" class="btn btn-primary btn-lg ">Shop Now</a>
            </div>
        </section>

        <!-- Top Jewelry Products Section -->
        <section id="top-products" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Top Jewelry</h2>
                <div class="row">

                    <?php foreach ($topJewelry as $product) : ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                    <p class="card-text">₹<?php echo $product['price']; ?></p>
                                    <form action="cart.php" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn btn-success">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                    

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact py-5">
            <div class="container">
                <h2 class="text-center mb-4">Contact Us</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Get in Touch</h4>
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4>Our Office</h4>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Jewelry Lane, Bardoli City, CA 12345</p>
                        <p><i class="fas fa-phone"></i> +91 8320836870</p>
                        <p><i class="fas fa-envelope"></i> <a href="mailto:22bca29@vtcbcsr.edu.in">22bca29@vtcbcsr.edu.in</a></p>
                        <p><i class="fas fa-clock"></i> Mon-Fri: 9am - 6pm | Sat: 10am - 4pm</p>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>