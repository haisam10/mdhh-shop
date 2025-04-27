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
            <form method="post" enctype="multipart/form-data">
                <label>Item Name:</label>
                <input type="text" name="item_name" required>
                <label>Item Description:</label>
                <textarea name="item_description" required></textarea>
                <label>Item Price:</label>
                <input type="number" name="item_price" required>
                <button type="submit">Update Item</button>
            </form>
        </main>
    </div>
</body>
</html>