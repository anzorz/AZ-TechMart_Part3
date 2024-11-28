<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Order Receipt for AZ TechMart">
    <meta name="keywords" content="HTML5, Order Receipt, Payment"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>AZ TechMart - Order Receipt</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/receipt.css">
    <script src="scripts/part2.js" defer></script>
    <script src="scripts/enhancements.js" defer></script>
</head>
<body>
    <?php include 'includes/header.inc'; ?>

    <!-- Receipt Section -->
    <section class="receipt-section">
        <img src="images/AZ_TechMart_Logo.png" alt="AZ TechMart Logo" class="company-logo">
        <h1>Order Receipt</h1>

        <?php
        include 'settings.php';  // Include the database connection

        // Start the session to retrieve the order ID
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the order ID is available in the session
        if (!isset($_SESSION['order_id'])) {
            echo "<p>Order not found. Please go back and place your order again.</p>";
            exit();
        }

        // Retrieve the order ID from the session
        $order_id = $_SESSION['order_id'];

        // Fetch the order details from the database
        $sql = "SELECT * FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the order exists
        if ($result && $result->num_rows > 0) {
            // Fetch the order data
            $row = $result->fetch_assoc();

            // Display the order details in a styled format
            echo "<div class='receipt-details'>";
            echo "<p>Thank you for your order, " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</p>";
            echo "<p><strong>Order ID:</strong> " . htmlspecialchars($row['order_id']) . "</p>";
            echo "<p><strong>Street Address:</strong> " . htmlspecialchars($row['street_address']) . "</p>";
            echo "<p><strong>Suburb:</strong> " . htmlspecialchars($row['suburb']) . "</p>";
            echo "<p><strong>State:</strong> " . htmlspecialchars($row['state']) . "</p>";
            echo "<p><strong>Postcode:</strong> " . htmlspecialchars($row['postcode']) . "</p>";
            echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($row['phone_number']) . "</p>";
            echo "<p><strong>Preferred Contact Method:</strong> " . htmlspecialchars($row['preferred_contact']) . "</p>";
            echo "<p><strong>Product:</strong> " . htmlspecialchars($row['product']) . "</p>";
            echo "<p><strong>Product Features:</strong> " . htmlspecialchars($row['product_features']) . "</p>";
            echo "<p><strong>Comments:</strong> " . htmlspecialchars($row['comment']) . "</p>";
            echo "<p><strong>Quantity:</strong> " . htmlspecialchars($row['product_quantity']) . "</p>";
            echo "<p><strong>Total Cost:</strong> $" . htmlspecialchars($row['order_cost']) . "</p>";
            echo "<p><strong>Order Status:</strong> " . htmlspecialchars($row['order_status']) . "</p>";
            echo "<p><strong>Order Time:</strong> " . htmlspecialchars($row['order_time']) . "</p>";
            echo "</div>";

            // Display barcode image
            echo "<div class='barcode'><img src='images/barcode-placeholder.png' alt='Order Barcode'></div>";
        } else {
            echo "<p>Order not found.</p>";
        }

        $stmt->close();  // Close the statement
        mysqli_close($conn);  // Close the connection
        ?>
    </section>

    <?php include 'includes/footer.inc'; ?>
</body>
</html>
