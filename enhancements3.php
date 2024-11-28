<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML5, PHP, Enhancements"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <meta name="description" content="PHP Enhancements for the Web Application">
    <title>JavaScript Enhancements Documentation</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'includes/header.inc'; ?>

    <section class="enhancements">
        <h1>PHP Enhancements Documentation</h1>
    </section>

    <main class="enhancement-section">
        <!-- Enhancement 3 -->
        <section class="enhancement">
            <h2>Manager Registration and Security</h2>
            <p><strong>What it Does:</strong></p>
            <p>This enhancement allows a new manager to register with the system, providing a secure way to store manager credentials in the database. The manager registration page is linked to the login page to create a smooth flow where a manager can register and subsequently log in.</p>

            <p><strong>How it Goes Beyond Requirements:</strong></p>
            <p>The requirement was to add functionality to enable managers to interact with the backend securely. This enhancement not only ensures a dedicated registration mechanism for managers but also includes user interface elements that guide unregistered managers towards secure registration before login. This approach goes beyond typical CRUD operations by integrating session-based login security and server-side validation.</p>

            <p><strong>Implementation Details:</strong></p>
            <p>The enhancement was implemented with a combination of PHP, MySQL, and secure coding practices. Passwords are currently hashed using the <code>md5()</code> function for educational purposes. However, it is explicitly noted that MD5 is not recommended for commercial use due to its vulnerabilities and susceptibility to brute-force attacks. In a real-world scenario, a more secure hashing algorithm like <code>password_hash()</code> with a strong salt would be used to protect sensitive information.</p>

            <p><strong>Reminder for Future Use:</strong></p>
            <p>For future implementation in a production environment, ensure that <code>md5()</code> is replaced with a stronger hashing mechanism, such as Bcrypt or Argon2. Also, implement account lockout mechanisms after multiple failed login attempts to add an extra layer of security.</p>

            <p><strong>Linked Pages:</strong></p>
            <ul>
                <li><a href="manager_login.php">Manager Login Page</a></li>
                <li><a href="registration.php">Manager Registration Page</a></li>
            </ul>
        </section>

        <!-- Enhancement 2 -->
        <section class="enhancement">
            <h2>Advanced Manager Reports: Popular Product & Average Orders</h2>
            <p><strong>What it Does:</strong></p>
            <p>This enhancement provides additional insights to the manager by implementing advanced queries that determine the most popular product and calculate the average number of orders per day. This feature allows managers to make more informed decisions based on the data.</p>

            <p><strong>How it Goes Beyond Requirements:</strong></p>
            <p>The requirement was to enhance the manager's ability to view and manage orders. This enhancement goes beyond basic reporting by adding valuable metrics that help in strategic decision-making. Knowing the most popular product helps focus on inventory management and marketing, while the average orders per day help with understanding sales trends.</p>

            <p><strong>Implementation Details:</strong></p>
            <p>The enhancement was implemented using MySQL queries that aggregate data to find the most popular product and calculate the average number of orders per day. The <code>SELECT</code> statement with <code>GROUP BY</code> and <code>ORDER BY</code> was used for the popular product, while a nested query with <code>AVG()</code> was used for calculating the average orders per day. These queries are displayed on the manager dashboard, providing real-time insights.</p>

            <p><strong>Linked Page:</strong></p>
            <ul>
                <li><a href="manager.php">Manager Page</a></li>
            </ul>
        </section>
    </main>
