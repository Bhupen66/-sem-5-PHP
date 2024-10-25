<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .background-image {
            /* background-image: url("/images/lo.jpg"); Replace with your background image URL */
            background-image: url("images/lo.jpg");
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            /* filter: brightness(50%); Darkens the background image for better contrast */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            animation: fadeIn 1s ease-out;
            text-align: center;
        }

        .login-container h2 {
            font-weight: 700;
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        .login-container .form-group {
            margin-bottom: 20px;
        }

        .login-container .form-control {
            border-radius: 25px;
            border: 1px solid #ccc;
            padding: 15px;
            font-size: 16px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .login-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0,123,255,0.3);
            outline: none;
        }

        .login-container .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            color: #fff;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .login-container .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003d79);
            transform: translateY(-2px);
        }

        .login-container .form-check-label {
            font-size: 14px;
        }

        .login-container p {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
        }

        .login-container p a {
            
            text-decoration: none;
        }

        .login-container p a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="background-image">
        <div class="login-container">
            <h2>Login</h2>
            <form action="login_process.php" method="POST">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <p class="mt-3"><a href="reset_password.php">Forgot password?</a></p>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
