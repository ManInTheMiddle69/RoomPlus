<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../back-end-style.css">
    <title>Nexus CRM | Futuristic Customers Table</title>
</head>
<body class="customer-body">
    <?php
    // Include database connection
    include '../../connect.php';

    // Fetch all users from database
    $sql = "SELECT * FROM users ORDER BY user_id";

    $result = mysqli_query($conn, $sql);
    
    // Check if query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    ?>

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
                    <th>CREATED AT</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any users in the database
                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    // Loop through each user and display in table
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Generate formatted user ID
                        $formatted_id = "#C" . str_pad($counter, 3, "0", STR_PAD_LEFT);
                        
                        // Combine address fields
                        $full_address = $row['address_line1'];
                        if (!empty($row['city'])) {
                            $full_address .= ", " . $row['city'];
                        }
                        if (!empty($row['country'])) {
                            $full_address .= ", " . $row['country'];
                        }
                        
                        // Format the created_at date
                        $created_date = "";
                        if (!empty($row['created_at'])) {
                            $timestamp = strtotime($row['created_at']);
                            $created_date = date("M d, Y", $timestamp); // Formats as "Jan 15, 2024"
                            // Alternative formats:
                            // $created_date = date("Y-m-d", $timestamp); // 2024-01-15
                            // $created_date = date("d/m/Y", $timestamp); // 15/01/2024
                        }
                        ?>
                        <tr>
                            <td><input type="checkbox" class="customer-checkbox"></td>
                            <td><?php echo htmlspecialchars($formatted_id); ?></td>
                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                            <td class="customer-email"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="customer-phone"><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td class="customer-address"><?php echo htmlspecialchars($full_address); ?></td>
                            <td class="customer-created"><?php echo htmlspecialchars($created_date); ?></td>
                            <td>
                                <button class="customer-editBtn">Edit</button>
                                <button class="customer-deleteBtn">Del</button>
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                } else {
                    // Display a message if no users found
                    ?>
                    <tr class="customer-row">
                        <td colspan="8" style="text-align: center; padding: 40px;">No customers found in the database.</td>
                    </tr>
                    <?php
                }
                
                // Free result set and close connection
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>