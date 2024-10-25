<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .background-image {
            background-image: url('images/f.jpg'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .reset-password-container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            
        }

        .reset-password-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .reset-password-container .form-group {
            margin-bottom: 20px;
        }

        .reset-password-container .btn-primary {
            background: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .reset-password-container .btn-primary:hover {
            background: #0056b3;
        }

        .reset-password-container p {
            font-size: 14px;
            color: #666;
        }

        .reset-password-container p a {
            color: #007bff;
            text-decoration: none;
        }

        .reset-password-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="background-image">
        <div class="reset-password-container">
            <h2>Reset Password</h2>
            <form action="reset_password_process.php" method="POST">
                <input type="hidden" name="token" value="              "> <!--<?php echo htmlspecialchars($_GET['token']); ?>-->
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
