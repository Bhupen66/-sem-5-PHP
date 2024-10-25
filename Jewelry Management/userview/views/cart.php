<?php
session_start();
include 'includes/header.php';
?>

<div class="container mt-5">
    <h2 class="mb-4">Your Cart</h2>
    <ul class="list-group">
        <!-- List cart items -->
        <?php if(isset($_SESSION['cart'])): ?>
            <?php foreach($_SESSION['cart'] as $item): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $item['name']; ?> - $<?php echo $item['price']; ?>
                    <a href="actions/remove_from_cart.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">Your cart is empty.</li>
        <?php endif; ?>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
