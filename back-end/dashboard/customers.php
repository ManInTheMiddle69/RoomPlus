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

        body {
            font-family: 'Segoe UI', 'Inter', 'Poppins', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 30px;
        }

        /* Search and Filter Bar */
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

        /* Table Styles - Full width */
        .table-container {
            overflow-x: auto;
            width: 100%;
            animation: fadeInUp 0.5s ease-out 0.25s backwards;
        }

        .customers-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            background: white;
        }

        /* Table Header */
        .customers-table thead {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
        }

        .customers-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .customers-table th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transition: width 0.3s ease;
        }

        .customers-table th:hover::after {
            width: 100%;
        }

        /* Zebra striping - alternating colors for focus */
        .customers-table tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInRow 0.3s ease backwards;
        }

        .customers-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .customers-table tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        /* Hover effect */
        .customers-table tbody tr:hover {
            background: linear-gradient(90deg, #dbeafe, #eff6ff);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .customers-table td {
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
        .email {
            color: #3b82f6;
            font-weight: 500;
        }

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

        /* Action buttons */
        .edit-btn, .delete-btn {
            padding: 6px 14px;
            margin: 0 4px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }

        .edit-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .delete-btn {
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
        .customers-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
        .customers-table tbody tr:nth-child(2) { animation-delay: 0.1s; }
        .customers-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
        .customers-table tbody tr:nth-child(4) { animation-delay: 0.2s; }
        .customers-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
        .customers-table tbody tr:nth-child(6) { animation-delay: 0.3s; }
        .customers-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
        .customers-table tbody tr:nth-child(8) { animation-delay: 0.4s; }
        .customers-table tbody tr:nth-child(9) { animation-delay: 0.45s; }
        .customers-table tbody tr:nth-child(10) { animation-delay: 0.5s; }

        /* Responsive */
        @media (max-width: 1024px) {
            body {
                padding: 20px;
            }
            .customers-table th, .customers-table td {
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
    <!-- Search and Filter Bar -->
    <div class="controls">
        <div class="search-wrapper">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-bar" placeholder="Search by name, email, phone, or address...">
        </div>
        <div class="filter-wrapper">
            <button class="filter-btn">
                ⚡ FILTERS
            </button>
        </div>
    </div>

    <!-- Customers Table - Full Width -->
    <div class="table-container">
        <table class="customers-table">
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkbox"></th>
                    <th>ID</th>
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fake customer row 1 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C001</td>
                    <td>Alex Morgan</td>
                    <td class="email">alex.morgan@email.com</td>
                    <td class="phone">+1 (555) 123-4567</td>
                    <td class="address">123 Main St, New York, NY 10001</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 2 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C002</td>
                    <td>Sarah Johnson</td>
                    <td class="email">sarah.j@email.com</td>
                    <td class="phone">+1 (555) 234-5678</td>
                    <td class="address">456 Oak Ave, Los Angeles, CA 90001</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 3 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C003</td>
                    <td>Michael Chen</td>
                    <td class="email">michael.chen@email.com</td>
                    <td class="phone">+1 (555) 345-6789</td>
                    <td class="address">789 Pine Rd, Chicago, IL 60601</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 4 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C004</td>
                    <td>Emily Rodriguez</td>
                    <td class="email">emily.r@email.com</td>
                    <td class="phone">+1 (555) 456-7890</td>
                    <td class="address">321 Elm Blvd, Miami, FL 33101</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 5 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C005</td>
                    <td>David Kim</td>
                    <td class="email">david.kim@email.com</td>
                    <td class="phone">+1 (555) 567-8901</td>
                    <td class="address">654 Cedar Ln, Seattle, WA 98101</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 6 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C006</td>
                    <td>Jessica Taylor</td>
                    <td class="email">jessica.t@email.com</td>
                    <td class="phone">+1 (555) 678-9012</td>
                    <td class="address">987 Spruce St, Boston, MA 02101</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 7 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C007</td>
                    <td>Ryan Martinez</td>
                    <td class="email">ryan.m@email.com</td>
                    <td class="phone">+1 (555) 789-0123</td>
                    <td class="address">147 Maple Dr, Denver, CO 80201</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 8 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C008</td>
                    <td>Olivia Wilson</td>
                    <td class="email">olivia.w@email.com</td>
                    <td class="phone">+1 (555) 890-1234</td>
                    <td class="address">258 Birch Way, Austin, TX 73301</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 9 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C009</td>
                    <td>William Lee</td>
                    <td class="email">will.lee@email.com</td>
                    <td class="phone">+1 (555) 901-2345</td>
                    <td class="address">369 Walnut Ct, Portland, OR 97201</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake customer row 10 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#C010</td>
                    <td>Sophia Garcia</td>
                    <td class="email">sophia.g@email.com</td>
                    <td class="phone">+1 (555) 012-3456</td>
                    <td class="address">753 Ash Ave, Phoenix, AZ 85001</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>