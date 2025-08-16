<?php
require_once 'backend/connect.php';

// Fetch all orders with order items
$sql = "
    SELECT 
        o.id AS order_id,
        o.customer_name,
        o.phone,
        o.address,
        o.order_date,
        i.item_name,
        i.price,
        i.image
    FROM orders o
    JOIN order_items i ON o.id = i.order_id
    ORDER BY o.order_date DESC, o.id DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: Arial, sans-serif;
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
            margin-top: 20px;
            background: #222;
            box-shadow: 0 0 10px #333;
        }

        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: left;
        }

        th {
            background-color: yellowgreen;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #444;
        }
    </style>
</head>
<body>
    <?php include_once 'backend/asset/header.php'; ?>
    <div class="d-flex bg-shadow ">
        <?php include_once 'backend/asset/slidebar.php'; ?>
        <main>
    <h2>📋 অর্ডার তালিকা</h2>

    <table style=" border-collapse: collapse; margin: 20px 0; font-size: 18px; text-align: left;">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Order Date</th>
                <th>Item</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>#<?= $row['order_id'] ?></td>
                        <td><?= htmlspecialchars($row['customer_name']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= $row['order_date'] ?></td>
                        <td><?= htmlspecialchars($row['item_name']) ?></td>
                        <td>৳<?= number_format($row['price'], 2) ?></td>
                        <td><img src="http://localhost/frontend/all_iems/image/<?= $row['image'] ?>" alt=""></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align:center;">❌ কোনো অর্ডার পাওয়া যায়নি</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
        </main>
    </div>
</body>
</html>
