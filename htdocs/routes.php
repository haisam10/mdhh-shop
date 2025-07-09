<?php
session_start(); // if you have login checks

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

// Split path by slashes
$segments = explode('/frontend/all_iems/404.php', $path);

// Define routes
$routes = [
    // Frontend routes
    '' => 'frontend/index.php',
    'item' => 'frontend/all_iems/all_item.php',
    'about' => 'frontend/all_iems/page/about.php',
    'contact' => 'frontend/all_iems/page/contact.php',
    'privacy-policy' => 'frontend/all_iems/page/privacy-policy.php',
    'terms-of-service' => 'frontend/all_iems/page/terms-of-service.php',
    'refund-policy' => 'frontend/all_iems/page/refund-policy.php',
    'developer-team' => 'frontend/all_iems/page/developer-team.php',
    'shipping-policy' => 'frontend/all_iems/page/shipping-policy.php',
    'faq-page' => 'frontend/all_iems/page/faq-page.php',

    
    // Admin routes
    'admin' => 'backend/login.php',
    'login' => 'frontend/all_iems/login.php',
    'admin/dashboard' => 'backend/index.php',
    'image' => 'frontend/all_iems/image.php',
    'admin/add-item' => 'backend/asset/add-item.php',
    'admin/view-item' => 'backend/asset/view-item.php',
    'admin/delete-item' => 'backend/asset/delete.php',
    'admin/update-item' => 'backend/asset/update.php',
];

// Check if the first segment is a route
if (array_key_exists($segments[0], $routes)) {

    // If it's 'image', pass the second segment (image ID or name)
    if ($segments[0] === 'image') {
        $_GET['image_id'] = $segments[1] ?? null; // safely set image id
    }

    require $routes[$segments[0]];
} else {
    require 'frontend/all_iems/404.php';
}

// .htaccess file

// RewriteEngine On
// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteRule ^(.*)$ index.php [QSA,L]
