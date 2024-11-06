<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form id="loginForm">
                <div class="input-box">
                    <input type="email" id="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" id="password" required>
                    <label>Password</label>
                </div>
                <button type="button" onclick="login()">Login</button>
                <p id="message"></p>
            </form>
            <p class="switch-link">Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
    <script src="assets/js/login.js"></script>
</body>
</html>
