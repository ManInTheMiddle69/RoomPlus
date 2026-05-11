<?php
include '../../connect.php';

// --- Total Revenue ---
$sql = "SELECT SUM(total_amount) as total_revenue FROM orders WHERE order_status != 'cancelled'";
$result = $conn->query($sql);
$total_revenue = $result->fetch_assoc()['total_revenue'];
$total_revenue = $total_revenue ? number_format($total_revenue, 2) : "0.00";

// --- Total Orders ---
$sql = "SELECT COUNT(*) as total_orders FROM orders";
$result = $conn->query($sql);
$total_orders = $result->fetch_assoc()['total_orders'];

// --- Total Customers ---
$sql = "SELECT COUNT(*) as total_customers FROM users";
$result = $conn->query($sql);
$total_customers = $result->fetch_assoc()['total_customers'];

// --- Average Rating ---
// Since no rating column exists, this gives a static value (as in original)
$average_rating = "4.8";

// --- Monthly Sales (last 6 months from orders) ---
$monthly_sales = [];
$sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') as month, SUM(total_amount) as sales 
        FROM orders 
        WHERE order_status != 'cancelled' 
        GROUP BY DATE_FORMAT(order_date, '%Y-%m') 
        ORDER BY month DESC 
        LIMIT 6";
$result = $conn->query($sql);
$months = [];
$sales_values = [];
while ($row = $result->fetch_assoc()) {
    $months[] = date("F", strtotime($row['month'] . "-01"));
    $sales_values[] = $row['sales'];
}
$months = array_reverse($months);
$sales_values = array_reverse($sales_values);
$max_sales = !empty($sales_values) ? max($sales_values) : 1;

// --- Payment Methods Distribution ---
$payment_methods = [];
$sql = "SELECT payment_method, COUNT(*) as count FROM orders GROUP BY payment_method";
$result = $conn->query($sql);
$total_orders_for_payment = 0;
while ($row = $result->fetch_assoc()) {
    $payment_methods[$row['payment_method']] = $row['count'];
    $total_orders_for_payment += $row['count'];
}
$payment_chart_data = [];
if ($total_orders_for_payment > 0) {
    foreach ($payment_methods as $method => $count) {
        $percent = round(($count / $total_orders_for_payment) * 100);
        $payment_chart_data[] = ['method' => ucfirst(str_replace('_', ' ', $method)), 'percent' => $percent];
    }
} else {
    $payment_chart_data = [['method' => 'No Data', 'percent' => 100]];
}

// --- Order Status Overview ---
$order_statuses = [];
$sql = "SELECT order_status, COUNT(*) as count FROM orders GROUP BY order_status";
$result = $conn->query($sql);
$total_orders_for_status = 0;
while ($row = $result->fetch_assoc()) {
    $order_statuses[$row['order_status']] = $row['count'];
    $total_orders_for_status += $row['count'];
}
$status_colors = [
    'pending' => '#f59e0b',
    'processing' => '#3b82f6',
    'shipped' => '#8b5cf6',
    'delivered' => '#10b981',
    'cancelled' => '#ef4444'
];

// --- Top Selling Products (by quantity) ---
$top_products = [];
$sql = "SELECT p.name, SUM(oi.quantity) as total_sold 
        FROM order_items oi
        JOIN products p ON oi.product_id = p.product_id
        JOIN orders o ON oi.order_id = o.order_id
        WHERE o.order_status != 'cancelled'
        GROUP BY p.product_id
        ORDER BY total_sold DESC
        LIMIT 5";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $top_products[] = $row;
}

// --- Average Order Value ---
$avg_order_value = $total_orders > 0 ? number_format($total_revenue / $total_orders, 2) : "0.00";

// --- Active Customers (customers who placed an order) ---
$sql = "SELECT COUNT(DISTINCT user_id) as active_customers FROM orders";
$result = $conn->query($sql);
$active_customers = $result->fetch_assoc()['active_customers'];

// --- Customer Satisfaction (fixed as no data, keep original) ---
$customer_satisfaction = "94%";
$avg_delivery_time = "2.4 days";

// --- Goals Progress (dynamically calculated) ---
$revenue_target = 2500000;
$revenue_progress = ($total_revenue / $revenue_target) * 100;
$revenue_progress = min(100, round($revenue_progress));

$customer_target = 5000;
$customer_progress = min(100, round(($total_customers / $customer_target) * 100));

$order_target = 10000;
$order_progress = min(100, round(($total_orders / $order_target) * 100));

$retention_target = 85;
$retention_progress = 92; // static as per original
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../back-end-style.css">
    <title>Nexus Analytics | Futuristic Dashboard</title>
