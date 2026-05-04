<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus CRM | Futuristic Customers Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .customer-body {
            font-family: 'Segoe UI', 'Inter', 'Poppins', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 30px;
        }

        /* Search and Filter Bar */
        .customer-controls {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            animation: customer-fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .customer-searchWrapper {
            flex: 2;
            position: relative;
            animation: customer-slideInLeft 0.5s ease-out 0.15s backwards;
        }

        .customer-searchIcon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #3b82f6;
            pointer-events: none;
        }

        .customer-searchBar {
            width: 100%;
            padding: 14px 20px 14px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .customer-searchBar:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: scale(1.01);
        }

        .customer-filterWrapper {
            flex: 1;
            animation: customer-slideInLeft 0.5s ease-out 0.2s backwards;
        }

        .customer-filterBtn {
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

        .customer-filterBtn:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }

        /* Table Styles - Full width */
        .customer-tableContainer {
            overflow-x: auto;
            width: 100%;
            animation: customer-fadeInUp 0.5s ease-out 0.25s backwards;
        }

        .customer-mainTable {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            background: white;
        }

        /* Table Header */
        .customer-mainTable thead {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
        }

        .customer-mainTable th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .customer-mainTable th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transition: width 0.3s ease;
        }

        .customer-mainTable th:hover::after {
            width: 100%;
        }

        /* Zebra striping */
        .customer-mainTable tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: customer-fadeInRow 0.3s ease backwards;
        }

        .customer-mainTable tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .customer-mainTable tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        /* Hover effect */
        .customer-mainTable tbody tr:hover {
            background: linear-gradient(90deg, #dbeafe, #eff6ff);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .customer-mainTable td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #1e293b;
        }

        /* Checkbox styling */
        .customer-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #3b82f6;
            transition: transform 0.2s ease;
        }

        .customer-checkbox:hover {
            transform: scale(1.1);
        }

        /* Email and phone styling */
        .customer-email {
            color: #3b82f6;
            font-weight: 500;
        }

        .customer-phone {
            font-family: monospace;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
        }

        .customer-address {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Action buttons */
        .customer-editBtn, .customer-deleteBtn {
            padding: 6px 14px;
            margin: 0 4px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }

        .customer-editBtn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .customer-editBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .customer-deleteBtn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .customer-deleteBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Animations */
        @keyframes customer-fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes customer-slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes customer-fadeInRow {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Stagger animation for rows */
        .customer-mainTable tbody tr:nth-child(1) { animation-delay: 0.05s; }
        .customer-mainTable tbody tr:nth-child(2) { animation-delay: 0.1s; }
        .customer-mainTable tbody tr:nth-child(3) { animation-delay: 0.15s; }
        .customer-mainTable tbody tr:nth-child(4) { animation-delay: 0.2s; }
        .customer-mainTable tbody tr:nth-child(5) { animation-delay: 0.25s; }
        .customer-mainTable tbody tr:nth-child(6) { animation-delay: 0.3s; }
        .customer-mainTable tbody tr:nth-child(7) { animation-delay: 0.35s; }
        .customer-mainTable tbody tr:nth-child(8) { animation-delay: 0.4s; }
        .customer-mainTable tbody tr:nth-child(9) { animation-delay: 0.45s; }
        .customer-mainTable tbody tr:nth-child(10) { animation-delay: 0.5s; }

        @media (max-width: 1024px) {
            .customer-mainTable th, .customer-mainTable td { padding: 12px 10px; font-size: 0.8rem; }
        }

        /* Custom scrollbar */
        .customer-tableContainer::-webkit-scrollbar { height: 8px; }
        .customer-tableContainer::-webkit-scrollbar-track { background: #e2e8f0; border-radius: 10px; }
        .customer-tableContainer::-webkit-scrollbar-thumb { background: linear-gradient(90deg, #3b82f6, #2563eb); border-radius: 10px; }
    </style>
</head>
<body class="customer-body">
    <!-- Search and Filter Bar -->
    <div class="customer-controls">
        <div class="customer-searchWrapper">
            <span class="customer-searchIcon">🔍</span>
            <input type="text" class="customer-searchBar" placeholder="Search by name, email, phone, or address...">
        </div>
        <div class="customer-filterWrapper">
            <button class="customer-filterBtn">⚡ FILTERS</button>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="customer-tableContainer">
        <table class="customer-mainTable">
            <thead>
                <tr>
                    <th><input type="checkbox" class="customer-checkbox"></th>
                    <th>ID</th>
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C001</td>
                    <td>Alex Morgan</td>
                    <td class="customer-email">alex.morgan@email.com</td>
                    <td class="customer-phone">+1 (555) 123-4567</td>
                    <td class="customer-address">123 Main St, New York, NY 10001</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C002</td>
                    <td>Sarah Johnson</td>
                    <td class="customer-email">sarah.j@email.com</td>
                    <td class="customer-phone">+1 (555) 234-5678</td>
                    <td class="customer-address">456 Oak Ave, Los Angeles, CA 90001</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C003</td>
                    <td>Michael Chen</td>
                    <td class="customer-email">michael.chen@email.com</td>
                    <td class="customer-phone">+1 (555) 345-6789</td>
                    <td class="customer-address">789 Pine Rd, Chicago, IL 60601</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 4 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C004</td>
                    <td>Emily Rodriguez</td>
                    <td class="customer-email">emily.r@email.com</td>
                    <td class="customer-phone">+1 (555) 456-7890</td>
                    <td class="customer-address">321 Elm Blvd, Miami, FL 33101</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 5 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C005</td>
                    <td>David Kim</td>
                    <td class="customer-email">david.kim@email.com</td>
                    <td class="customer-phone">+1 (555) 567-8901</td>
                    <td class="customer-address">654 Cedar Ln, Seattle, WA 98101</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 6 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C006</td>
                    <td>Jessica Taylor</td>
                    <td class="customer-email">jessica.t@email.com</td>
                    <td class="customer-phone">+1 (555) 678-9012</td>
                    <td class="customer-address">987 Spruce St, Boston, MA 02101</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 7 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C007</td>
                    <td>Ryan Martinez</td>
                    <td class="customer-email">ryan.m@email.com</td>
                    <td class="customer-phone">+1 (555) 789-0123</td>
                    <td class="customer-address">147 Maple Dr, Denver, CO 80201</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 8 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C008</td>
                    <td>Olivia Wilson</td>
                    <td class="customer-email">olivia.w@email.com</td>
                    <td class="customer-phone">+1 (555) 890-1234</td>
                    <td class="customer-address">258 Birch Way, Austin, TX 73301</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 9 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C009</td>
                    <td>William Lee</td>
                    <td class="customer-email">will.lee@email.com</td>
                    <td class="customer-phone">+1 (555) 901-2345</td>
                    <td class="customer-address">369 Walnut Ct, Portland, OR 97201</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
                <!-- Row 10 -->
                <tr>
                    <td><input type="checkbox" class="customer-checkbox"></td>
                    <td>#C010</td>
                    <td>Sophia Garcia</td>
                    <td class="customer-email">sophia.g@email.com</td>
                    <td class="customer-phone">+1 (555) 012-3456</td>
                    <td class="customer-address">753 Ash Ave, Phoenix, AZ 85001</td>
                    <td>
                        <button class="customer-editBtn">Edit</button>
                        <button class="customer-deleteBtn">Del</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>