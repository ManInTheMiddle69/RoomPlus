<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Analytics | Futuristic Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .analytics-body {
            font-family: 'Segoe UI', 'Inter', 'Poppins', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 30px;
        }

        /* Header Section */
        .analytics-header {
            margin-bottom: 30px;
            animation: analytics-fadeInUp 0.5s ease-out;
        }

        .analytics-header h1 {
            font-size: 2rem;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
        }

        .analytics-header p {
            color: #64748b;
            font-size: 0.9rem;
        }

        /* Stats Cards Grid */
        .analytics-statsGrid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
            animation: analytics-fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .analytics-statCard {
            background: white;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
        }

        .analytics-statCard::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #3b82f6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .analytics-statCard:hover::before {
            transform: scaleX(1);
        }

        .analytics-statCard:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(59, 130, 246, 0.1), 0 0 0 1px rgba(59, 130, 246, 0.2);
        }

        .analytics-statIcon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: inline-block;
            animation: analytics-float 3s ease-in-out infinite;
        }

        .analytics-statValue {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
        }

        .analytics-statLabel {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .analytics-statTrend {
            display: inline-block;
            margin-top: 10px;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
        }

        /* Charts Container */
        .analytics-chartsContainer {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .analytics-chartCard {
            background: white;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: analytics-fadeInUp 0.5s ease-out 0.15s backwards;
        }

        .analytics-chartCard:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.08), 0 0 0 1px rgba(59, 130, 246, 0.2);
        }

        .analytics-chartTitle {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
        }

        /* CSS Bar Chart */
        .analytics-barChart {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .analytics-barItem {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .analytics-barLabel {
            width: 100px;
            font-weight: 600;
            color: #475569;
            font-size: 0.85rem;
        }

        .analytics-barContainer {
            flex: 1;
            height: 35px;
            background: #f1f5f9;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .analytics-barFill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10px;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
            animation: analytics-fillBar 1s ease-out;
        }

        /* Donut Chart CSS */
        .analytics-donutContainer {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .analytics-donut {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            position: relative;
            background: conic-gradient(
                #3b82f6 0% 35%,
                #10b981 35% 55%,
                #f59e0b 55% 75%,
                #ef4444 75% 100%
            );
            animation: analytics-rotateDonut 0.8s ease-out;
        }

        .analytics-donut::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
        }

        .analytics-donutLabel {
            text-align: center;
            margin-top: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
        }

        .analytics-legend {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .analytics-legendItem {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
        }

        .analytics-legendColor {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        /* Mini Cards Grid */
        .analytics-miniGrid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .analytics-miniCard {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: analytics-fadeInUp 0.5s ease-out 0.2s backwards;
        }

        .analytics-miniCard:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.1);
        }

        .analytics-miniCard .analytics-miniValue {
            font-size: 1.8rem;
            font-weight: 800;
            color: #3b82f6;
        }

        .analytics-miniCard .analytics-miniLabel {
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 5px;
        }

        /* Progress Bar */
        .analytics-progressSection {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: analytics-fadeInUp 0.5s ease-out 0.25s backwards;
        }

        .analytics-progressTitle {
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .analytics-progressItem {
            margin-bottom: 20px;
        }

        .analytics-progressHeader {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.85rem;
        }

        .analytics-progressBarBg {
            height: 25px;
            background: #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
        }

        .analytics-progressFill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10px;
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            animation: analytics-fillProgress 1s ease-out;
        }

        /* Animations */
        @keyframes analytics-fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes analytics-float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes analytics-fillBar {
            from { width: 0; }
        }

        @keyframes analytics-fillProgress {
            from { width: 0; }
        }

        @keyframes analytics-rotateDonut {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Table for top products */
        .analytics-topProducts {
            margin-top: 20px;
        }

        .analytics-productRow {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .analytics-productRow:hover {
            background: #f8fafc;
            transform: translateX(5px);
        }

        .analytics-productName {
            font-weight: 600;
            color: #1e293b;
        }

        .analytics-productSales {
            color: #3b82f6;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .analytics-chartsContainer { grid-template-columns: 1fr; }
            .analytics-statsGrid { grid-template-columns: 1fr; }
        }
    </style>
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