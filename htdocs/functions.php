<?php
function wp_dashboard() {
    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);
    $routes = [
        'dashboard' => 'backend/asset/add-item.php',
    ];
    if (array_key_exists($path, $routes)) {
        require $routes[$path];
    }
  }