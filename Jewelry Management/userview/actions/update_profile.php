<?php
session_start();
// Update user info logic here
$_SESSION['user']['name'] = $_POST['name'];
$_SESSION['user']['email'] = $_POST['email'];
header("Location: ../profile.php");
exit();
?>
