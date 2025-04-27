<?php
// Include database connection
include 'backend/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID from the POST request
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        // Prepare the SQL statement to delete the record
        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $message = "Record deleted successfully.";
        } else {
            $message = "Error deleting record: " . $conn->error;
        }

        $stmt->close();
    } else {
        $message = "Invalid ID.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Item</title>
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
            <h1>Delete Record</h1>
            <p>Use the form below to delete an item by its ID.</p>
        <?php if (isset($message)) : ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="id">Enter ID to delete:</label>
        <input type="number" id="id" name="id" required>
        <button type="submit">Delete</button>
    </form>
    <?php include_once 'backend/asset/view-item.php'; ?>
        </main>
    </div>
</body>
</html>
