<?php
session_start();
require_once 'backend/connect.php'; // db config

// ✅ Check if ID is passed
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Item ID");
}

$item_id = intval($_GET['id']);

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // If new image uploaded
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "../../frontend/all_iems/uploads/";
        $imageName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $imageName;

        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

        // ✅ Update with image
        $stmt = $conn->prepare("UPDATE items SET name=?, description=?, price=?, image=? WHERE id=?");
        $stmt->bind_param("ssdsi", $name, $description, $price, $imageName, $item_id);
    } else {
        // ✅ Update without changing image
        $stmt = $conn->prepare("UPDATE items SET name=?, description=?, price=? WHERE id=?");
        $stmt->bind_param("ssdi", $name, $description, $price, $item_id);
    }

    if ($stmt->execute()) {
        header("Location: /admin/view-item");
        exit;
    } else {
        echo "Update failed!";
    }
}

// ✅ Fetch existing data
$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->bind_param("i", $item_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Item not found!");
}

$item = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Item</title>
</head>
<body>
    <h2>Update Item</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required><?= htmlspecialchars($item['description']) ?></textarea><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" value="<?= $item['price'] ?>" required><br><br>

        <label>Image:</label><br>
        <img src="/frontend/all_iems/uploads/<?= $item['image'] ?>" width="100"><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
