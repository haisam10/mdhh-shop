<?php
session_start(); // if you have login checks

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

// Split path by slashes
$segments = explode('/', $path);

// Define routes
$routes = [
  '' => 'frontend/index.php',
  'item' => 'frontend/all_iems/all_item.php',
  'admin' => 'backend/login.php',
  'login' => 'frontend/all_iems/login.php',
  'dashboard' => 'backend/index.php',
  'image' => 'frontend/all_iems/image.php',
  'add-item' => 'backend/asset/add-item.php',
  'view-item' => 'backend/asset/view-item.php',
  'delete-item' => 'backend/asset/delete.php',
  'update-item' => 'backend/asset/update.php',
];

// Check if the first segment is a route
if (array_key_exists($segments[0], $routes)) {
  
  // If it's 'image', pass the second segment (image ID or name)
  if ($segments[0] === 'image') {
    $_GET['image_id'] = $segments[1] ?? null; // safely set image id
  }

  require $routes[$segments[0]];
} 
else {
  require 'frontend/all_iems/404.php';
}
