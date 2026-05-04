<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Orders | Futuristic Orders Table</title>
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

        /* Search, Filter and Date Select */
        .controls {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            animation: fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .search-wrapper {
            flex: 2;
            position: relative;
            animation: slideInLeft 0.5s ease-out 0.15s backwards;
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #3b82f6;
            pointer-events: none;
        }

        .search-bar {
            width: 100%;
            padding: 14px 20px 14px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .search-bar:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: scale(1.01);
        }

        .filter-wrapper {
            flex: 1;
            animation: slideInLeft 0.5s ease-out 0.2s backwards;
        }

        .filter-btn {
            width: 100%;
            padding: 14px 20px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
            color: #1e293b;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }

        .date-wrapper {
            flex: 1;
            animation: slideInLeft 0.5s ease-out 0.25s backwards;
        }

        .date-select {
            width: 100%;
            padding: 14px 20px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
            color: #1e293b;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .date-select:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }

        /* Table Styles - Full width */
        .table-container {
            overflow-x: auto;
            width: 100%;
            animation: fadeInUp 0.5s ease-out 0.3s backwards;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            background: white;
        }

        /* Table Header */
        .orders-table thead {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
        }

        .orders-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .orders-table th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transition: width 0.3s ease;
        }

        .orders-table th:hover::after {
            width: 100%;
        }

        /* Zebra striping - alternating colors for focus */
        .orders-table tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInRow 0.3s ease backwards;
        }

        .orders-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .orders-table tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        /* Hover effect */
        .orders-table tbody tr:hover {
            background: linear-gradient(90deg, #dbeafe, #eff6ff);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .orders-table td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #1e293b;
        }

        /* Checkbox styling */
        .checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #3b82f6;
            transition: transform 0.2s ease;
        }

        .checkbox:hover {
            transform: scale(1.1);
        }

        /* Email and phone styling */
        .phone {
            font-family: monospace;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
        }

        .address {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .payment-method {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .payment-credit {
            background: #dbeafe;
            color: #1e40af;
        }

        .payment-paypal {
            background: #e0f2fe;
            color: #0369a1;
        }

        .payment-cash {
            background: #dcfce7;
            color: #166534;
        }

        /* Status dropdown */
        .status-select {
            padding: 6px 12px;
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            background: white;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .status-select.pending {
            color: #f59e0b;
            border-color: #fde68a;
            background: #fffbeb;
        }

        .status-select.processing {
            color: #3b82f6;
            border-color: #bfdbfe;
            background: #eff6ff;
        }

        .status-select.shipped {
            color: #8b5cf6;
            border-color: #ddd6fe;
            background: #f5f3ff;
        }

        .status-select.delivered {
            color: #10b981;
            border-color: #a7f3d0;
            background: #ecfdf5;
        }

        .status-select.cancelled {
            color: #ef4444;
            border-color: #fecaca;
            background: #fef2f2;
        }

        .status-select:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Action buttons */
        .delete-btn {
            padding: 6px 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Stagger animation for rows */
        .orders-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
        .orders-table tbody tr:nth-child(2) { animation-delay: 0.1s; }
        .orders-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
        .orders-table tbody tr:nth-child(4) { animation-delay: 0.2s; }
        .orders-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
        .orders-table tbody tr:nth-child(6) { animation-delay: 0.3s; }
        .orders-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
        .orders-table tbody tr:nth-child(8) { animation-delay: 0.4s; }
        .orders-table tbody tr:nth-child(9) { animation-delay: 0.45s; }
        .orders-table tbody tr:nth-child(10) { animation-delay: 0.5s; }

        /* Responsive */
        @media (max-width: 1024px) {
            body {
                padding: 20px;
            }
            .orders-table th, .orders-table td {
                padding: 12px 10px;
                font-size: 0.8rem;
            }
        }

        /* Custom scrollbar */
        .table-container::-webkit-scrollbar {
            height: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Search, Filter and Date Select -->
    <div class="controls">
        <div class="search-wrapper">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-bar" placeholder="Search by customer, phone, address...">
        </div>
        <div class="filter-wrapper">
            <button class="filter-btn">
                ⚡ FILTERS
            </button>
        </div>
        <div class="date-wrapper">
            <select class="date-select">
                <option value="">📅 SELECT DATE</option>
                <option value="today">Today</option>
                <option value="yesterday">Yesterday</option>
                <option value="last7">Last 7 Days</option>
                <option value="last30">Last 30 Days</option>
                <option value="thismonth">This Month</option>
                <option value="lastmonth">Last Month</option>
            </select>
        </div>
    </div>

    <!-- Orders Table - Full Width -->
    <div class="table-container">
        <table class="orders-table">
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkbox"></th>
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
                <!-- Fake order row 1 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD001</td>
                    <td>Alex Morgan</td>
                    <td>2024-01-15</td>
                    <td class="phone">+1 (555) 123-4567</td>
                    <td class="address">123 Main St, New York, NY 10001</td>
                    <td><span class="payment-method payment-credit">💳 Credit Card</span></td>
                    <td>
                        <select class="status-select pending">
                            <option value="pending" selected>⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 2 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD002</td>
                    <td>Sarah Johnson</td>
                    <td>2024-01-16</td>
                    <td class="phone">+1 (555) 234-5678</td>
                    <td class="address">456 Oak Ave, Los Angeles, CA 90001</td>
                    <td><span class="payment-method payment-paypal">💰 PayPal</span></td>
                    <td>
                        <select class="status-select processing">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing" selected>🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 3 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD003</td>
                    <td>Michael Chen</td>
                    <td>2024-01-18</td>
                    <td class="phone">+1 (555) 345-6789</td>
                    <td class="address">789 Pine Rd, Chicago, IL 60601</td>
                    <td><span class="payment-method payment-credit">💳 Credit Card</span></td>
                    <td>
                        <select class="status-select shipped">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped" selected>📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 4 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD004</td>
                    <td>Emily Rodriguez</td>
                    <td>2024-01-20</td>
                    <td class="phone">+1 (555) 456-7890</td>
                    <td class="address">321 Elm Blvd, Miami, FL 33101</td>
                    <td><span class="payment-method payment-cash">💵 Cash on Delivery</span></td>
                    <td>
                        <select class="status-select delivered">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered" selected>✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 5 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD005</td>
                    <td>David Kim</td>
                    <td>2024-01-22</td>
                    <td class="phone">+1 (555) 567-8901</td>
                    <td class="address">654 Cedar Ln, Seattle, WA 98101</td>
                    <td><span class="payment-method payment-paypal">💰 PayPal</span></td>
                    <td>
                        <select class="status-select pending">
                            <option value="pending" selected>⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 6 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD006</td>
                    <td>Jessica Taylor</td>
                    <td>2024-01-25</td>
                    <td class="phone">+1 (555) 678-9012</td>
                    <td class="address">987 Spruce St, Boston, MA 02101</td>
                    <td><span class="payment-method payment-credit">💳 Credit Card</span></td>
                    <td>
                        <select class="status-select processing">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing" selected>🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 7 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD007</td>
                    <td>Ryan Martinez</td>
                    <td>2024-01-28</td>
                    <td class="phone">+1 (555) 789-0123</td>
                    <td class="address">147 Maple Dr, Denver, CO 80201</td>
                    <td><span class="payment-method payment-cash">💵 Cash on Delivery</span></td>
                    <td>
                        <select class="status-select cancelled">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled" selected>❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 8 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD008</td>
                    <td>Olivia Wilson</td>
                    <td>2024-02-01</td>
                    <td class="phone">+1 (555) 890-1234</td>
                    <td class="address">258 Birch Way, Austin, TX 73301</td>
                    <td><span class="payment-method payment-paypal">💰 PayPal</span></td>
                    <td>
                        <select class="status-select shipped">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped" selected>📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 9 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD009</td>
                    <td>William Lee</td>
                    <td>2024-02-03</td>
                    <td class="phone">+1 (555) 901-2345</td>
                    <td class="address">369 Walnut Ct, Portland, OR 97201</td>
                    <td><span class="payment-method payment-credit">💳 Credit Card</span></td>
                    <td>
                        <select class="status-select delivered">
                            <option value="pending">⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered" selected>✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <!-- Fake order row 10 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#ORD010</td>
                    <td>Sophia Garcia</td>
                    <td>2024-02-05</td>
                    <td class="phone">+1 (555) 012-3456</td>
                    <td class="address">753 Ash Ave, Phoenix, AZ 85001</td>
                    <td><span class="payment-method payment-cash">💵 Cash on Delivery</span></td>
                    <td>
                        <select class="status-select pending">
                            <option value="pending" selected>⏳ Pending</option>
                            <option value="processing">🔄 Processing</option>
                            <option value="shipped">📦 Shipped</option>
                            <option value="delivered">✅ Delivered</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>