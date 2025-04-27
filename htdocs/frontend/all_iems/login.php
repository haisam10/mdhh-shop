<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "mdhh-shop"); // Update with your database credentials

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $stmt = $conn->prepare("SELECT * FROM `login-user` WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $loginSuccess = true; // Set the flag to true
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require 'frontend/all_iems/css/style.php' ?>
    <style>
        /* Your existing styles */
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            text-align: center;
            padding: 50px;
            margin: 0;
        }
        h2 {
            margin-top: 0;
            font-size: 2.5em;
            color: #2980b9;
        }
        form {
            display: inline-block;
            background-color: #000;
            box-shadow: 0px 0px 10px #3498db;
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            width: 100%;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px 10px;
            margin: 10px 0 20px;
            border-radius: 8px;
            border: none;
            color: #fff;
            font-size: 1em;
            box-sizing: border-box;
            background-color: #26262c;
        }
        label {
            color:rgb(122, 122, 122);
            margin-bottom: 5px;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0px 0px 10px #3498db;
        }
        button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
        button:active {
            transform: scale(1);
        }
        p {
            font-size: 1em;
            color: #e74c3c;
        }
        .login-container {
            justify-content: center;
            align-items: center;
            margin: 15vh auto;
        }
    </style>

</head>
<body>
    <?php include 'component/header.php';?>
    <div class="login-container animation-bottom">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Login</button>
    </form>

    <?php if ($loginSuccess): ?>
        <script>
            alert("Login Done");
            window.location.href = "/"; // Redirect to the dashboard
        </script>
    <?php endif; ?>
    </div>
</body>
</html>
