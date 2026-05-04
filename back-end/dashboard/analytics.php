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

        body {
            font-family: 'Segoe UI', 'Inter', 'Poppins', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 30px;
        }

        /* Header Section */
        .analytics-header {
            margin-bottom: 30px;
            animation: fadeInUp 0.5s ease-out;
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
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
            animation: fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
        }

        .stat-card::before {
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

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(59, 130, 246, 0.1), 0 0 0 1px rgba(59, 130, 246, 0.2);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-trend {
            display: inline-block;
            margin-top: 10px;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
        }

        /* Charts Container */
        .charts-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .chart-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: fadeInUp 0.5s ease-out 0.15s backwards;
        }

        .chart-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.08), 0 0 0 1px rgba(59, 130, 246, 0.2);
        }

        .chart-title {
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
        .bar-chart {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .bar-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .bar-label {
            width: 100px;
            font-weight: 600;
            color: #475569;
            font-size: 0.85rem;
        }

        .bar-container {
            flex: 1;
            height: 35px;
            background: #f1f5f9;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .bar-fill {
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
            transition: width 0.5s ease;
            animation: fillBar 1s ease-out;
        }

        /* Donut Chart CSS */
        .donut-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .donut {
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
            animation: rotateDonut 0.8s ease-out;
        }

        .donut::before {
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

        .donut-label {
            text-align: center;
            margin-top: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
        }

        .legend {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        /* Mini Cards Grid */
        .mini-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .mini-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: fadeInUp 0.5s ease-out 0.2s backwards;
        }

        .mini-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.1);
        }

        .mini-card .value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #3b82f6;
        }

        .mini-card .label {
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 5px;
        }

        /* Progress Bar */
        .progress-section {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: fadeInUp 0.5s ease-out 0.25s backwards;
        }

        .progress-title {
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .progress-item {
            margin-bottom: 20px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.85rem;
        }

        .progress-bar-bg {
            height: 25px;
            background: #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
        }

        .progress-fill {
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
            animation: fillProgress 1s ease-out;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes fillBar {
            from { width: 0; }
            to { width: var(--final-width); }
        }

        @keyframes fillProgress {
            from { width: 0; }
            to { width: var(--final-width); }
        }

        @keyframes rotateDonut {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            .charts-container {
                grid-template-columns: 1fr;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 10px;
        }

        /* Table for top products */
        .top-products {
            margin-top: 20px;
        }

        .product-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .product-row:hover {
            background: #f8fafc;
            transform: translateX(5px);
        }

        .product-name {
            font-weight: 600;
            color: #1e293b;
        }

        .product-sales {
            color: #3b82f6;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="analytics-header">
        <h1>📊 Analytics Dashboard</h1>
        <p>Real-time business intelligence & performance metrics</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">💰</div>
            <div class="stat-value">$124,582</div>
            <div class="stat-label">Total Revenue</div>
            <div class="stat-trend">↑ +12.5% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-value">1,847</div>
            <div class="stat-label">Total Orders</div>
            <div class="stat-trend">↑ +8.3% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-value">3,421</div>
            <div class="stat-label">Total Customers</div>
            <div class="stat-trend">↑ +15.2% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">⭐</div>
            <div class="stat-value">4.8</div>
            <div class="stat-label">Average Rating</div>
            <div class="stat-trend">↑ +0.3 vs last month</div>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="charts-container">
        <!-- Monthly Sales Bar Chart -->
        <div class="chart-card">
            <div class="chart-title">
                <span>📈</span> Monthly Sales Overview
            </div>
            <div class="bar-chart">
                <div class="bar-item">
                    <div class="bar-label">January</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 65%">$42,500</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">February</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 72%">$48,200</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">March</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 85%">$56,800</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">April</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 78%">$52,400</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">May</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 92%">$61,300</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">June</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 100%">$67,800</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Methods Donut Chart -->
        <div class="chart-card">
            <div class="chart-title">
                <span>💳</span> Payment Methods Distribution
            </div>
            <div class="donut-container">
                <div>
                    <div class="donut"></div>
                    <div class="donut-label">Total: 1,847 orders</div>
                </div>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background: #3b82f6"></div>
                        <span>Credit Card (35%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #10b981"></div>
                        <span>PayPal (20%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #f59e0b"></div>
                        <span>Cash (20%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #ef4444"></div>
                        <span>Other (25%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="charts-container">
        <!-- Order Status Distribution -->
        <div class="chart-card">
            <div class="chart-title">
                <span>🔄</span> Order Status Overview
            </div>
            <div class="bar-chart">
                <div class="bar-item">
                    <div class="bar-label">Pending</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 15%; background: linear-gradient(90deg, #f59e0b, #fbbf24)">278</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">Processing</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 25%; background: linear-gradient(90deg, #3b82f6, #60a5fa)">462</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">Shipped</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 30%; background: linear-gradient(90deg, #8b5cf6, #a78bfa)">554</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">Delivered</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 28%; background: linear-gradient(90deg, #10b981, #34d399)">517</div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-label">Cancelled</div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 2%; background: linear-gradient(90deg, #ef4444, #f87171)">36</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="chart-card">
            <div class="chart-title">
                <span>🏆</span> Top Selling Products
            </div>
            <div class="top-products">
                <div class="product-row">
                    <span class="product-name">⚡ Quantum Sneakers</span>
                    <span class="product-sales">342 units</span>
                </div>
                <div class="product-row">
                    <span class="product-name">🎒 Nebula Backpack</span>
                    <span class="product-sales">298 units</span>
                </div>
                <div class="product-row">
                    <span class="product-name">👕 Cyber Hoodie</span>
                    <span class="product-sales">267 units</span>
                </div>
                <div class="product-row">
                    <span class="product-name">⌚ Fusion Watch</span>
                    <span class="product-sales">189 units</span>
                </div>
                <div class="product-row">
                    <span class="product-name">🎧 Echo Headphones</span>
                    <span class="product-sales">156 units</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Mini Stats Grid -->
    <div class="mini-grid">
        <div class="mini-card">
            <div class="value">$89.99</div>
            <div class="label">Average Order Value</div>
        </div>
        <div class="mini-card">
            <div class="value">2.4 days</div>
            <div class="label">Avg Delivery Time</div>
        </div>
        <div class="mini-card">
            <div class="value">94%</div>
            <div class="label">Customer Satisfaction</div>
        </div>
        <div class="mini-card">
            <div class="value">1,284</div>
            <div class="label">Active Customers</div>
        </div>
    </div>

    <!-- Progress Goals Section -->
    <div class="progress-section">
        <div class="progress-title">🎯 2025 Annual Goals Progress</div>
        <div class="progress-item">
            <div class="progress-header">
                <span>Revenue Target ($2.5M)</span>
                <span>$1.45M / $2.5M</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-fill" style="width: 58%">58%</div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-header">
                <span>Customer Acquisition (5,000)</span>
                <span>3,421 / 5,000</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-fill" style="width: 68%">68%</div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-header">
                <span>Order Fulfillment (10,000)</span>
                <span>6,847 / 10,000</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-fill" style="width: 68%">68%</div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-header">
                <span>Customer Retention (85%)</span>
                <span>78% / 85%</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-fill" style="width: 92%">92%</div>
            </div>
        </div>
    </div>
</body>
</html>