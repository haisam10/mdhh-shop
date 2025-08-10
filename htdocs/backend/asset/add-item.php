<?php
require_once 'backend/connect.php';

// Initialize variables safely
$name = $_POST['item_name'] ?? '';
$description = $_POST['item_description'] ?? '';
$price = $_POST['item_price'] ?? '';

$image_name = $_FILES['item_image']['name'] ?? '';
$image_tmp = $_FILES['item_image']['tmp_name'] ?? '';

$upload_dir = 'frontend/all_iems/image/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$upload_path = $upload_dir . basename($image_name);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (move_uploaded_file($image_tmp, $upload_path)) {
        $stmt = $conn->prepare("INSERT INTO items (item_name, item_description, item_price, item_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $description, $price, $image_name);

        if ($stmt->execute()) {
            echo '<script>alert("Item added successfully")</script>';
            // echo '<script>window.location.href = "admin/dashboard";</script>';
            $stmt->close();
        } else {
            echo "Database error: {$stmt->error}";
        }
    } else {
        echo "Image upload failed.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add New Item</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        h2 {
            color: #333;
        }

        .add-item-form {
            background: linear-gradient(180deg, #DCF9E0 0%, #FFFFFF 30.21%);
            box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 30%;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    
    <?php include_once 'backend/asset/header.php'; ?>
    <div class="d-flex">
        <?php include_once 'backend/asset/slidebar.php'; ?>
        <div style="padding: 20px; width: 100%;">
            <h2 style="text-align:center;">➕📦 নতুন আইটেম যোগ করুন</h2>
            <form method="post" enctype="multipart/form-data" class="add-item-form">
                <label>Item Name:</label>
                <input type="text" name="item_name" required>

                <label>Description:</label>
                <textarea name="item_description" required></textarea>

                <label>Price:</label>
                <input type="number" step="0.01" name="item_price" required>

                <label>Image:</label>
                <input type="file" name="item_image" accept="frontend/all_iems/image/*" required>

                <button type="submit">Add Item</button>
            </form>
        </div>
    </div>
</body>

</html>