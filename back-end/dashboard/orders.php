<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../back-end-style.css">
    <title>Nexus Orders | Futuristic Orders Table</title>
</head>
<body class="order-body">
    <?php
    // Include database connection
    include '../../connect.php';

    // Fetch orders with user details using JOIN
    $sql = "SELECT o.order_id, o.user_id, o.order_date, o.payment_method, o.order_status,
                   u.full_name, u.phone, u.address_line1, u.city, u.country
            FROM orders o
            LEFT JOIN users u ON o.user_id = u.user_id
            ORDER BY o.order_date DESC";

    $result = mysqli_query($conn, $sql);
    
    // Check if query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    ?>

    <!-- Controls -->
    <div class="order-controls">
        <div class="order-searchWrapper">
            <span class="order-searchIcon">🔍</span>
            <input type="text" class="order-searchBar" placeholder="Search by customer, phone, address...">
        </div>
        <div class="order-filterWrapper">
            <button class="order-filterBtn">⚡ FILTERS</button>
        </div>
        <div class="order-dateWrapper">
            <select class="order-dateSelect">
                <option value="">📅 SELECT DATE</option>
                <option value="today">Today</option>
                <option value="yesterday">Yesterday</option>
                <option value="last7">Last 7 Days</option>
                <option value="last30">Last 30 Days</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="order-tableContainer">
        <table class="order-mainTable">
            <thead>
                <tr>
                    <th><input type="checkbox" class="order-checkbox"></th>
                    <th>ID</th>
                    <th>CUSTOMER NAME</th>
                    <th>ADDED DATE</th>
                    <th>TEL</th>
                    <th>ADDRESS</th>
                    <th>PAYMENT METHOD</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any orders in the database
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each order and display in table
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Generate formatted order ID
                        $formatted_order_id = "#ORD" . str_pad($row['order_id'], 3, "0", STR_PAD_LEFT);
                        
                        // Combine address fields
                        $full_address = $row['address_line1'];
                        if (!empty($row['city'])) {
                            $full_address .= ", " . $row['city'];
                        }
                        if (!empty($row['country'])) {
                            $full_address .= ", " . $row['country'];
                        }
                        
                        // Format the order date
                        $order_date = "";
                        if (!empty($row['order_date'])) {
                            $timestamp = strtotime($row['order_date']);
                            $order_date = date("Y-m-d", $timestamp);
                        }
                        
                        // Set payment method class and icon
                        $payment_class = "order-paymentMethod";
                        $payment_icon = "💳";
                        $payment_method_display = $row['payment_method'];
                        
                        switch(strtolower($row['payment_method'])) {
                            case 'credit card':
                            case 'credit':
                                $payment_class .= " order-paymentCredit";
                                $payment_icon = "💳";
                                $payment_method_display = "Credit Card";
                                break;
                            case 'paypal':
                                $payment_class .= " order-paymentPaypal";
                                $payment_icon = "💰";
                                $payment_method_display = "PayPal";
                                break;
                            case 'cash':
                            case 'cash on delivery':
                                $payment_class .= " order-paymentCash";
                                $payment_icon = "💵";
                                $payment_method_display = "Cash on Delivery";
                                break;
                            default:
                                $payment_class .= " order-paymentCredit";
                                $payment_icon = "💳";
                        }
                        
                        // Set status select class and options
                        $status_class = "order-statusSelect";
                        $status_lower = strtolower($row['order_status']);
                        
                        switch($status_lower) {
                            case 'pending':
                                $status_class .= " pending";
                                break;
                            case 'processing':
                                $status_class .= " processing";
                                break;
                            case 'shipped':
                                $status_class .= " shipped";
                                break;
                            case 'delivered':
                                $status_class .= " delivered";
                                break;
                            case 'cancelled':
                                $status_class .= " cancelled";
                                break;
                            default:
                                $status_class .= " pending";
                        }
                        ?>
                        <tr>
                            <td><input type="checkbox" class="order-checkbox"></td>
                            <td><?php echo htmlspecialchars($formatted_order_id); ?></td>
                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($order_date); ?></td>
                            <td class="order-phone"><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td class="order-address"><?php echo htmlspecialchars($full_address); ?></td>
                            <td>
                                <span class="<?php echo $payment_class; ?>">
                                    <?php echo $payment_icon . " " . htmlspecialchars($payment_method_display); ?>
                                </span>
                            </td>
                            <td>
                                <select class="<?php echo $status_class; ?>" data-order-id="<?php echo $row['order_id']; ?>">
                                    <option value="pending" <?php echo ($status_lower == 'pending') ? 'selected' : ''; ?>>⏳ Pending</option>
                                    <option value="processing" <?php echo ($status_lower == 'processing') ? 'selected' : ''; ?>>🔄 Processing</option>
                                    <option value="shipped" <?php echo ($status_lower == 'shipped') ? 'selected' : ''; ?>>📦 Shipped</option>
                                    <option value="delivered" <?php echo ($status_lower == 'delivered') ? 'selected' : ''; ?>>✅ Delivered</option>
                                    <option value="cancelled" <?php echo ($status_lower == 'cancelled') ? 'selected' : ''; ?>>❌ Cancelled</option>
                                </select>
                             </td>
                            <td>
                                <button class="order-deleteBtn" data-order-id="<?php echo $row['order_id']; ?>">Delete</button>
                             </td>
                         </>
                        <?php
                    }
                } else {
                    // Display a message if no orders found
                    ?>
                    <tr class="order-row">
                        <td colspan="9" style="text-align: center; padding: 40px;">No orders found in the database.</td>
                    </tr>
                    <?php
                }
                
                // Free result set and close connection
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>