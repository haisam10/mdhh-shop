<?php
// database connection
$host = 'localhost'; // change if needed
$dbname = 'mdhh-shop'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// Fetch products
$stmt = $pdo->query("SELECT * FROM items"); // table name = products
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>All Products</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .card {
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .card-group {
            width: 15vw;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background-color: rgb(0, 0, 0);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            border: 1px solid #1d1d1d;
            box-shadow: 1px 1px 12px 1px #1d1d1d;
            border-radius: 8px;
            transition: 0.3s all ease-in-out;

            &:hover {
                box-shadow: 0px 0px 10px var(--font-color);
                transition: 0.3s all ease-in-out;
            }
        }

        .card-group div {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0);
            padding: 10px;
            /* Adjust width as needed */
        }

        .card-image img {
            width: 100%;
            height: auto;
            border-radius: 3%;
            background: black;
            transition: all 0.5s ease-in-out;

            &:hover {
                transform: scale(1.15);
                transition: all 0.5s ease-in-out;
                box-shadow: 1px 1px 0px 0px transparent;
            }
        }

        .btn-price {
            background-color: #007BFF;
            color: white;
            border: none;
            width: 90px;
            font-size: 13px;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 25px !important;
            text-align: center;
        }

        .btn-price:hover {
            transition: 0.3s all ease-in-out;
            background-color: #0056b3;
        }

        .card-name {
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center; color: #ddd;">All Products</h2>

    <div class="d-flex card">
        <?php foreach ($products as $product): ?>
            <div class="card-group animation">
                <div class="card-image">
                    <?php if (!empty($product['item_image'])): ?>
                        <img src="frontend/all_iems/image/<?= htmlspecialchars($product['item_image']) ?>" alt="Product Image">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </div>
                <div class="card-name">Name: <?= htmlspecialchars($product['item_name']) ?></div>
                <div>Description: <?= htmlspecialchars($product['item_description']) ?></div>
                <div class="btn-price animation-right">Price: <?= htmlspecialchars($product['item_price']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include 'frontend/all_iems/js/gsap.php'; ?>
    <script>
        var tlm = gsap.timeline()
        var body = document.querySelector('body');
        var cursor = document.querySelector('.cursor');

        tlm.from("animation", {
            duration: 1,
            opacity: 0,
            y: -30,
            stagger: 0.3
        })

        body.addEventListener('mousemove', function(dets) {
            gsap.to(cursor, {
                x: dets.x,
                y: dets.y,
                ease: "elastic.out(2,0.3)",
                duration: 1,
            });
        });
    </script>

</body>

</html>