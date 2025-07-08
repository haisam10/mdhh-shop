<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body{
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
    }
    .d-flex{
      display: flex;
    }
    .justify-content-between{
      justify-content: space-between;
    }
    .align-items-center{
      align-items: center;
    }
    .slidebar{
        display: flex;
        gap: 30px;
    }
    .slidebar_dev{
      background-color: #f4f4f9;
      width: 200px;
      height: 100vh;
      gap: 20px;
      z-index: 1;
    }
    header{
      background-color: yellowgreen;
      color: white;
      padding: 10px;
    }
    nav{
      display: flex;
      gap: 20px;
      background-color: #111;
      height: 100%;
      width: 100%;
      a{
        padding: 10px;
        width: 100%;
        color: white;
        text-decoration: none;
        &:hover{
          background-color: royalblue;
          color: white;
          text-decoration: underline;
          border-radius: 0px 50px 50px 0px;
        }
      }
    }
  </style>
</head>
<body>
  <?php include_once 'backend/asset/header.php'; ?>
<div class="d-flex align-items-center slidebar">
  <div class="slidebar_dev">
    <nav class="d-flex anim" style="flex-direction: column;">
        <a href="dashboard">Home</a>
      <a href="add-item">Add Item</a>
      <a href="view-item">View Items</a>
      <a href="update-item">Update Item</a>
      <a href="delete-item">Delete Item</a>
      <a href="/">Logout</a>
</div>
  <main>
    <!-- dashbord show -->
  </main>
</div>

<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Do something, like save to database

//     // Reload the page
//     header("Location: " . $_SERVER['REQUEST_URI']);
//     exit();
// }
?>
</body>
</html>