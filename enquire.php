<?php
// Check if a session is already started and start one if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enquire about products at AZ TechMart">
    <meta name="keywords" content="HTML5, tags"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>AZ TechMart - Enquire</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/part2.js" defer></script>
    <script src="scripts/enhancements.js" defer></script>
</head>
<body>

  <?php include 'includes/header.inc'; ?>

    <!-- Enquiry Form Section -->
    <section class="enquiry-form">
        <h1>Product Enquiry</h1>
        <form action="payment.php" method="post" novalidate>

            <!-- Personal Details Fieldset -->
            <fieldset>
                <legend>Personal Details</legend>

                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" maxlength="25" pattern="[A-Za-z\s]+" required>

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" maxlength="25" pattern="[A-Za-z\s]+" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <!-- Address Fieldset -->
                <fieldset>
                    <legend>Address</legend>

                    <label for="street">Street Address:</label>
                    <input type="text" id="street" name="street" maxlength="40" required>

                    <label for="suburb">Suburb/Town:</label>
                    <input type="text" id="suburb" name="suburb" maxlength="20" required>

                    <label for="state">State:</label>
                    <select name="state" id="state" required>
                        <option value="">Select.</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>

                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" pattern="\d{4}" title="Please enter a 4-digit postcode" required>
                </fieldset>
            </fieldset>

            <!-- Checkbox to show/hide billing address section -->
            <label>
                <input type="checkbox" id="billing-checkbox"> Billing address different from Delivery Address
            </label>

            <!-- Billing address section -->
            <section id="billing-address-section" style="display: none;">
                <h3>Billing Address</h3>

                <label for="billing-street">Street:</label>
                <input type="text" id="billing-street" name="billing-street">

                <label for="billing-suburb">Suburb:</label>
                <input type="text" id="billing-suburb" name="billing-suburb">

                <label for="billing-state">State:</label>
                <select id="billing-state" name="billing-state">
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>

                <label for="billing-postcode">Postcode:</label>
                <input type="text" id="billing-postcode" name="billing-postcode">
            </section>

            <!-- Contact Details Fieldset -->
            <fieldset>
                <legend>Contact Details</legend>

                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" maxlength="10" pattern="\d{10}" placeholder="Enter 10 digits" required>

                <label>Preferred Contact Method:</label>
                <input type="radio" id="emailContact" name="contact" value="email" required>
                <label for="emailContact">Email</label>

                <input type="radio" id="postContact" name="contact" value="post">
                <label for="postContact">Post</label>

                <input type="radio" id="phoneContact" name="contact" value="phone">
                <label for="phoneContact">Phone</label>
            </fieldset>

            <!-- Product Details Fieldset -->
            <fieldset>
                <legend>Product Enquiry</legend>

                <!-- Product Selection in Checkbox Format with Prices -->
                <label>Select Products:</label><br>
                <input type="checkbox" id="product1" name="products" value="Samsung M8">
                <label for="product1">Samsung 32" M8 4K Smart Monitor - $949</label><br>

                <input type="checkbox" id="product2" name="products" value="LG 32SQ730S">
                <label for="product2">LG 32SQ730S - $549</label><br>

                <input type="checkbox" id="product3" name="products" value="Samsung Odyssey G5">
                <label for="product3">Samsung Odyssey G5 G50D - $497</label><br>

                <input type="checkbox" id="product4" name="products" value="LG 32UN880-B">
                <label for="product4">LG 32UN880-B - $949</label><br>

                <input type="checkbox" id="product5" name="products" value="Acer Nitro XZ322Q V">
                <label for="product5">Acer Nitro XZ322Q V - $388</label><br>

                <input type="checkbox" id="product6" name="products" value="Acer EI491CR">
                <label for="product6">Acer EI491CR - $1,239</label><br>

                <input type="checkbox" id="product7" name="products" value="MSI 34 MAG 345CQR">
                <label for="product7">MSI 34" MAG 345CQR - $638</label><br>

                <!-- Quantity Field -->
                <label for="quantity">Select Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100" required><br>

            </fieldset>

            <!-- Comment Section -->
            <label for="comments">Additional Comments:</label>
            <textarea id="comments" name="comments" placeholder="Enter any specific requests or questions here."></textarea>

            <!-- Submit Button -->
            <input type="submit" value="Pay Now">
        </form>
    </section>

    <?php include 'includes/footer.inc'; ?>
    
</body>
</html>
