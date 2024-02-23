<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Sign in</h2>
        <form action="index.php" method="post" name="loginForm" id="loginForm">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <button type="submit" name="signinBtn" id="signinBtn">Login</button>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="E-comXpress Registration Page.html">Register here</a></p>
        </div>
    </div>
    
</body>
</html>
