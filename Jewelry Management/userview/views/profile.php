<?php
session_start();
include 'includes/header.php';
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="container mt-5">
    <h2>Your Profile</h2>
    <form action="actions/update_profile.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
    <a href="change_password.php" class="btn btn-warning mt-3">Change Password</a>
</div>

<?php include 'includes/footer.php'; ?>
