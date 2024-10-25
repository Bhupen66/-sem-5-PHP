<?php
session_start();
include 'includes/header.php';
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="container mt-5">
    <h2>Change Password</h2>
    <form action="actions/change_password.php" method="POST">
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
