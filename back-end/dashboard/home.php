<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../back-end-style.css">
    <title>Nexus Dashboard | Home</title>

    
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