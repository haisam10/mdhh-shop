<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
    <style>
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        table {
            border: 1px solid #ddd;
        }
        th{
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <?php include_once 'backend/asset/header.php'; ?>
    <div class="d-flex">
        <?php include_once 'backend/asset/slidebar.php'; ?>
        <main>
            <?php
            // Database connection
            include 'backend/connect.php'; // Ensure this file contains the correct database connection code
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: {$conn->connect_error}");
            }
            echo "<h1>Show All Table</h1>";
            // Query to fetch all items
            $sql = "SELECT * FROM items";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table style='width: 95%; border-collapse: collapse; margin: 20px 0; font-size: 18px; text-align: left;'>";
                echo "<tr style='background-color: #f2f2f2;'>";
                // Fetch column names dynamically
                while ($field = $result->fetch_field()) {
                    echo "<th style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($field->name) . "</th>";
                }
                echo "</tr>";
            
                // Fetch rows
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $value)) {
                            echo "<td style='border: 1px solid #ddd; padding: 8px;'><img src='" . htmlspecialchars($value) . "' alt='Image' style='max-width: 100px; max-height: 100px;'></td>";
                        } else {
                            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($value) . "</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No records found.";
            }
            
            $conn->close();
            ?>
        </main>
    </div>
    
</body>
</html>