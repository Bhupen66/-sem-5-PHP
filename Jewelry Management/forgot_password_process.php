<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    
    // Validate email and generate a reset token (for demonstration purposes)
    $token = bin2hex(random_bytes(50)); // Generate a unique token
    
    // For demonstration, display the token
    echo "Password reset link sent! Token: " . $token;
    
    // In a real application, you would:
    // 1. Check if the email exists in the database.
    // 2. Store the token in the database or in a secure storage.
    // 3. Send an email to the user with a link containing the token.
    // Example email link: http://yourdomain.com/reset_password.php?token=your_generated_token
}
?>
