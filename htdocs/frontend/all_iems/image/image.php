<?php
// A mockup EMJ array with images
$images = [
  1 => 'cup-black.avif',
  2 => 'banana.jpg',
  3 => 'cherry.jpg',
  5 => 'dragonfruit.jpg'
];

// Get the image ID
$image_id = $_GET['image_id'] ?? null;

if ($image_id && isset($images[$image_id])) {
  $image_file = $images[$image_id];
  
  // Full path
  $image_path = __DIR__ . '/images/' . $image_file;

  if (file_exists($image_path)) {
    header('Content-Type: image/jpeg'); // or correct mime type
    readfile($image_path);
    exit();
  } else {
    echo "Image not found on server.";
  }
} else {
  echo "Invalid image ID.";
}
