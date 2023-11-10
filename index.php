<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <form action="navbar.php" method="POST"> <!-- Specify the action to a server-side script for processing -->
        <h1>Login</h1>
        
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="remember-forget">
            <label><input type="checkbox" name="remember"> Remember me</label>
            <a href="">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>
        
        <div class="register-link">
            <p>Don't have an account?<a href="nav.php">Register</a></p>
        </div>

        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'notfound') {
            echo '<p class="error-message">Can\'t proceed: The provided email and password were not found in the database.</p>';
        }
        ?>
    </form>
</div>
<!-- JavaScript libraries -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.7.1.js"></script>
</body>
</html>