</head>
<body class="analytics-body">
    <div class="analytics-header">
        <h1>📊 Analytics Dashboard</h1>
        <p>Real-time business intelligence & performance metrics</p>
    </div>

    <!-- Stats Cards -->
    <div class="analytics-statsGrid">
        <div class="analytics-statCard">
            <div class="analytics-statIcon">💰</div>
            <div class="analytics-statValue">$<?php echo $total_revenue; ?></div>
            <div class="analytics-statLabel">Total Revenue</div>
            <div class="analytics-statTrend">↑ +12.5% vs last month</div>
        </div>
        <div class="analytics-statCard">
            <div class="analytics-statIcon">📦</div>
            <div class="analytics-statValue"><?php echo number_format($total_orders); ?></div>
            <div class="analytics-statLabel">Total Orders</div>
            <div class="analytics-statTrend">↑ +8.3% vs last month</div>
        </div>
        <div class="analytics-statCard">
            <div class="analytics-statIcon">👥</div>
            <div class="analytics-statValue"><?php echo number_format($total_customers); ?></div>
            <div class="analytics-statLabel">Total Customers</div>
            <div class="analytics-statTrend">↑ +15.2% vs last month</div>
        </div>
        <div class="analytics-statCard">
            <div class="analytics-statIcon">⭐</div>
            <div class="analytics-statValue"><?php echo $average_rating; ?></div>
            <div class="analytics-statLabel">Average Rating</div>
            <div class="analytics-statTrend">↑ +0.3 vs last month</div>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="analytics-chartsContainer">
        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>📈</span> Monthly Sales Overview</div>
            <div class="analytics-barChart">
                <?php if (!empty($months)): ?>
                    <?php for ($i = 0; $i < count($months); $i++): ?>
                        <?php $width = ($sales_values[$i] / $max_sales) * 100; ?>
                        <div class="analytics-barItem">
                            <div class="analytics-barLabel"><?php echo $months[$i]; ?></div>
                            <div class="analytics-barContainer"><div class="analytics-barFill" style="width: <?php echo $width; ?>%">$<?php echo number_format($sales_values[$i]); ?></div></div>
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <div class="analytics-barItem">No sales data available.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>💳</span> Payment Methods Distribution</div>
            <div class="analytics-donutContainer">
                <div>
                    <div class="analytics-donut"></div>
                    <div class="analytics-donutLabel">Total: <?php echo $total_orders_for_payment; ?> orders</div>
                </div>
                <div class="analytics-legend">
                    <?php foreach ($payment_chart_data as $payment): ?>
                        <div class="analytics-legendItem">
                            <div class="analytics-legendColor" style="background: 
                                <?php echo $payment['method'] == 'Credit Card' ? '#3b82f6' : 
                                    ($payment['method'] == 'Paypal' ? '#10b981' : 
                                    ($payment['method'] == 'Cod' ? '#f59e0b' : '#ef4444')); ?>">
                            </div>
                            <span><?php echo $payment['method']; ?> (<?php echo $payment['percent']; ?>%)</span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="analytics-chartsContainer">
        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>🔄</span> Order Status Overview</div>
            <div class="analytics-barChart">
                <?php foreach ($order_statuses as $status => $count): ?>
                    <?php $width = $total_orders_for_status > 0 ? ($count / $total_orders_for_status) * 100 : 0; ?>
                    <div class="analytics-barItem">
                        <div class="analytics-barLabel"><?php echo ucfirst($status); ?></div>
                        <div class="analytics-barContainer">
                            <div class="analytics-barFill" style="width: <?php echo $width; ?>%; background: linear-gradient(90deg, <?php echo $status_colors[$status] ?? '#6b7280'; ?>, <?php echo $status_colors[$status] ?? '#9ca3af'; ?>)">
                                <?php echo $count; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>🏆</span> Top Selling Products</div>
            <div class="analytics-topProducts">
                <?php foreach ($top_products as $product): ?>
                    <div class="analytics-productRow">
                        <span class="analytics-productName">⚡ <?php echo htmlspecialchars($product['name']); ?></span>
                        <span class="analytics-productSales"><?php echo $product['total_sold']; ?> units</span>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($top_products)): ?>
                    <div class="analytics-productRow">No products sold yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Mini Stats -->
    <div class="analytics-miniGrid">
        <div class="analytics-miniCard">
            <div class="analytics-miniValue">$<?php echo $avg_order_value; ?></div>
            <div class="analytics-miniLabel">Average Order Value</div>
        </div>
        <div class="analytics-miniCard">
            <div class="analytics-miniValue"><?php echo $avg_delivery_time; ?></div>
            <div class="analytics-miniLabel">Avg Delivery Time</div>
        </div>
        <div class="analytics-miniCard">
            <div class="analytics-miniValue"><?php echo $customer_satisfaction; ?></div>
            <div class="analytics-miniLabel">Customer Satisfaction</div>
        </div>
        <div class="analytics-miniCard">
            <div class="analytics-miniValue"><?php echo number_format($active_customers); ?></div>
            <div class="analytics-miniLabel">Active Customers</div>
        </div>
    </div>

    <!-- Progress Goals -->
    <div class="analytics-progressSection">
        <div class="analytics-progressTitle">🎯 2025 Annual Goals Progress</div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Revenue Target ($2.5M)</span><span>$<?php echo number_format($total_revenue, 2); ?> / $2,500,000</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: <?php echo $revenue_progress; ?>%"><?php echo $revenue_progress; ?>%</div></div>
        </div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Customer Acquisition (5,000)</span><span><?php echo number_format($total_customers); ?> / 5,000</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: <?php echo $customer_progress; ?>%"><?php echo $customer_progress; ?>%</div></div>
        </div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Order Fulfillment (10,000)</span><span><?php echo number_format($total_orders); ?> / 10,000</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: <?php echo $order_progress; ?>%"><?php echo $order_progress; ?>%</div></div>
        </div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Customer Retention (85%)</span><span><?php echo $retention_progress; ?>% / 85%</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: <?php echo $retention_progress; ?>%"><?php echo $retention_progress; ?>%</div></div>
        </div>
    </div>
</body>
</html>