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

        .order-body {
            font-family: 'Segoe UI', 'Inter', 'Poppins', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 30px;
        }

        /* Search, Filter and Date Select */
        .order-controls {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            animation: order-fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .order-searchWrapper {
            flex: 2;
            position: relative;
            animation: order-slideInLeft 0.5s ease-out 0.15s backwards;
        }

        .order-searchIcon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #3b82f6;
            pointer-events: none;
        }

        .order-searchBar {
            width: 100%;
            padding: 14px 20px 14px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .order-searchBar:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: scale(1.01);
        }

        .order-filterWrapper {
            flex: 1;
            animation: order-slideInLeft 0.5s ease-out 0.2s backwards;
        }

        .order-filterBtn {
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

        .order-filterBtn:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }

        .order-dateWrapper {
            flex: 1;
            animation: order-slideInLeft 0.5s ease-out 0.25s backwards;
        }

        .order-dateSelect {
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

        .order-dateSelect:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }

        /* Table Styles - Full width */
        .order-tableContainer {
            overflow-x: auto;
            width: 100%;
            animation: order-fadeInUp 0.5s ease-out 0.3s backwards;
        }

        .order-mainTable {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            background: white;
        }

        /* Table Header */
        .order-mainTable thead {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
        }

        .order-mainTable th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .order-mainTable th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transition: width 0.3s ease;
        }

        .order-mainTable th:hover::after {
            width: 100%;
        }

        /* Zebra striping */
        .order-mainTable tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: order-fadeInRow 0.3s ease backwards;
        }

        .order-mainTable tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .order-mainTable tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        /* Hover effect */
        .order-mainTable tbody tr:hover {
            background: linear-gradient(90deg, #dbeafe, #eff6ff);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .order-mainTable td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #1e293b;
        }

        /* Checkbox styling */
        .order-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #3b82f6;
            transition: transform 0.2s ease;
        }

        .order-checkbox:hover {
            transform: scale(1.1);
        }

        .order-phone {
            font-family: monospace;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
        }

        .order-address {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .order-paymentMethod {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .order-paymentCredit { background: #dbeafe; color: #1e40af; }
        .order-paymentPaypal { background: #e0f2fe; color: #0369a1; }
        .order-paymentCash { background: #dcfce7; color: #166534; }

        /* Status dropdown */
        .order-statusSelect {
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

        .order-statusSelect.pending { color: #f59e0b; border-color: #fde68a; background: #fffbeb; }
        .order-statusSelect.processing { color: #3b82f6; border-color: #bfdbfe; background: #eff6ff; }
        .order-statusSelect.shipped { color: #8b5cf6; border-color: #ddd6fe; background: #f5f3ff; }
        .order-statusSelect.delivered { color: #10b981; border-color: #a7f3d0; background: #ecfdf5; }
        .order-statusSelect.cancelled { color: #ef4444; border-color: #fecaca; background: #fef2f2; }

        /* Action buttons */
        .order-deleteBtn {
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

        .order-deleteBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Animations */
        @keyframes order-fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes order-slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes order-fadeInRow {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Stagger animation for rows */
        .order-mainTable tbody tr:nth-child(1) { animation-delay: 0.05s; }
        .order-mainTable tbody tr:nth-child(2) { animation-delay: 0.1s; }
        .order-mainTable tbody tr:nth-child(3) { animation-delay: 0.15s; }
        .order-mainTable tbody tr:nth-child(4) { animation-delay: 0.2s; }
        .order-mainTable tbody tr:nth-child(5) { animation-delay: 0.25s; }
        .order-mainTable tbody tr:nth-child(6) { animation-delay: 0.3s; }
        .order-mainTable tbody tr:nth-child(7) { animation-delay: 0.35s; }
        .order-mainTable tbody tr:nth-child(8) { animation-delay: 0.4s; }
        .order-mainTable tbody tr:nth-child(9) { animation-delay: 0.45s; }
        .order-mainTable tbody tr:nth-child(10) { animation-delay: 0.5s; }

        @media (max-width: 1024px) {
            .order-mainTable th, .order-mainTable td { padding: 12px 10px; font-size: 0.8rem; }
        }

        /* Custom scrollbar */
        .order-tableContainer::-webkit-scrollbar { height: 8px; }
        .order-tableContainer::-webkit-scrollbar-track { background: #e2e8f0; border-radius: 10px; }
        .order-tableContainer::-webkit-scrollbar-thumb { background: linear-gradient(90deg, #3b82f6, #2563eb); border-radius: 10px; }
    </style>
</head>
<body class="order-body">
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
                <!-- Row 1 -->
                <tr>
                    <td><input type="checkbox" class="order-checkbox"></td>
                    <td>#ORD001</td>
                    <td>Alex Morgan</td>
                    <td>2024-01-15</td>
                    <td class="order-phone">+1 (555) 123-4567</td>
                    <td class="order-address">123 Main St, New York, NY 10001</td>
                    <td><span class="order-paymentMethod order-paymentCredit">💳 Credit Card</span></td>
                    <td>
                        <select class="order-statusSelect pending">
                            <option value="pending" selected>⏳ Pending</option>
                            <option value="delivered">✅ Delivered</option>
                        </select>
                    </td>
                    <td><button class="order-deleteBtn">Delete</button></td>
                </tr>
                <!-- Row 2 -->
                <tr>
                    <td><input type="checkbox" class="order-checkbox"></td>
                    <td>#ORD002</td>
                    <td>Sarah Johnson</td>
                    <td>2024-01-16</td>
                    <td class="order-phone">+1 (555) 234-5678</td>
                    <td class="order-address">456 Oak Ave, Los Angeles, CA 90001</td>
                    <td><span class="order-paymentMethod order-paymentPaypal">💰 PayPal</span></td>
                    <td>
                        <select class="order-statusSelect processing">
                            <option value="processing" selected>🔄 Processing</option>
                            <option value="cancelled">❌ Cancelled</option>
                        </select>
                    </td>
                    <td><button class="order-deleteBtn">Delete</button></td>
                </tr>
                <!-- Row 3 -->
                <tr>
                    <td><input type="checkbox" class="order-checkbox"></td>
                    <td>#ORD003</td>
                    <td>Michael Chen</td>
                    <td>2024-01-18</td>
                    <td class="order-phone">+1 (555) 345-6789</td>
                    <td class="order-address">789 Pine Rd, Chicago, IL 60601</td>
                    <td><span class="order-paymentMethod order-paymentCredit">💳 Credit Card</span></td>
                    <td>
                        <select class="order-statusSelect shipped">
                            <option value="shipped" selected>📦 Shipped</option>
                        </select>
                    </td>
                    <td><button class="order-deleteBtn">Delete</button></td>
                </tr>
                <!-- Row 4 -->
                <tr>
                    <td><input type="checkbox" class="order-checkbox"></td>
                    <td>#ORD004</td>
                    <td>Emily Rodriguez</td>
                    <td>2024-01-20</td>
                    <td class="order-phone">+1 (555) 456-7890</td>
                    <td class="order-address">321 Elm Blvd, Miami, FL 33101</td>
                    <td><span class="order-paymentMethod order-paymentCash">💵 Cash on Delivery</span></td>
                    <td>
                        <select class="order-statusSelect delivered">
                            <option value="delivered" selected>✅ Delivered</option>
                        </select>
                    </td>
                    <td><button class="order-deleteBtn">Delete</button></td>
                </tr>
                <!-- Row 5 -->
                <tr>
                    <td><input type="checkbox" class="order-checkbox"></td>
                    <td>#ORD005</td>
                    <td>David Kim</td>
                    <td>2024-01-22</td>
                    <td class="order-phone">+1 (555) 567-8901</td>
                    <td class="order-address">654 Cedar Ln, Seattle, WA 98101</td>
                    <td><span class="order-paymentMethod order-paymentPaypal">💰 PayPal</span></td>
                    <td>
                        <select class="order-statusSelect pending">
                            <option value="pending" selected>⏳ Pending</option>
                        </select>
                    </td>
                    <td><button class="order-deleteBtn">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>