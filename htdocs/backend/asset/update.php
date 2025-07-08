<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <style>
         input, textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <?php include_once 'backend/asset/header.php'; ?>
    <div class="d-flex">
    <?php include_once 'backend/asset/slidebar.php'; ?>
            <main>
            <h1>Update Item</h1>
            <?php 
            // Get item ID from URL
$item_id = $_GET['id'] ?? null;

// If form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['item_name'];
    $desc = $_POST['item_description'];
    $price = $_POST['item_price'];
    $image = $_POST['item_image'];

    $stmt = $conn->prepare("UPDATE items SET item_name=?, item_description=?, item_price=?, item_image=? WHERE id=?");
    $stmt->bind_param("ssdsi", $name, $desc, $price, $image, $item_id);

    if ($stmt->execute()) {
        echo "✅ Item updated successfully.";
    } else {
        echo "❌ Update failed: " . $conn->error;
    }

    $stmt->close();
}

// Fetch current data
$item = null;
if ($item_id) {
    $stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
}

if (!$item) {
    echo "❌ Item not found.";
    exit;
}
?>

    <h2 style="text-align:center;">Update Item (ID: <?= htmlspecialchars($item_id) ?>)</h2>
    <form method="post">
        <label>Item Name:</label>
        <input type="text" name="item_name" value="<?= htmlspecialchars($item['item_name']) ?>" required>

        <label>Description:</label>
        <textarea name="item_description" rows="5" required><?= htmlspecialchars($item['item_description']) ?></textarea>

        <label>Price:</label>
        <input type="number" name="item_price" step="0.01" value="<?= htmlspecialchars($item['item_price']) ?>" required>

        <label>Image Filename (e.g. mug-1.avif):</label>
        <input type="text" name="item_image" value="<?= htmlspecialchars($item['item_image']) ?>" required>

        <input type="submit" value="Update Item">
    </form>
            <!-- <form method="post" enctype="multipart/form-data">
                <label>Item Name:</label>
                <input type="text" name="item_name" required>
                <label>Item Description:</label>
                <textarea name="item_description" required></textarea>
                <label>Item Price:</label>
                <input type="number" name="item_price" required>
                <button type="submit">Update Item</button>
            </form> -->
        </main>
    </div>
</body>
</html>