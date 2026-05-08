<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../back-end-style.css">
    <title>Nexus Inventory | Futuristic Product Table</title>
</head>
<body class="product-body">
    <?php
    // Include database connection
    include '../../connect.php';

    // Fetch products with their variants using JOIN
    $sql = "SELECT p.product_id, p.name, p.price, p.is_published,
                   pv.variant_id, pv.size, pv.color, pv.variant_stock
            FROM products p
            LEFT JOIN product_variants pv ON p.product_id = pv.product_id
            ORDER BY p.product_id, pv.color, pv.size";

    $result = mysqli_query($conn, $sql);
    
    // Check if query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    // Organize data to handle products without variants
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    ?>

    <div class="product-addSection">
        <a class="product-addBtn" href="add_product.php">
            <span>+</span> ADD NEW PRODUCT
        </a>
    </div>

    <div class="product-controls">
        <div class="product-searchWrapper">
            <span class="product-searchIcon">🔍</span>
            <input type="text" class="product-searchBar" placeholder="Search by name, color, size...">
        </div>
        <div class="product-filterWrapper">
            <button class="product-filterBtn">⚡ FILTERS</button>
        </div>
    </div>

    <div class="product-tableContainer">
        <table class="product-mainTable">
            <thead>
                <tr>
                    <th><input type="checkbox" class="product-checkbox"></th>
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
                <?php
                // Check if there are any products in the database
                if (count($rows) > 0) {
                    foreach ($rows as $row) {
                        $formatted_id = "#" . str_pad($row['product_id'], 3, "0", STR_PAD_LEFT);
                        
                        $color = !empty($row['color']) ? $row['color'] : '—';
                        $size = !empty($row['size']) ? $row['size'] : '—';
                        $quantity = isset($row['variant_stock']) ? $row['variant_stock'] : 0;
                        $variant_id = isset($row['variant_id']) ? $row['variant_id'] : null;
                        
                        $color_hex = '#6b7280';
                        if ($color !== '—') {
                            $color_hex = getColorHex($color);
                        }
                        ?>
                        <tr class="product-row">
                            <td><input type="checkbox" class="product-checkbox"></td>
                            <td><?php echo htmlspecialchars($formatted_id); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td>
                                <?php if ($color !== '—'): ?>
                                    <span class="product-colorCircle" style="background: <?php echo $color_hex; ?>;"></span>
                                <?php endif; ?>
                                <?php echo htmlspecialchars($color); ?>
                            </td>
                            <td><?php echo htmlspecialchars($size); ?></td>
                            <td class="product-priceLabel">$<?php echo number_format($row['price'], 2); ?></td>
                            <td><span class="product-qtyBadge"><?php echo htmlspecialchars($quantity); ?></span></td>
                            <td>
                                <button class="product-modifyBtn">Edit</button>
                                <button class="product-deleteBtn">Del</button>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr class="product-row">
                        <td colspan="8" style="text-align: center; padding: 40px;">No products found in the database.<?php echo mysqli_error($conn); ?></td>
                    </tr>
                    <?php
                }
                
                mysqli_free_result($result);
                mysqli_close($conn);
                
                function getColorHex($color_name) {
                    $colors = [
                        'red' => '#ef4444', 'blue' => '#3b82f6', 'green' => '#10b981',
                        'gold' => '#f59e0b', 'purple' => '#8b5cf6', 'black' => '#000000',
                        'pink' => '#ec489a', 'gray' => '#6b7280', 'teal' => '#14b8a6',
                        'yellow' => '#fbbf24', 'white' => '#ffffff', 'orange' => '#f97316'
                    ];
                    return isset($colors[strtolower($color_name)]) ? $colors[strtolower($color_name)] : '#6b7280';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>