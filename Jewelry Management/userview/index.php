<?php
session_start();
include 'includes/header.php';
?>

<div class="container mt-5">
    <h1 class="text-center mb-5">Welcome to Our Jewelry Shop</h1>
    <div class="row">
        <!-- List of jewelry products -->
        <div class="col-md-3">
            <div class="card">
                <img src="images/ring.jpg" class="card-img-top" alt="Ring">
                <div class="card-body">
                    <h5 class="card-title">Diamond Ring</h5>
                    <p class="card-text">$1000</p>
                    <a href="actions/add_to_cart.php?id=1" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <!-- Repeat for other products -->
    </div>
</div>

<?php include 'includes/footer.php'; ?>
