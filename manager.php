<?php
include 'settings.php';  // Include the database connection

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manager Order Report and Update Page for AZ TechMart">
    <meta name="keywords" content="HTML5, Manager, Order Report, Update Order"/>
    <meta name="author" content="M Anzor Yousuf"/>
    <title>AZ TechMart - Manager Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/manager.css">
    <script>
        // JavaScript to handle column sorting
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("ordersTable");
            switching = true;
            dir = "asc"; 
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount ++;      
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
</head>
<body>
    <?php include 'includes/header.inc'; ?>

    <div class="manager-container">
        <h1>Manager Order Report & Update Page</h1>
        <form method="get" action="manager.php">
            <label for="search">Search Orders:</label>
            <input type="text" id="search" name="search" placeholder="Search by customer name, product, etc." style="width: 50%;">
            <select name="filter" id="filter">
                <option value="">No Filter</option>
                <option value="all_orders">All Orders</option>
                <option value="customer_name">Customer Name</option>
                <option value="product">Product</option>
                <option value="status">Order Status</option>
                <option value="total_cost">Sort by Total Cost</option>
                <option value="order_time">Sort by Purchase Date & Time</option>
            </select>
            <a href="manager_logout.php" class="logout-btn">Logout</a>
            <input type="submit" value="Search">
        </form>

        <?php
        // Fetch orders based on search criteria
        $query = "SELECT * FROM orders";
        $params = [];

        // Add search condition if search query is provided
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = "%" . $_GET['search'] . "%";
            if (isset($_GET['filter']) && $_GET['filter'] == 'customer_name') {
                $query .= " WHERE first_name LIKE '$search' OR last_name LIKE '$search'";
            } elseif (isset($_GET['filter']) && $_GET['filter'] == 'product') {
                $query .= " WHERE product LIKE '$search'";
            } elseif (isset($_GET['filter']) && $_GET['filter'] == 'status') {
                $query .= " WHERE order_status LIKE '$search'";
            } else {
                $query .= " WHERE first_name LIKE '$search' OR last_name LIKE '$search' OR product LIKE '$search' OR order_id LIKE '$search'";
            }
        }

        // Add sorting options if selected
        if (isset($_GET['filter']) && $_GET['filter'] == 'total_cost') {
            $query .= " ORDER BY order_cost DESC";
        } elseif (isset($_GET['filter']) && $_GET['filter'] == 'order_time') {
            $query .= " ORDER BY order_time DESC";
        }

        // Execute query
        $result = $conn->query($query);
        ?>

        <table id="ordersTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Order ID</th>
                    <th onclick="sortTable(1)">Customer Name</th>
                    <th onclick="sortTable(2)">Product</th>
                    <th onclick="sortTable(3)">Order Date & Time</th>
                    <th onclick="sortTable(4)">Total Cost</th>
                    <th onclick="sortTable(5)">Order Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display orders
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['product']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['order_time']) . "</td>";
                        echo "<td>$" . htmlspecialchars($row['order_cost']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['order_status']) . "</td>";
                        echo "<td>";
                        echo "<a class='btn' href='manager.php?action=update&id=" . htmlspecialchars($row['order_id']) . "'>Update</a> ";
                        if ($row['order_status'] == 'PENDING') {
                            echo "<a class='btn' href='manager.php?action=cancel&id=" . htmlspecialchars($row['order_id']) . "'>Cancel</a>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <?php
        // Handle update and cancel actions
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $order_id = intval($_GET['id']);
            $action = $_GET['action'];

            if ($action == 'update') {
                $new_status = 'FULFILLED';
                $update_query = "UPDATE orders SET order_status = '$new_status' WHERE order_id = $order_id";
                if ($conn->query($update_query) === TRUE) {
                    echo "<p>Order status updated successfully.</p>";
                } else {
                    echo "<p>Error updating order status: " . htmlspecialchars($conn->error) . "</p>";
                }
            } elseif ($action == 'cancel') {
                $delete_query = "DELETE FROM orders WHERE order_id = $order_id AND order_status = 'PENDING'";
                if ($conn->query($delete_query) === TRUE) {
                    echo "<p>Order cancelled successfully.</p>";
                } else {
                    echo "<p>Error cancelling order: " . htmlspecialchars($conn->error) . "</p>";
                }
            }

            // Refresh page to reflect changes
            echo "<meta http-equiv='refresh' content='0;url=manager.php'>";
        }
        ?>

        <div class="query-box">
            <?php
            // Display the most popular product ordered
            $popular_query = "SELECT product, COUNT(*) AS product_count FROM orders GROUP BY product ORDER BY product_count DESC LIMIT 1";
            $popular_result = $conn->query($popular_query);
            if ($popular_result && $popular_result->num_rows > 0) {
                $popular_row = $popular_result->fetch_assoc();
                echo "<h2>Most Popular Product Ordered: " . htmlspecialchars($popular_row['product']) . " (" . htmlspecialchars($popular_row['product_count']) . " orders)</h2>";
            }

            // Display the average number of orders per day
            $average_query = "SELECT AVG(order_count) AS average_orders_per_day FROM (SELECT COUNT(*) AS order_count FROM orders GROUP BY DATE(order_time)) AS daily_orders";
            $average_result = $conn->query($average_query);
            if ($average_result && $average_result->num_rows > 0) {
                $average_row = $average_result->fetch_assoc();
                echo "<h2>Average Number of Orders per Day: " . htmlspecialchars(round($average_row['average_orders_per_day'], 2)) . "</h2>";
            }
            ?>
        </div>
    </div>

    <?php include 'includes/footer.inc'; ?>
</body>
</html>
