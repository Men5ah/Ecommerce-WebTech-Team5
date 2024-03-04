<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="Registration.css">
    
    <script src="register page validation.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Getting started</h2>
        <form action="#" method="post" name="registrationForm" id="registrationForm">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="Enter your first name" required>

            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" placeholder="Enter your last name" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>

            <label for="location">Location</label>
            <input type="text" name="location" id="location" placeholder="Enter your location" required>

            <button type="submit" name="registerBtn" id="registerBtn">Register</button>
            
            <p>Already have an account? <a href="E-comXpress Login page.php"> Login</a></p>
        </form>
    </div>
    
</body>
</html>