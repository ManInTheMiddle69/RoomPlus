<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Dashboard | Home</title>
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

        /* Welcome Header */
        .welcome-header {
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: fadeInUp 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .welcome-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #3b82f6);
        }

        .welcome-header h1 {
            font-size: 2rem;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
        }

        .welcome-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .date-badge {
            display: inline-block;
            margin-top: 15px;
            padding: 6px 15px;
            background: #e0f2fe;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #0369a1;
            font-weight: 600;
        }

        /* Stats Cards Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: fadeInUp 0.5s ease-out backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stat-card:nth-child(2) { animation-delay: 0.1s; }
        .stat-card:nth-child(3) { animation-delay: 0.15s; }
        .stat-card:nth-child(4) { animation-delay: 0.2s; }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(59, 130, 246, 0.1);
        }

        .stat-icon {
            font-size: 2.2rem;
            margin-bottom: 15px;
            display: inline-block;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-urgent {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 8px;
            font-weight: 600;
        }

        /* Two Columns Layout */
        .two-columns {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        /* Section Cards */
        .section-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease-out 0.25s backwards;
        }

        .section-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.08);
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e2e8f0;
        }

        /* List Items */
        .list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .list-item:hover {
            background: #f8fafc;
            transform: translateX(5px);
            padding-left: 10px;
        }

        .item-info {
            flex: 1;
        }

        .item-title {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .item-subtitle {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .item-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .badge-high {
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-medium {
            background: #fef3c7;
            color: #d97706;
        }

        .badge-low {
            background: #dbeafe;
            color: #2563eb;
        }

        .badge-new {
            background: #dcfce7;
            color: #16a34a;
        }

        /* Online Users Grid */
        .online-users {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 10px;
        }

        .user-card {
            text-align: center;
            padding: 15px;
            background: #f8fafc;
            border-radius: 15px;
            transition: all 0.2s ease;
        }

        .user-card:hover {
            background: #e0f2fe;
            transform: scale(1.05);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .user-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: #1e293b;
        }

        .user-status {
            font-size: 0.7rem;
            color: #10b981;
            margin-top: 4px;
        }

        /* Advertisement Banner */
        .ad-banner {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.5s ease-out 0.3s backwards;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .ad-banner:hover {
            transform: scale(1.01);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }

        .ad-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%);
            animation: pulse 3s ease infinite;
        }

        .ad-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .ad-banner h3 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .ad-banner p {
            color: #94a3b8;
            margin-bottom: 15px;
        }

        .ad-button {
            display: inline-block;
            padding: 10px 25px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .ad-button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        /* Inbox Messages */
        .message-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .message-item:hover {
            background: #f8fafc;
            transform: translateX(5px);
            padding-left: 10px;
        }

        .message-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            flex-shrink: 0;
        }

        .message-content {
            flex: 1;
        }

        .message-sender {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .message-text {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 4px;
        }

        .message-time {
            font-size: 0.7rem;
            color: #94a3b8;
        }

        .message-unread {
            width: 8px;
            height: 8px;
            background: #3b82f6;
            border-radius: 50%;
            margin-top: 5px;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .action-btn {
            padding: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 600;
            color: #475569;
        }

        .action-btn:hover {
            background: #e0f2fe;
            border-color: #3b82f6;
            transform: translateY(-2px);
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

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            .two-columns {
                grid-template-columns: 1fr;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .welcome-header h1 {
                font-size: 1.5rem;
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
    </style>
</head>
<body>
    <!-- Welcome Header -->
    <div class="welcome-header">
        <h1>👋 Welcome back, Admin</h1>
        <p>Here's what's happening with your store today</p>
        <div class="date-badge">
            📅 Tuesday, January 23, 2024 • 14:30 GMT
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-number">24</div>
            <div class="stat-label">Orders to Treat</div>
            <div class="stat-urgent">⚠️ 8 urgent (over 24h)</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">🐛</div>
            <div class="stat-number">12</div>
            <div class="stat-label">Bugs Reported</div>
            <div class="stat-urgent">🔴 3 critical</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📧</div>
            <div class="stat-number">47</div>
            <div class="stat-label">Help Requests</div>
            <div class="stat-urgent">⏰ 15 pending response</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">💬</div>
            <div class="stat-number">128</div>
            <div class="stat-label">Unread Messages</div>
            <div class="stat-urgent">✨ 32 from today</div>
        </div>
    </div>

    <!-- Two Columns Layout -->
    <div class="two-columns">
        <!-- Left Column -->
        <div>
            <!-- Orders to Treat -->
            <div class="section-card">
                <div class="section-title">
                    <span>📦</span> Orders to Treat
                    <span style="margin-left: auto; font-size: 0.7rem; background: #fee2e2; padding: 2px 8px; border-radius: 20px;">24 total</span>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">#ORD008 - William Lee</div>
                        <div class="item-subtitle">Order placed: Jan 22, 2024 • $199.99</div>
                    </div>
                    <div class="item-badge badge-high">Urgent</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">#ORD012 - Emma Watson</div>
                        <div class="item-subtitle">Order placed: Jan 22, 2024 • $89.99</div>
                    </div>
                    <div class="item-badge badge-medium">Processing</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">#ORD015 - James Brown</div>
                        <div class="item-subtitle">Order placed: Jan 21, 2024 • $249.99</div>
                    </div>
                    <div class="item-badge badge-high">Urgent</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">#ORD018 - Sofia Martinez</div>
                        <div class="item-subtitle">Order placed: Jan 21, 2024 • $59.99</div>
                    </div>
                    <div class="item-badge badge-low">Pending</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">+20 more orders waiting</div>
                        <div class="item-subtitle">Click to view all</div>
                    </div>
                    <div class="item-badge" style="background: #e2e8f0;">View All</div>
                </div>
            </div>

            <!-- Bugs Reported -->
            <div class="section-card" style="margin-top: 25px;">
                <div class="section-title">
                    <span>🐛</span> Bugs Reported
                    <span style="margin-left: auto; font-size: 0.7rem; background: #fee2e2; padding: 2px 8px; border-radius: 20px;">12 active</span>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">Payment gateway timeout</div>
                        <div class="item-subtitle">Reported by: Sarah Chen • 2h ago</div>
                    </div>
                    <div class="item-badge badge-high">Critical</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">Mobile menu not responsive</div>
                        <div class="item-subtitle">Reported by: Mike Ross • 5h ago</div>
                    </div>
                    <div class="item-badge badge-medium">High</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">Search filter not working</div>
                        <div class="item-subtitle">Reported by: Lisa Wong • 1d ago</div>
                    </div>
                    <div class="item-badge badge-low">Medium</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">+9 more bugs to fix</div>
                        <div class="item-subtitle">View bug tracking board</div>
                    </div>
                    <div class="item-badge" style="background: #e2e8f0;">View All</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="section-card" style="margin-top: 25px;">
                <div class="section-title">
                    <span>⚡</span> Quick Actions
                </div>
                <div class="quick-actions">
                    <div class="action-btn">➕ New Order</div>
                    <div class="action-btn">📦 Process Orders</div>
                    <div class="action-btn">🐛 Report Bug</div>
                    <div class="action-btn">📧 Send Alert</div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <!-- Help Requests -->
            <div class="section-card">
                <div class="section-title">
                    <span>📧</span> Help Requests
                    <span style="margin-left: auto; font-size: 0.7rem; background: #dbeafe; padding: 2px 8px; border-radius: 20px;">47 total</span>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">Cannot reset password</div>
                        <div class="item-subtitle">John Doe • 30 min ago</div>
                    </div>
                    <div class="item-badge badge-new">New</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">Order #ORD005 not showing</div>
                        <div class="item-subtitle">Alice Johnson • 2h ago</div>
                    </div>
                    <div class="item-badge badge-medium">In Progress</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">Discount code not applying</div>
                        <div class="item-subtitle">Robert Taylor • 4h ago</div>
                    </div>
                    <div class="item-badge badge-new">New</div>
                </div>
                <div class="list-item">
                    <div class="item-info">
                        <div class="item-title">+44 more requests</div>
                        <div class="item-subtitle">Average response time: 2.5h</div>
                    </div>
                    <div class="item-badge" style="background: #e2e8f0;">View All</div>
                </div>
            </div>

            <!-- Inbox Messages -->
            <div class="section-card" style="margin-top: 25px;">
                <div class="section-title">
                    <span>💬</span> Recent Inbox
                    <span style="margin-left: auto; font-size: 0.7rem; background: #dcfce7; padding: 2px 8px; border-radius: 20px;">128 unread</span>
                </div>
                <div class="message-item">
                    <div class="message-avatar">JD</div>
                    <div class="message-content">
                        <div class="message-sender">John Doe</div>
                        <div class="message-text">Question about shipping times...</div>
                        <div class="message-time">10 min ago</div>
                    </div>
                    <div class="message-unread"></div>
                </div>
                <div class="message-item">
                    <div class="message-avatar">SW</div>
                    <div class="message-content">
                        <div class="message-sender">Sarah Wilson</div>
                        <div class="message-text">My order hasn't arrived yet...</div>
                        <div class="message-time">1 hour ago</div>
                    </div>
                    <div class="message-unread"></div>
                </div>
                <div class="message-item">
                    <div class="message-avatar">MC</div>
                    <div class="message-content">
                        <div class="message-sender">Michael Chen</div>
                        <div class="message-text">Thanks for the support!</div>
                        <div class="message-time">3 hours ago</div>
                    </div>
                </div>
            </div>

            <!-- Customers Online -->
            <div class="section-card" style="margin-top: 25px;">
                <div class="section-title">
                    <span>🟢</span> Customers Online Now
                    <span style="margin-left: auto; font-size: 0.7rem; background: #dcfce7; padding: 2px 8px; border-radius: 20px;">18 active</span>
                </div>
                <div class="online-users">
                    <div class="user-card">
                        <div class="user-avatar">JD</div>
                        <div class="user-name">John Doe</div>
                        <div class="user-status">● Online</div>
                    </div>
                    <div class="user-card">
                        <div class="user-avatar">SW</div>
                        <div class="user-name">Sarah W.</div>
                        <div class="user-status">● Online</div>
                    </div>
                    <div class="user-card">
                        <div class="user-avatar">MC</div>
                        <div class="user-name">Mike C.</div>
                        <div class="user-status">● Online</div>
                    </div>
                    <div class="user-card">
                        <div class="user-avatar">EL</div>
                        <div class="user-name">Emma L.</div>
                        <div class="user-status">● Online</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Advertisement Banner -->
    <div class="ad-banner">
        <div class="ad-content">
            <h3>🚀 Summer Sale is Coming!</h3>
            <p>Get ready for our biggest event of the year. Up to 50% off on selected items.</p>
            <div class="ad-button">Create Campaign Now →</div>
        </div>
    </div>

    <!-- Additional Info Row -->
    <div class="two-columns">
        <div class="section-card">
            <div class="section-title">
                <span>📊</span> Today's Statistics
            </div>
            <div class="list-item">
                <span>👥 Visitors today</span>
                <span style="font-weight: 700; color: #3b82f6;">1,284</span>
            </div>
            <div class="list-item">
                <span>🛒 Conversion rate</span>
                <span style="font-weight: 700; color: #10b981;">3.8% ↑</span>
            </div>
            <div class="list-item">
                <span>💰 Sales today</span>
                <span style="font-weight: 700; color: #3b82f6;">$4,892</span>
            </div>
            <div class="list-item">
                <span>⭐ Avg. rating today</span>
                <span style="font-weight: 700; color: #f59e0b;">4.7 ★</span>
            </div>
        </div>

        <div class="section-card">
            <div class="section-title">
                <span>📢</span> Active Advertisements
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-title">Facebook Campaign</div>
                    <div class="item-subtitle">Impressions: 45.2K • CTR: 2.8%</div>
                </div>
                <div class="item-badge badge-medium">Active</div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-title">Google Shopping</div>
                    <div class="item-subtitle">Impressions: 28.7K • CTR: 3.2%</div>
                </div>
                <div class="item-badge badge-medium">Active</div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-title">Instagram Promo</div>
                    <div class="item-subtitle">Impressions: 32.1K • CTR: 4.1%</div>
                </div>
                <div class="item-badge badge-new">Boosted</div>
            </div>
        </div>
    </div>
</body>
</html>