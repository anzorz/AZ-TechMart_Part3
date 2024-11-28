<?php
include 'settings.php';  // Include the database connection

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Hash the entered password using md5() to compare with the stored password
    $hashed_password = md5($password);

    // Fetch the user from the database
    $query = "SELECT * FROM managers WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password_hash = $row['password'];

        // Compare the hashed password directly with the one stored in the database
        if ($hashed_password === $password_hash) {
            echo "Login successful!";
            // Redirect to manager dashboard
            header("Location: manager.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/manager.css">
</head>
<body>
    <?php include 'includes/header.inc'; ?>
    <div class="login-container">
        <h2>Manager Login</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
        </form>
        <p>If you do not have an account, please <a href="registration.php">Register Here</a>.</p>
    </div>
    <?php include 'includes/footer.inc'; ?>
</body>
</html>
