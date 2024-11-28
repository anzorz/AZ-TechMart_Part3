<?php
include 'settings.php';  // Include the database connection

// Start the session to retrieve stored data
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Payment Validation (From payment.php)
// Sanitize payment inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$card_type = sanitize_input($_POST['cardType']);
$card_number = sanitize_input($_POST['cardNumber']);
$card_expiry = sanitize_input($_POST['expiryDate']);
$card_cvv = sanitize_input($_POST['cvv']);
$card_name = sanitize_input($_POST['cardName']);

// Validate credit card type
$valid_card_types = ['Visa', 'MasterCard', 'American Express'];
if (!in_array($card_type, $valid_card_types)) {
    die("Invalid credit card type.");
}

// Validate credit card number based on type
if ($card_type == 'Visa' && !preg_match("/^4[0-9]{15}$/", $card_number)) {
    die("Invalid Visa card number.");
} elseif ($card_type == 'MasterCard' && !preg_match("/^5[1-5][0-9]{14}$/", $card_number)) {
    die("Invalid MasterCard number.");
} elseif ($card_type == 'American Express' && !preg_match("/^3[47][0-9]{13}$/", $card_number)) {
    die("Invalid American Express card number.");
}

// Validate card expiry (MM-YY format)
if (!preg_match("/^(0[1-9]|1[0-2])-[0-9]{2}$/", $card_expiry)) {
    die("Invalid card expiry date format. Please use MM-YY.");
}

// Validate CVV (3 digits)
if (!preg_match("/^[0-9]{3}$/", $card_cvv)) {
    die("Invalid CVV. Must be exactly 3 digits.");
}

// Validate name on the card (max 40 characters, alphabetic)
if (!preg_match("/^[a-zA-Z\s]{1,40}$/", $card_name)) {
    die("Invalid name on the card. Only letters and spaces are allowed, and it must be 40 characters or less.");
}

// Check if the payment form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 1: Retrieve data from the session and payment form
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $email = $_SESSION["email"];
    $street = $_SESSION["street"];
    $suburb = $_SESSION["suburb"];
    $state = $_SESSION["state"];
    $postcode = $_SESSION["postcode"];
    $phone = $_SESSION["phone"];
    $contact = $_SESSION["contact"];
    $products = $_SESSION["products"];
    $quantity = $_SESSION["quantity"];
    $comments = $_SESSION["comments"];

    // Step 2: Define product prices
    $product_prices = array(
        "Samsung M8" => 949,
        "LG 32SQ730S" => 549,
        "Samsung Odyssey G5" => 497,
        "LG 32UN880-B" => 949,
        "Acer Nitro XZ322Q V" => 388,
        "Acer EI491CR" => 1239,
        "MSI 34 MAG 345CQR" => 638
    );

    // Calculate the total cost of the order based on selected product and quantity
    $order_cost = 0;
    if (array_key_exists($products, $product_prices)) {
        $order_cost = $product_prices[$products] * intval($quantity);
    }

    // Check and create the 'orders' table if it does not exist
    $createTableQuery = "CREATE TABLE IF NOT EXISTS orders (
        order_id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(25),
        last_name VARCHAR(25),
        email VARCHAR(50),
        street_address VARCHAR(40),
        suburb VARCHAR(20),
        state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'),
        postcode VARCHAR(4),
        phone_number VARCHAR(10),
        preferred_contact ENUM('email', 'post', 'phone'),
        product VARCHAR(50),
        product_features TEXT,
        comment TEXT,
        product_quantity INT,
        order_cost DECIMAL(10, 2),
        order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        order_status ENUM('PENDING', 'FULFILLED', 'PAID', 'ARCHIVED') DEFAULT 'PENDING'
    )";
    
    if ($conn->query($createTableQuery) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }

    // Escape each variable to prevent SQL injection
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $email = mysqli_real_escape_string($conn, $email);
    $street = mysqli_real_escape_string($conn, $street);
    $suburb = mysqli_real_escape_string($conn, $suburb);
    $state = mysqli_real_escape_string($conn, $state);
    $postcode = mysqli_real_escape_string($conn, $postcode);
    $phone = mysqli_real_escape_string($conn, $phone);
    $contact = mysqli_real_escape_string($conn, $contact);
    $products = mysqli_real_escape_string($conn, $products);
    $quantity = (int)$quantity;
    $comments = mysqli_real_escape_string($conn, $comments);
    $order_cost = (float)$order_cost;

    // Step 4: Manually construct and execute the SQL query to insert order data
    $insertQuery = "INSERT INTO orders (first_name, last_name, email, street_address, suburb, state, postcode, phone_number, preferred_contact, product, product_quantity, comment, order_cost, order_status) 
    VALUES ('$firstname', '$lastname', '$email', '$street', '$suburb', '$state', '$postcode', '$phone', '$contact', '$products', $quantity, '$comments', $order_cost, 'PENDING')";

    // Step 5: Execute the query and check for success
    if ($conn->query($insertQuery) === TRUE) {
        // Ensure the order ID is properly set
        $order_id = $conn->insert_id;
        if ($order_id) {
            $_SESSION["order_id"] = $order_id;
        } else {
            die("Error: Unable to retrieve order ID.");
        }
    
        // Redirect to the receipt page after successful insertion
        header("Location: receipt.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // If this page is accessed directly, redirect to the enquiry form
    header("Location: enquire.php");
    exit();
}
?>
