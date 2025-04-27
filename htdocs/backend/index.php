<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <style>
    body{
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
    }
    h2 {
      color: #333;
      font-size: 50px;
    }
    p {
      color: #666;
    }
  </style>
</head>
<body>
  <?php include_once 'backend/asset/header.php'; ?>
<div class="d-flex">
  <?php include_once 'backend/asset/slidebar.php'; ?>
  <main>
    <h2>Welcome to the Dashboard ;)</h2>
    <p>Use the navigation links to manage your items.</p>
    <a href="https://haisam10.github.io/haisam_/" target="_blank" rel="noopener noreferrer">MDHH Group</a>
  </main>
</div>
</body>
</html>