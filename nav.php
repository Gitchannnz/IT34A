<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Registration</h1>
        
        <div class="input-box">
            <input type="text" name="firstName" placeholder="Firstname" required>
        </div>
        <div class="input-box">
            <input type="text" name="middleName" placeholder="Middlename" required>
        </div>
        <div class="input-box">
            <input type="text" name="lastname" placeholder="Lastname" required>
        </div>
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-box">
            <input type="date" name="date" placeholder="Date" required>
        </div>
        <!-- Removed the Confirm Password field and related code -->
        <div class="remember-forget">
            <label><input type="checkbox" required> Terms and Policies</label>
        </div>
        <button type="submit" class="btn">Submit...</button>
        
        <div class="register-link">
            <p>Already have an account?<a href="index.php">Sign In</a></p>
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data with matching letter case
            $firstName = $_POST['firstName'];
            $middleName = $_POST['middleName'];
            $lastname = $_POST['lastname'];
            $rawPassword = $_POST['password'];
            $email = $_POST['email'];
            $dateTime = $_POST['date'];

            // Database configuration
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "appointmentdb";

            // Create a database connection
            $conn = new mysqli($host, $username, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                echo '<p class="error-message">Error: Connection failed. ' . $conn->connect_error . '</p>';
            } else {
                // Perform database operations using prepared statements
                $stmt = $conn->prepare("INSERT INTO registrationtbl (firstName, middleName, lastName, email, password, date) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $firstName, $middleName, $lastname, $email, $rawPassword, $dateTime);

                if ($stmt->execute()) {
                    // Set a session variable to store the success message
                    $_SESSION['success_message'] = "Data inserted successfully!";

                    // Redirect to the login page after successful registration
                    header("Location: index.php");
                    exit(); // Stop script execution
                } else {
                    echo '<p class="error-message">Error: Data insertion failed.</p>';
                }

                // Close the database connection
                $stmt->close();
                $conn->close();
            }
        }
        ?>
    </form>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.7.1.js"></script>
</body>
</html>
