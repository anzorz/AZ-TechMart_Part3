<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Step 1: Check if the enquiry form is submitted
if (isset($_POST["firstname"])) {
    // Step 2: Retrieve and sanitize form data
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = sanitize_input($_POST["firstname"]);
    $lastname = sanitize_input($_POST["lastname"]);
    $email = sanitize_input($_POST["email"]);
    $street = sanitize_input($_POST["street"]);
    $suburb = sanitize_input($_POST["suburb"]);
    $state = sanitize_input($_POST["state"]);
    $postcode = sanitize_input($_POST["postcode"]);
    $phone = sanitize_input($_POST["phone"]);
    $contact = isset($_POST["contact"]) ? sanitize_input($_POST["contact"]) : "";
    $products = isset($_POST["products"]) ? sanitize_input($_POST["products"]) : "";
    $quantity = sanitize_input($_POST["quantity"]);
    $comments = sanitize_input($_POST["comments"]);

    // Step 3: Validate form data
    $errors = [];

    // Validate firstname
    if (!preg_match("/^[a-zA-Z\s]*$/", $firstname)) {
        $errors[] = "Invalid first name. Only letters and spaces are allowed.";
    } elseif (strlen($firstname) > 25) {
        $errors[] = "First name must be 25 characters or less.";
    }

    // Validate lastname
    if (!preg_match("/^[a-zA-Z\s]*$/", $lastname)) {
        $errors[] = "Invalid last name. Only letters and spaces are allowed.";
    } elseif (strlen($lastname) > 25) {
        $errors[] = "Last name must be 25 characters or less.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Validate street address
    if (empty($street) || strlen($street) > 40) {
        $errors[] = "Street address must be provided and be 40 characters or less.";
    }

    // Validate suburb
    if (!preg_match("/^[a-zA-Z0-9\s]*$/", $suburb) || strlen($suburb) > 20) {
        $errors[] = "Invalid suburb. Only letters, numbers, and spaces are allowed, and it must be 20 characters or less.";
    }

    // Validate state
    $valid_states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
    if (!in_array($state, $valid_states)) {
        $errors[] = "Invalid state selection.";
    }

    // Validate postcode
    if (!preg_match("/^[0-9]{4}$/", $postcode)) {
        $errors[] = "Invalid postcode. It must be exactly 4 digits.";
    } else {
        // State-Postcode matching logic
        $state_postcode_map = [
            'VIC' => [3, 8],
            'NSW' => [1],
            'QLD' => [4, 9],
            'NT'  => [0],
            'WA'  => [6],
            'SA'  => [5],
            'TAS' => [7],
            'ACT' => [0]
        ];
        $first_digit_postcode = intval(substr($postcode, 0, 1));
        if (!in_array($first_digit_postcode, $state_postcode_map[$state])) {
            $errors[] = "Invalid postcode for the selected state.";
        }
    }

    // Validate phone number
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid phone number. It must be exactly 10 digits.";
    }

    // Validate preferred contact method
    $valid_contacts = ["email", "post", "phone"];
    if (!in_array($contact, $valid_contacts)) {
        $errors[] = "Invalid preferred contact method.";
    }

    // Validate product selection
    if (empty($products)) {
        $errors[] = "Please select at least one product.";
    }

    // Validate quantity
    if (!is_numeric($quantity) || $quantity < 1 || $quantity > 100) {
        $errors[] = "Invalid quantity. Please enter a value between 1 and 100.";
    }

    // Validate comments
    if (strlen($comments) > 200) {
        $errors[] = "Comments must be 200 characters or less.";
    }

    // Step 4: Handle validation result
    if (!empty($errors)) {
        // Display errors using JavaScript alert and prevent form submission
        echo '<script>alert("' . implode('\n', $errors) . '"); window.history.back();</script>';
        exit();
    } else {
        // If no errors, store validated data in session
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["email"] = $email;
        $_SESSION["street"] = $street;
        $_SESSION["suburb"] = $suburb;
        $_SESSION["state"] = $state;
        $_SESSION["postcode"] = $postcode;
        $_SESSION["phone"] = $phone;
        $_SESSION["contact"] = $contact;
        $_SESSION["products"] = $products;
        $_SESSION["quantity"] = $quantity;
        $_SESSION["comments"] = $comments;

        // Proceed to payment details section
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Payment page for AZ TechMart">
    <meta name="keywords" content="HTML5, Payment"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>AZ TechMart - Payment</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/part2.js" defer></script>
    <script src="scripts/enhancements.js" defer></script>
</head>
<body>
    <?php include 'includes/header.inc'; ?>

    <!-- Payment Section -->
    <section class="payment-section">
        <h1>Payment Details</h1>

          <!-- Customer Details Section -->
          <section class="customer-details">
            <h2>Customer Details</h2>
            <p><strong>Name:</strong> <span id="customerName"></span></p>
            <p><strong>Email:</strong> <span id="customerEmail"></span></p>
            <p><strong>Address:</strong> <span id="customerAddress"></span></p>
            <p><strong>Selected Product:</strong> <span id="selectedProduct"></span></p>
            <p><strong>Quantity:</strong> <span id="productQuantity"></span></p>
            <p><strong>Total Price:</strong> <span id="totalPrice"></span></p>
        </section>

        <!-- Payment Form Section -->
        <section>
            <form action="process_order.php" method="post" novalidate>
                <fieldset>
                    <legend>Credit Card Payment Details</legend>

                    <label for="cardType">Credit Card Type:</label>
                    <select id="cardType" name="cardType" required>
                        <option value="">Select a Card Type...</option>
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="American Express">American Express</option>
                    </select>

                    <!-- Input fields in payment.html -->
                    <label for="cardName">Name on Credit Card:</label>
                    <input type="text" id="cardName" placeholder="Name on Credit Card" name="cardName" required>

                    <label for="cardNumber">Credit Card Number:</label>
                    <input type="text" id="cardNumber" name="cardNumber" maxlength="16" placeholder="Enter 15 or 16 digits" required>

                    <label for="expiryDate">Expiry Date (MM-YY):</label>
                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM-YY" required>

                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" maxlength="3" placeholder="Enter 3 digits" required>
                </fieldset>

                <!-- Buttons Section -->
                <section class="form-buttons">
                    <input type="submit" value="Check-Out">
                    <button type="button" id="cancelOrderBtn">Cancel Order</button>
                </section>
            </form>
        </section>
    </section>

    <?php include 'includes/footer.inc'; ?>
</body>
</html>
