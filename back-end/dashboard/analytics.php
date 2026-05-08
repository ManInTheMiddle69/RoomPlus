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
            <div class="analytics-statValue">$124,582</div>
            <div class="analytics-statLabel">Total Revenue</div>
            <div class="analytics-statTrend">↑ +12.5% vs last month</div>
        </div>
        <div class="analytics-statCard">
            <div class="analytics-statIcon">📦</div>
            <div class="analytics-statValue">1,847</div>
            <div class="analytics-statLabel">Total Orders</div>
            <div class="analytics-statTrend">↑ +8.3% vs last month</div>
        </div>
        <div class="analytics-statCard">
            <div class="analytics-statIcon">👥</div>
            <div class="analytics-statValue">3,421</div>
            <div class="analytics-statLabel">Total Customers</div>
            <div class="analytics-statTrend">↑ +15.2% vs last month</div>
        </div>
        <div class="analytics-statCard">
            <div class="analytics-statIcon">⭐</div>
            <div class="analytics-statValue">4.8</div>
            <div class="analytics-statLabel">Average Rating</div>
            <div class="analytics-statTrend">↑ +0.3 vs last month</div>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="analytics-chartsContainer">
        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>📈</span> Monthly Sales Overview</div>
            <div class="analytics-barChart">
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">January</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 65%">$42,500</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">February</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 72%">$48,200</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">March</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 85%">$56,800</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">April</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 78%">$52,400</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">May</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 92%">$61,300</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">June</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 100%">$67,800</div></div>
                </div>
            </div>
        </div>

        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>💳</span> Payment Methods Distribution</div>
            <div class="analytics-donutContainer">
                <div>
                    <div class="analytics-donut"></div>
                    <div class="analytics-donutLabel">Total: 1,847 orders</div>
                </div>
                <div class="analytics-legend">
                    <div class="analytics-legendItem"><div class="analytics-legendColor" style="background: #3b82f6"></div><span>Credit Card (35%)</span></div>
                    <div class="analytics-legendItem"><div class="analytics-legendColor" style="background: #10b981"></div><span>PayPal (20%)</span></div>
                    <div class="analytics-legendItem"><div class="analytics-legendColor" style="background: #f59e0b"></div><span>Cash (20%)</span></div>
                    <div class="analytics-legendItem"><div class="analytics-legendColor" style="background: #ef4444"></div><span>Other (25%)</span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="analytics-chartsContainer">
        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>🔄</span> Order Status Overview</div>
            <div class="analytics-barChart">
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">Pending</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 15%; background: linear-gradient(90deg, #f59e0b, #fbbf24)">278</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">Processing</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 25%; background: linear-gradient(90deg, #3b82f6, #60a5fa)">462</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">Shipped</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 30%; background: linear-gradient(90deg, #8b5cf6, #a78bfa)">554</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">Delivered</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 28%; background: linear-gradient(90deg, #10b981, #34d399)">517</div></div>
                </div>
                <div class="analytics-barItem">
                    <div class="analytics-barLabel">Cancelled</div>
                    <div class="analytics-barContainer"><div class="analytics-barFill" style="width: 2%; background: linear-gradient(90deg, #ef4444, #f87171)">36</div></div>
                </div>
            </div>
        </div>

        <div class="analytics-chartCard">
            <div class="analytics-chartTitle"><span>🏆</span> Top Selling Products</div>
            <div class="analytics-topProducts">
                <div class="analytics-productRow"><span class="analytics-productName">⚡ Quantum Sneakers</span><span class="analytics-productSales">342 units</span></div>
                <div class="analytics-productRow"><span class="analytics-productName">🎒 Nebula Backpack</span><span class="analytics-productSales">298 units</span></div>
                <div class="analytics-productRow"><span class="analytics-productName">👕 Cyber Hoodie</span><span class="analytics-productSales">267 units</span></div>
                <div class="analytics-productRow"><span class="analytics-productName">⌚ Fusion Watch</span><span class="analytics-productSales">189 units</span></div>
                <div class="analytics-productRow"><span class="analytics-productName">🎧 Echo Headphones</span><span class="analytics-productSales">156 units</span></div>
            </div>
        </div>
    </div>

    <!-- Mini Stats -->
    <div class="analytics-miniGrid">
        <div class="analytics-miniCard">
            <div class="analytics-miniValue">$89.99</div>
            <div class="analytics-miniLabel">Average Order Value</div>
        </div>
        <div class="analytics-miniCard">
            <div class="analytics-miniValue">2.4 days</div>
            <div class="analytics-miniLabel">Avg Delivery Time</div>
        </div>
        <div class="analytics-miniCard">
            <div class="analytics-miniValue">94%</div>
            <div class="analytics-miniLabel">Customer Satisfaction</div>
        </div>
        <div class="analytics-miniCard">
            <div class="analytics-miniValue">1,284</div>
            <div class="analytics-miniLabel">Active Customers</div>
        </div>
    </div>

    <!-- Progress Goals -->
    <div class="analytics-progressSection">
        <div class="analytics-progressTitle">🎯 2025 Annual Goals Progress</div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Revenue Target ($2.5M)</span><span>$1.45M / $2.5M</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: 58%">58%</div></div>
        </div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Customer Acquisition (5,000)</span><span>3,421 / 5,000</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: 68%">68%</div></div>
        </div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Order Fulfillment (10,000)</span><span>6,847 / 10,000</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: 68%">68%</div></div>
        </div>
        <div class="analytics-progressItem">
            <div class="analytics-progressHeader"><span>Customer Retention (85%)</span><span>78% / 85%</span></div>
            <div class="analytics-progressBarBg"><div class="analytics-progressFill" style="width: 92%">92%</div></div>
        </div>
    </div>
</body>
</html>