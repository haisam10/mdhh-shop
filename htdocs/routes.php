<?php
session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

// সেগমেন্টে ভাগ করুন
$segments = explode('/', $path);

// রাউট ম্যাপিং
$routes = [
    '' => 'frontend/index.php',
    'item' => 'frontend/all_iems/component/all_items_modal.php',
    'cart' => 'frontend/all_iems/page/cart.php',
    'about' => 'frontend/all_iems/page/about.php',
    'contact' => 'frontend/all_iems/page/contact.php',
    'privacy-policy' => 'frontend/all_iems/page/privacy-policy.php',
    'terms-of-service' => 'frontend/all_iems/page/terms-of-service.php',
    'refund-policy' => 'frontend/all_iems/page/refund-policy.php',
    'developer-team' => 'frontend/all_iems/page/developer-team.php',
    'shipping-policy' => 'frontend/all_iems/page/shipping-policy.php',
    'faq-page' => 'frontend/all_iems/page/faq-page.php',
    'checkout' => 'frontend/all_iems/page/checkout.php',
    
    
    'admin' => 'backend/login.php',
    'admin/dashboard' => 'backend/index.php',
    'admin/add-item' => 'backend/asset/add-item.php',
    'admin/view-item' => 'backend/asset/view-item.php',
    'admin/order-list' => 'backend/asset/order-list.php',
    'admin/order-processing' => 'backend/asset/order-processing.php',
    'image' => 'frontend/all_iems/image.php',
];

// রুট চেক
$routeKey = $segments[0] ?? '';
$twoSegments = isset($segments[1]) ? $segments[0] . '/' . $segments[1] : null;

if ($twoSegments && array_key_exists($twoSegments, $routes)) {
    require $routes[$twoSegments];
} elseif (array_key_exists($routeKey, $routes)) {
    if ($routeKey === 'image') {
        $_GET['image_id'] = $segments[1] ?? null;
    }
    require $routes[$routeKey];
} else {
    require 'frontend/all_iems/404.php';
}
