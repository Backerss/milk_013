<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h2>Register</h2>
            <form id="registerForm">
                <div class="form-row">
                    <div class="input-box">
                        <input type="text" id="name" required>
                        <label>Name</label>
                    </div>
                    <div class="input-box">
                        <input type="text" id="lastname" required>
                        <label>Lastname</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-box">
                        <input type="email" id="email" required>
                        <label>Email</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-box">
                        <input type="password" id="password" required>
                        <label>Password</label>
                    </div>
                    <div class="input-box">
                        <input type="date" id="birthdate" required>
                        <label>Birthdate</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-box">
                        <select id="sex" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="text" id="code" required>
                        <label>Student Code</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-box">
                        <input type="tel" id="phone" required>
                        <label>Phone Number</label>
                    </div>
                </div>
                <button type="button" onclick="register()">Register</button>
                <p id="message"></p>
            </form>
            <p class="switch-link">Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
    <script src="assets/js/login.js"></script>
</body>
</html>
