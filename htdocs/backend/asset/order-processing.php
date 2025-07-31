<?php
require_once 'backend/connect.php';

// Status update handler
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $orderId = intval($_POST['order_id']);
    $newStatus = $_POST['new_status'];

    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $newStatus, $orderId);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('✅ Order status updated!'); window.location.href = 'order-processing';</script>";
    exit;
}

// Fetch orders
$sql = "
    SELECT o.id AS order_id, o.customer_name, o.phone, o.address, o.order_date, o.status,
           i.item_name, i.price, i.image
    FROM orders o
    JOIN order_items i ON o.id = i.order_id
    ORDER BY o.order_date DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Order Processing</title>
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: Arial;
            padding: 30px;
        }

        h2 {
            color: yellowgreen;
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 83vw;
            border-collapse: collapse;
            background: #222;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #444;
            text-align: left;
        }

        th {
            background: yellowgreen;
            color: #fff;
        }

        tr:nth-child(even) {
            background: #2c2c2c;
        }

        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        select,
        button {
            padding: 6px;
            border-radius: 4px;
            border: none;
        }

        .update-btn {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        select {
            background: #ddd;
            color: #000;
            font-weight: bold;
        }

        .option-1 {
            background: #f0f0f0 !important;
            color: #000;
            font-weight: bold;
        }

        .option-2 {
            background: yellow !important;
            color: #000;
            font-weight: bold;
        }

        .option-3 {
            background: crimson !important;
            color: #ddd;
            font-weight: bold;
        }

        .option-4 {
            background: green !important;
            color: #ddd;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include_once 'backend/asset/header.php'; ?>
    <div class="d-flex bg-shadow ">
        <?php include_once 'backend/asset/slidebar.php'; ?>
        <main>
            <h2>🚚 Order Processing Panel</h2>

            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td>#<?= $row['order_id'] ?></td>
                                <td><?= htmlspecialchars($row['customer_name']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                                <td><?= $row['order_date'] ?></td>
                                <td>
                                    <form method="POST" style="display:inline-block;">
                                        <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                                        <select name="new_status" class="status-select">
                                            <option value="new_order" <?= $row['status'] == 'new_order' ? 'selected' : '' ?>>🆕 New Order</option>
                                            <option value="packaging" <?= $row['status'] == 'packaging' ? 'selected' : '' ?>>📦 Packaging</option>
                                            <option value="out_for_delivery" <?= $row['status'] == 'out_for_delivery' ? 'selected' : '' ?>>🛵 Out for Delivery</option>
                                            <option value="delivered" <?= $row['status'] == 'delivered' ? 'selected' : '' ?>>✅ Delivered</option>
                                        </select>


                                </td>
                                <td><?= htmlspecialchars($row['item_name']) ?></td>
                                <td>৳<?= number_format($row['price'], 2) ?></td>
                                <td><img src="http://localhost/frontend/all_iems/image/<?= $row['image'] ?>" alt=""></td>
                                <td>
                                    <button type="submit" name="update_status" class="update-btn">🛠️ Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" style="text-align:center;">❌ No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
    </div>
    <script>
        const statusColors = {
            'new_order': '#f0f0f0',
            'packaging': 'yellow',
            'out_for_delivery': 'crimson',
            'delivered': 'green'
        };

        const textColors = {
            'new_order': '#000',
            'packaging': '#000',
            'out_for_delivery': '#fff',
            'delivered': '#fff'
        };

        document.querySelectorAll('.status-select').forEach(select => {
            function updateSelectStyle() {
                const selectedValue = select.value;
                select.style.backgroundColor = statusColors[selectedValue] || '#ddd';
                select.style.color = textColors[selectedValue] || '#000';
            }

            updateSelectStyle();

            select.addEventListener('change', updateSelectStyle);
        });
    </script>

</body>

</html>