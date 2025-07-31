<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Database connection
$conn = new mysqli("localhost", "root", "", "mdhh-shop"); // Update with your DB credentials

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement for security (avoid SQL injection)
    $stmt = $conn->prepare("SELECT * FROM `admin_login` WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin/dashboard"); // Redirect to dashboard (full path or relative)
        exit();
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <!-- আপনার CSS ফাইল যুক্ত করুন -->
    <style>
        /* আপনার CSS কোড এখানে */
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            text-align: center;
            padding: 50px;
            margin: 0;
            background: #111;
        }
        h2 {
            margin-top: 0;
            font-size: 2.5em;
            color: #2980b9;
        }
        form {
            display: inline-block;
            background-color: #000;
            box-shadow: 0 0 10px #3498db;
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
            background-color: #26262c;
            box-sizing: border-box;
        }
        label {
            color: rgb(122, 122, 122);
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 10px #3498db;
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
            width: 100%;
        }
        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
        button:active {
            transform: scale(1);
        }
        p.error {
            font-size: 1em;
            color: #e74c3c;
        }
        .login-container {
            justify-content: center;
            align-items: center;
            margin: 25vh auto;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-container animation-bottom">
        <h2>Admin Login</h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
