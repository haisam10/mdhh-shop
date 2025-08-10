 <?php if (count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
            <div class="product">
                <?php if (!empty($product['image_url'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <?php else: ?>
                    <img src="images/no-image.png" alt="No image">
                <?php endif; ?>

                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                <p><strong>Price: $<?php echo number_format($product['price'], 2); ?></strong></p>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>

    <?php
// DB connection details
$host = 'localhost';
$db   = 'mdhh-shop';
$user = 'root';        // your MySQL username
$pass = '';            // your MySQL password
$charset = 'utf8mb4';

// Set DSN
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Connect using PDO
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch all products
$stmt = $pdo->query("SELECT * FROM items");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>