<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML5, JavaScript, Enhancements"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <meta name="description" content="Applied JS Enhancements for the Web Application">
    <title>JavaScript Enhancements Documentation</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'includes/header.inc'; ?>

    <section class="enhancements">
        <h1>JavaScript Enhancements Documentation</h1>
    </section>

    <main class="enhancement-section">
        <!-- Enhancement 1 -->
        <section class="enhancement">
            <h2>Enhancement 1: Checkbox for "Billing Address Different from Delivery Address"</h2>
            <p><strong>Description:</strong> A checkbox is added on the "Enquire" page that, when checked, dynamically displays additional input fields for entering a billing address different from the delivery address.</p>
            <p><strong>Interaction:</strong> The user triggers the enhancement by checking the "Billing Address Different from Delivery Address" checkbox. This action displays additional input fields for the billing address, allowing users to enter the necessary details.</p>
            <p><strong>Implementation:</strong> The enhancement was implemented using JavaScript in the <code>enhancements.js</code> file. The script listens for a "change" event on the checkbox. When the checkbox is checked, the billing address section is displayed; when unchecked, it is hidden.</p>
            <p><strong>Code Example:</strong></p>
            <pre>
<code>
// enhancements.js
document.addEventListener("DOMContentLoaded", function () {
    const billingCheckbox = document.getElementById("billingCheckbox");
    const billingSection = document.getElementById("billingSection");

    billingCheckbox.addEventListener("change", function () {
        if (billingCheckbox.checked) {
            billingSection.style.display = "block";
        } else {
            billingSection.style.display = "none";
        }
    });
});
            </code>
            </pre>
            <p><strong>Link to Implementation:</strong> <a href="enquire.html">Enquire Page</a></p>
            <p><strong>References:</strong> No third-party sources were used to create this enhancement.</p>
        </section>

        <!-- Enhancement 2 -->
        <section class="enhancement">
            <h2>Enhancement 2: Concatenation of First and Last Name to Pre-fill "Name on Credit Card"</h2>
            <p><strong>Description:</strong> On the "Enquire" page, the user's first and last names are concatenated and stored in session storage. This stored full name is then automatically used to pre-fill the "Name on Credit Card" field on the "Payment" page.</p>
            <p><strong>Interaction:</strong> The enhancement is triggered when the user enters their first and last names on the "Enquire" page. JavaScript captures these inputs, concatenates them, and stores the full name. When the user navigates to the "Payment" page, this stored name is automatically retrieved and filled into the "Name on Credit Card" field.</p>
            <p><strong>Implementation:</strong> The enhancement was implemented using JavaScript in the <code>part2.js</code> and <code>enhancements.js</code> files. The script listens for input events on the first and last name fields, concatenates them, and stores the result in session storage. On the "Payment" page, the stored name is retrieved and used to pre-fill the "Name on Credit Card" field.</p>
            <p><strong>Code Example:</strong></p>
            <pre>
<code>
// enhancements.js
document.addEventListener("DOMContentLoaded", function () {
    const firstNameField = document.getElementById("firstName");
    const lastNameField = document.getElementById("lastName");

    function storeFullName() {
        const fullName = `${firstNameField.value} ${lastNameField.value}`;
        sessionStorage.setItem("fullName", fullName);
    }

    firstNameField.addEventListener("input", storeFullName);
    lastNameField.addEventListener("input", storeFullName);

    // On the payment page
    const nameOnCardField = document.getElementById("nameOnCard");
    if (nameOnCardField) {
        nameOnCardField.value = sessionStorage.getItem("fullName") || "";
    }
});
            </code>
            </pre>
            <p><strong>Link to Implementation:</strong> <a href="payment.html">Payment Page</a></p>
            <p><strong>References:</strong> No third-party sources were used to create this enhancement.</p>
        </section>
    </main>

    <?php include 'includes/footer.inc'; ?>
</body>
</html>
