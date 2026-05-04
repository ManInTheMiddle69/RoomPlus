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

        .dashboard-body {
            font-family: 'Segoe UI', 'Inter', 'Poppins', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 30px;
        }

        /* Welcome Header */
        .dashboard-welcomeHeader {
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: dashboard-fadeInUp 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .dashboard-welcomeHeader::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #3b82f6);
        }

        .dashboard-welcomeHeader h1 {
            font-size: 2rem;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
        }

        .dashboard-welcomeHeader p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .dashboard-dateBadge {
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
        .dashboard-statsGrid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .dashboard-statCard {
            background: white;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            animation: dashboard-fadeInUp 0.5s ease-out backwards;
        }

        .dashboard-statCard:nth-child(1) { animation-delay: 0.05s; }
        .dashboard-statCard:nth-child(2) { animation-delay: 0.1s; }
        .dashboard-statCard:nth-child(3) { animation-delay: 0.15s; }
        .dashboard-statCard:nth-child(4) { animation-delay: 0.2s; }

        .dashboard-statCard::before {
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

        .dashboard-statCard:hover::before { transform: scaleX(1); }

        .dashboard-statCard:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(59, 130, 246, 0.1);
        }

        .dashboard-statIcon {
            font-size: 2.2rem;
            margin-bottom: 15px;
            display: inline-block;
        }

        .dashboard-statNumber {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .dashboard-statLabel {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .dashboard-statUrgent {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 8px;
            font-weight: 600;
        }

        /* Two Columns Layout */
        .dashboard-twoColumns {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        /* Section Cards */
        .dashboard-sectionCard {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
            animation: dashboard-fadeInUp 0.5s ease-out 0.25s backwards;
        }

        .dashboard-sectionCard:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.08);
        }

        .dashboard-sectionTitle {
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
        .dashboard-listItem {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .dashboard-listItem:hover {
            background: #f8fafc;
            transform: translateX(5px);
            padding-left: 10px;
        }

        .dashboard-itemInfo { flex: 1; }

        .dashboard-itemTitle {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .dashboard-itemSubtitle {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .dashboard-itemBadge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .dashboard-badgeHigh { background: #fee2e2; color: #dc2626; }
        .dashboard-badgeMedium { background: #fef3c7; color: #d97706; }
        .dashboard-badgeLow { background: #dbeafe; color: #2563eb; }
        .dashboard-badgeNew { background: #dcfce7; color: #16a34a; }

        /* Online Users Grid */
        .dashboard-onlineUsers {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 10px;
        }

        .dashboard-userCard {
            text-align: center;
            padding: 15px;
            background: #f8fafc;
            border-radius: 15px;
            transition: all 0.2s ease;
        }

        .dashboard-userCard:hover {
            background: #e0f2fe;
            transform: scale(1.05);
        }

        .dashboard-userAvatar {
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

        .dashboard-userName {
            font-size: 0.8rem;
            font-weight: 600;
            color: #1e293b;
        }

        .dashboard-userStatus {
            font-size: 0.7rem;
            color: #10b981;
            margin-top: 4px;
        }

        /* Advertisement Banner */
        .dashboard-adBanner {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            animation: dashboard-fadeInUp 0.5s ease-out 0.3s backwards;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dashboard-adBanner:hover { transform: scale(1.01); box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2); }

        .dashboard-adBanner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%);
            animation: dashboard-pulse 3s ease infinite;
        }

        .dashboard-adContent {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .dashboard-adBanner h3 { color: white; font-size: 1.5rem; margin-bottom: 10px; }
        .dashboard-adBanner p { color: #94a3b8; margin-bottom: 15px; }

        .dashboard-adButton {
            display: inline-block;
            padding: 10px 25px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .dashboard-adButton:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        /* Inbox Messages */
        .dashboard-messageItem {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .dashboard-messageItem:hover {
            background: #f8fafc;
            transform: translateX(5px);
            padding-left: 10px;
        }

        .dashboard-messageAvatar {
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

        .dashboard-messageContent { flex: 1; }
        .dashboard-messageSender { font-weight: 700; color: #1e293b; margin-bottom: 4px; }
        .dashboard-messageText { font-size: 0.85rem; color: #64748b; margin-bottom: 4px; }
        .dashboard-messageTime { font-size: 0.7rem; color: #94a3b8; }
        .dashboard-messageUnread { width: 8px; height: 8px; background: #3b82f6; border-radius: 50%; margin-top: 5px; }

        /* Quick Actions */
        .dashboard-quickActions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .dashboard-actionBtn {
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

        .dashboard-actionBtn:hover {
            background: #e0f2fe;
            border-color: #3b82f6;
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes dashboard-fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes dashboard-pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #e2e8f0; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(135deg, #3b82f6, #2563eb); border-radius: 10px; }

        @media (max-width: 768px) {
            .dashboard-twoColumns { grid-template-columns: 1fr; }
            .dashboard-statsGrid { grid-template-columns: 1fr; }
            .dashboard-welcomeHeader h1 { font-size: 1.5rem; }
        }
    </style>
</head>
<body class="dashboard-body">
    <!-- Welcome Header -->
    <div class="dashboard-welcomeHeader">
        <h1>👋 Welcome back, Admin</h1>
        <p>Here's what's happening with your store today</p>
        <div class="dashboard-dateBadge">
            📅 Tuesday, January 23, 2024 • 14:30 GMT
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="dashboard-statsGrid">
        <div class="dashboard-statCard">
            <div class="dashboard-statIcon">📦</div>
            <div class="dashboard-statNumber">24</div>
            <div class="dashboard-statLabel">Orders to Treat</div>
            <div class="dashboard-statUrgent">⚠️ 8 urgent (over 24h)</div>
        </div>
        <div class="dashboard-statCard">
            <div class="dashboard-statIcon">🐛</div>
            <div class="dashboard-statNumber">12</div>
            <div class="dashboard-statLabel">Bugs Reported</div>
            <div class="dashboard-statUrgent">🔴 3 critical</div>
        </div>
        <div class="dashboard-statCard">
            <div class="dashboard-statIcon">📧</div>
            <div class="dashboard-statNumber">47</div>
            <div class="dashboard-statLabel">Help Requests</div>
            <div class="dashboard-statUrgent">⏰ 15 pending response</div>
        </div>
        <div class="dashboard-statCard">
            <div class="dashboard-statIcon">💬</div>
            <div class="dashboard-statNumber">128</div>
            <div class="dashboard-statLabel">Unread Messages</div>
            <div class="dashboard-statUrgent">✨ 32 from today</div>
        </div>
    </div>

    <!-- Two Columns Layout -->
    <div class="dashboard-twoColumns">
        <!-- Left Column -->
        <div>
            <div class="dashboard-sectionCard">
                <div class="dashboard-sectionTitle">
                    <span>📦</span> Orders to Treat
                    <span style="margin-left: auto; font-size: 0.7rem; background: #fee2e2; padding: 2px 8px; border-radius: 20px;">24 total</span>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">#ORD008 - William Lee</div>
                        <div class="dashboard-itemSubtitle">Order placed: Jan 22, 2024 • $199.99</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeHigh">Urgent</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">#ORD012 - Emma Watson</div>
                        <div class="dashboard-itemSubtitle">Order placed: Jan 22, 2024 • $89.99</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeMedium">Processing</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">#ORD015 - James Brown</div>
                        <div class="dashboard-itemSubtitle">Order placed: Jan 21, 2024 • $249.99</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeHigh">Urgent</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">#ORD018 - Sofia Martinez</div>
                        <div class="dashboard-itemSubtitle">Order placed: Jan 21, 2024 • $59.99</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeLow">Pending</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">+20 more orders waiting</div>
                        <div class="dashboard-itemSubtitle">Click to view all</div>
                    </div>
                    <div class="dashboard-itemBadge" style="background: #e2e8f0;">View All</div>
                </div>
            </div>

            <div class="dashboard-sectionCard" style="margin-top: 25px;">
                <div class="dashboard-sectionTitle">
                    <span>🐛</span> Bugs Reported
                    <span style="margin-left: auto; font-size: 0.7rem; background: #fee2e2; padding: 2px 8px; border-radius: 20px;">12 active</span>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">Payment gateway timeout</div>
                        <div class="dashboard-itemSubtitle">Reported by: Sarah Chen • 2h ago</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeHigh">Critical</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">Mobile menu not responsive</div>
                        <div class="dashboard-itemSubtitle">Reported by: Mike Ross • 5h ago</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeMedium">High</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">Search filter not working</div>
                        <div class="dashboard-itemSubtitle">Reported by: Lisa Wong • 1d ago</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeLow">Medium</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">+9 more bugs to fix</div>
                        <div class="dashboard-itemSubtitle">View bug tracking board</div>
                    </div>
                    <div class="dashboard-itemBadge" style="background: #e2e8f0;">View All</div>
                </div>
            </div>

            <div class="dashboard-sectionCard" style="margin-top: 25px;">
                <div class="dashboard-sectionTitle"><span>⚡</span> Quick Actions</div>
                <div class="dashboard-quickActions">
                    <div class="dashboard-actionBtn">➕ New Order</div>
                    <div class="dashboard-actionBtn">📦 Process Orders</div>
                    <div class="dashboard-actionBtn">🐛 Report Bug</div>
                    <div class="dashboard-actionBtn">📧 Send Alert</div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <div class="dashboard-sectionCard">
                <div class="dashboard-sectionTitle">
                    <span>📧</span> Help Requests
                    <span style="margin-left: auto; font-size: 0.7rem; background: #dbeafe; padding: 2px 8px; border-radius: 20px;">47 total</span>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">Cannot reset password</div>
                        <div class="dashboard-itemSubtitle">John Doe • 30 min ago</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeNew">New</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">Order #ORD005 not showing</div>
                        <div class="dashboard-itemSubtitle">Alice Johnson • 2h ago</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeMedium">In Progress</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">Discount code not applying</div>
                        <div class="dashboard-itemSubtitle">Robert Taylor • 4h ago</div>
                    </div>
                    <div class="dashboard-itemBadge dashboard-badgeNew">New</div>
                </div>
                <div class="dashboard-listItem">
                    <div class="dashboard-itemInfo">
                        <div class="dashboard-itemTitle">+44 more requests</div>
                        <div class="dashboard-itemSubtitle">Average response time: 2.5h</div>
                    </div>
                    <div class="dashboard-itemBadge" style="background: #e2e8f0;">View All</div>
                </div>
            </div>

            <div class="dashboard-sectionCard" style="margin-top: 25px;">
                <div class="dashboard-sectionTitle">
                    <span>💬</span> Recent Inbox
                    <span style="margin-left: auto; font-size: 0.7rem; background: #dcfce7; padding: 2px 8px; border-radius: 20px;">128 unread</span>
                </div>
                <div class="dashboard-messageItem">
                    <div class="dashboard-messageAvatar">JD</div>
                    <div class="dashboard-messageContent">
                        <div class="dashboard-messageSender">John Doe</div>
                        <div class="dashboard-messageText">Question about shipping times...</div>
                        <div class="message-time">10 min ago</div>
                    </div>
                    <div class="dashboard-messageUnread"></div>
                </div>
                <div class="dashboard-messageItem">
                    <div class="dashboard-messageAvatar">SW</div>
                    <div class="dashboard-messageContent">
                        <div class="dashboard-messageSender">Sarah Wilson</div>
                        <div class="dashboard-messageText">My order hasn't arrived yet...</div>
                        <div class="message-time">1 hour ago</div>
                    </div>
                    <div class="dashboard-messageUnread"></div>
                </div>
                <div class="dashboard-messageItem">
                    <div class="dashboard-messageAvatar">MC</div>
                    <div class="dashboard-messageContent">
                        <div class="dashboard-messageSender">Michael Chen</div>
                        <div class="dashboard-messageText">Thanks for the support!</div>
                        <div class="message-time">3 hours ago</div>
                    </div>
                </div>
            </div>

            <div class="dashboard-sectionCard" style="margin-top: 25px;">
                <div class="dashboard-sectionTitle">
                    <span>🟢</span> Online Now
                    <span style="margin-left: auto; font-size: 0.7rem; background: #dcfce7; padding: 2px 8px; border-radius: 20px;">18 active</span>
                </div>
                <div class="dashboard-onlineUsers">
                    <div class="dashboard-userCard">
                        <div class="dashboard-userAvatar">JD</div>
                        <div class="dashboard-userName">John Doe</div>
                        <div class="dashboard-userStatus">● Online</div>
                    </div>
                    <div class="dashboard-userCard">
                        <div class="dashboard-userAvatar">SW</div>
                        <div class="dashboard-userName">Sarah W.</div>
                        <div class="dashboard-userStatus">● Online</div>
                    </div>
                    <div class="dashboard-userCard">
                        <div class="dashboard-userAvatar">MC</div>
                        <div class="dashboard-userName">Mike C.</div>
                        <div class="dashboard-userStatus">● Online</div>
                    </div>
                    <div class="dashboard-userCard">
                        <div class="dashboard-userAvatar">EL</div>
                        <div class="dashboard-userName">Emma L.</div>
                        <div class="dashboard-userStatus">● Online</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ad Banner -->
    <div class="dashboard-adBanner">
        <div class="dashboard-adContent">
            <h3>🚀 Summer Sale is Coming!</h3>
            <p>Get ready for our biggest event of the year. Up to 50% off on selected items.</p>
            <div class="dashboard-adButton">Create Campaign Now →</div>
        </div>
    </div>

    <!-- Additional Info -->
    <div class="dashboard-twoColumns">
        <div class="dashboard-sectionCard">
            <div class="dashboard-sectionTitle"><span>📊</span> Today's Statistics</div>
            <div class="dashboard-listItem">
                <span>👥 Visitors today</span>
                <span style="font-weight: 700; color: #3b82f6;">1,284</span>
            </div>
            <div class="dashboard-listItem">
                <span>🛒 Conversion rate</span>
                <span style="font-weight: 700; color: #10b981;">3.8% ↑</span>
            </div>
            <div class="dashboard-listItem">
                <span>💰 Sales today</span>
                <span style="font-weight: 700; color: #3b82f6;">$4,892</span>
            </div>
            <div class="dashboard-listItem">
                <span>⭐ Avg. rating today</span>
                <span style="font-weight: 700; color: #f59e0b;">4.7 ★</span>
            </div>
        </div>

        <div class="dashboard-sectionCard">
            <div class="dashboard-sectionTitle"><span>📢</span> Active Advertisements</div>
            <div class="dashboard-listItem">
                <div class="dashboard-itemInfo">
                    <div class="dashboard-itemTitle">Facebook Campaign</div>
                    <div class="dashboard-itemSubtitle">Impressions: 45.2K • CTR: 2.8%</div>
                </div>
                <div class="dashboard-itemBadge dashboard-badgeMedium">Active</div>
            </div>
            <div class="dashboard-listItem">
                <div class="dashboard-itemInfo">
                    <div class="dashboard-itemTitle">Google Shopping</div>
                    <div class="dashboard-itemSubtitle">Impressions: 28.7K • CTR: 3.2%</div>
                </div>
                <div class="dashboard-itemBadge dashboard-badgeMedium">Active</div>
            </div>
            <div class="dashboard-listItem">
                <div class="dashboard-itemInfo">
                    <div class="dashboard-itemTitle">Instagram Promo</div>
                    <div class="dashboard-itemSubtitle">Impressions: 32.1K • CTR: 4.1%</div>
                </div>
                <div class="dashboard-itemBadge dashboard-badgeNew">Boosted</div>
            </div>
        </div>
    </div>
</body>
</html>