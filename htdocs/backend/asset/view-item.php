<?php
include 'backend/connect.php';

// Delete item if requested
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM items WHERE id = $id";
    $conn->query($deleteQuery);
    header("Location: view-item");
    exit;
}

// Update item if submitted
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $_POST['item_name'];
    $desc = $_POST['item_description'];
    $price = floatval($_POST['item_price']);

    $updateSQL = "UPDATE items SET 
                    item_name = ?, 
                    item_description = ?, 
                    item_price = ? 
                  WHERE id = ?";
    $stmt = $conn->prepare($updateSQL);
    $stmt->bind_param("ssdi", $name, $desc, $price, $id);
    $stmt->execute();
    header("Location: view-item");
    exit;
}

// Fetch item for edit
$editItem = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $editResult = $conn->query("SELECT * FROM items WHERE id = $editId");
    if ($editResult->num_rows > 0) {
        $editItem = $editResult->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>View Items</title>
    <style>
        body {
            background: #f5f5f5;
            font-family: Arial;
            color: #eee;
        }

        form {
            background: linear-gradient(180deg, #DCF9E0 0%, #FFFFFF 30.21%);
            box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            max-width: 500px;
            box-shadow: 0 0 10px #ccc;
        }

        label {
            color: #000;
            font-weight: bold;
        }

        input, textarea {
            width: 96%;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
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
            max-width: 60px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }
        
        .actions a {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
        }

        .edit-btn {
            background: dodgerblue;
        }

        .delete-btn {
            background: crimson;
        }
        h2,h3{
            text-align: center;
            color: yellowgreen;
        }
    </style>
</head>
<body>

<?php include_once 'backend/asset/header.php'; ?>
<div class="d-flex">
    <?php include_once 'backend/asset/slidebar.php'; ?>
    <main>

        <h2 style="text-align:center;">📦 পণ্যের তালিকা</h2>

        <!-- If editing, show update form -->
        <?php if ($editItem): ?>
        <form method="post">
            <h3>✏️ পণ্য আপডেট করুন</h3>
            <input type="hidden" name="id" value="<?= $editItem['id'] ?>">
            <label>Item Name</label>
            <input type="text" name="item_name" value="<?= htmlspecialchars($editItem['item_name']) ?>" required>

            <label>Item Description</label>
            <textarea name="item_description" rows="4" required><?= htmlspecialchars($editItem['item_description']) ?></textarea>

            <label>Item Price</label>
            <input type="number" step="0.01" name="item_price" value="<?= $editItem['item_price'] ?>" required>

            <button type="submit" name="update">Update Item</button>
        </form>
        <?php endif; ?>

        <?php
        // Show all items
        $result = $conn->query("SELECT * FROM items");

        if ($result->num_rows > 0):
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price (৳)</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['item_name']) ?></td>
                <td><?= htmlspecialchars($row['item_description']) ?></td>
                <td><?= number_format($row['item_price'], 2) ?></td>
                <td>
                    <?php if ($row['item_image']): ?>
                        <img src="http://localhost/frontend/all_iems/image/<?= htmlspecialchars($row['item_image']) ?>" alt="">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td class="actions">
                    <a class="edit-btn" href="?edit=<?= $row['id'] ?>">✏️Edit</a>
                    <a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">❌Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p style="text-align:center;">❌ কোনো পণ্য পাওয়া যায়নি</p>
        <?php endif; ?>

    </main>
</div>

</body>
</html>
