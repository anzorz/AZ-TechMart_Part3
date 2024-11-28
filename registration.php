<?php
include 'settings.php';  // Include the database connection

// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Input validation
    $errors = [];

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if (empty($errors)) {
        // Hash the password
        $password_hash = md5($_POST['password']); // Hash the password
    
        // Sanitize inputs
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $password_hash); // Use already hashed password
    
        // Insert into the database
        $query = "INSERT INTO managers (username, password) VALUES ('$username', '$password')";
    
        if ($conn->query($query) === TRUE) {
            echo "Registration successful. You can now <a href='manager_login.php'>log in</a>.";
        } else {
            echo "Error: " . $conn->error;
        }    

    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manager Registration Page for AZ TechMart">
    <meta name="keywords" content="HTML5, Registration, Manager"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>AZ TechMart - Manager Registration</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/manager.css">
</head>
<body>
    <?php include 'includes/header.inc'; ?>

    <div class="registration-container">
        <h1>Manager Registration</h1>
        <form method="post" action="registration.php">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </div>

    <?php include 'includes/footer.inc'; ?>
</body>
</html>