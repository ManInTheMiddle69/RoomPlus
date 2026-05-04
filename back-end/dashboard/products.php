<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Inventory | Futuristic Product Table</title>
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

        /* ADD BUTTON - Special design above everything */
        .add-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
            animation: slideInRight 0.5s ease-out;
        }

        .add-btn {
            background: linear-gradient(135deg, #3b82f6, #2563eb, #1d4ed8);
            border: none;
            padding: 16px 36px;
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
            position: relative;
            overflow: hidden;
        }

        .add-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .add-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .add-btn:hover {
            transform: scale(1.05) translateY(-2px);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
        }

        .add-btn:active {
            transform: scale(0.98);
        }

        .add-btn span {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .add-btn:hover span {
            animation: rotate 0.5s ease;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(180deg); }
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

        .product-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            background: white;
        }

        /* Table Header */
        .product-table thead {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
        }

        .product-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .product-table th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transition: width 0.3s ease;
        }

        .product-table th:hover::after {
            width: 100%;
        }

        /* Zebra striping - alternating colors for focus */
        .product-table tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInRow 0.3s ease backwards;
        }

        .product-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .product-table tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        /* Hover effect */
        .product-table tbody tr:hover {
            background: linear-gradient(90deg, #dbeafe, #eff6ff);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .product-table td {
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

        /* Price and quantity badges */
        .price {
            font-weight: 700;
            color: #3b82f6;
        }

        .quantity {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            background: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            font-size: 0.85rem;
        }

        /* Action buttons */
        .modify-btn, .delete-btn {
            padding: 6px 14px;
            margin: 0 4px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }

        .modify-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .modify-btn:hover {
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

        /* Color badges */
        .color-badge {
            display: inline-block;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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
        .product-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
        .product-table tbody tr:nth-child(2) { animation-delay: 0.1s; }
        .product-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
        .product-table tbody tr:nth-child(4) { animation-delay: 0.2s; }
        .product-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
        .product-table tbody tr:nth-child(6) { animation-delay: 0.3s; }
        .product-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
        .product-table tbody tr:nth-child(8) { animation-delay: 0.4s; }
        .product-table tbody tr:nth-child(9) { animation-delay: 0.45s; }
        .product-table tbody tr:nth-child(10) { animation-delay: 0.5s; }

        /* Responsive */
        @media (max-width: 1024px) {
            body {
                padding: 20px;
            }
            .product-table th, .product-table td {
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
    <!-- ADD BUTTON - Special design above all -->
    <div class="add-section">
        <a class="add-btn" href="add_product.php">
            <span>+</span> ADD NEW PRODUCT
        </a>
    </div>

    <!-- Search and Filter Bar -->
    <div class="controls">
        <div class="search-wrapper">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-bar" placeholder="Search by name, color, size...">
        </div>
        <div class="filter-wrapper">
            <button class="filter-btn">
                ⚡ FILTERS
            </button>
        </div>
    </div>

    <!-- Product Table - Full Width -->
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkbox"></th>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>COLOR</th>
                    <th>SIZE</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fake data row 1 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#001</td>
                    <td>Quantum Sneakers</td>
                    <td><span class="color-badge" style="background: #ef4444;"></span> Red</td>
                    <td>42</td>
                    <td class="price">$129.99</td>
                    <td><span class="quantity">45</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 2 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#002</td>
                    <td>Nebula Backpack</td>
                    <td><span class="color-badge" style="background: #3b82f6;"></span> Blue</td>
                    <td>M</td>
                    <td class="price">$89.99</td>
                    <td><span class="quantity">28</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 3 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#003</td>
                    <td>Cyber Hoodie</td>
                    <td><span class="color-badge" style="background: #10b981;"></span> Green</td>
                    <td>L</td>
                    <td class="price">$79.99</td>
                    <td><span class="quantity">52</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 4 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#004</td>
                    <td>Fusion Watch</td>
                    <td><span class="color-badge" style="background: #f59e0b;"></span> Gold</td>
                    <td>One Size</td>
                    <td class="price">$249.99</td>
                    <td><span class="quantity">15</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 5 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#005</td>
                    <td>Echo Headphones</td>
                    <td><span class="color-badge" style="background: #8b5cf6;"></span> Purple</td>
                    <td>One Size</td>
                    <td class="price">$159.99</td>
                    <td><span class="quantity">37</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 6 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#006</td>
                    <td>Nova T-Shirt</td>
                    <td><span class="color-badge" style="background: #000000;"></span> Black</td>
                    <td>XL</td>
                    <td class="price">$39.99</td>
                    <td><span class="quantity">89</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 7 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#007</td>
                    <td>Stellar Cap</td>
                    <td><span class="color-badge" style="background: #ec489a;"></span> Pink</td>
                    <td>Adjustable</td>
                    <td class="price">$29.99</td>
                    <td><span class="quantity">64</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 8 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#008</td>
                    <td>Orbit Glasses</td>
                    <td><span class="color-badge" style="background: #6b7280;"></span> Gray</td>
                    <td>One Size</td>
                    <td class="price">$99.99</td>
                    <td><span class="quantity">23</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 9 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#009</td>
                    <td>Prism Jacket</td>
                    <td><span class="color-badge" style="background: #14b8a6;"></span> Teal</td>
                    <td>XXL</td>
                    <td class="price">$199.99</td>
                    <td><span class="quantity">11</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
                <!-- Fake data row 10 -->
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>#010</td>
                    <td>Aura Lamp</td>
                    <td><span class="color-badge" style="background: #fbbf24;"></span> Yellow</td>
                    <td>One Size</td>
                    <td class="price">$59.99</td>
                    <td><span class="quantity">41</span></td>
                    <td>
                        <button class="modify-btn">Edit</button>
                        <button class="delete-btn">Del</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>