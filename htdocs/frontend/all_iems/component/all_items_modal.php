<?php
// === A to Z Product Page with Modal Popup ===

// Database connection details
$host = 'localhost';
$dbname = 'mdhh-shop';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch all products from 'items' table
$stmt = $pdo->query("SELECT * FROM items");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>All Products with Modal Detail</title>
    <?php include 'frontend/all_iems/css/style.php'; ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login" />
    <style>
        body {
            background-color: #111;
            color: #ddd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 30px;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }

        .card {
            display: flex;
            background-color: #1a1a1a;
            border-radius: 10px;
            width: 220px;
            height: 320px;
            padding: 15px;
            box-shadow: 0 0 12px transparent;
            cursor: pointer;
            color: #ddd;
            position: relative;
            overflow: visible;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: -8px;
            border-radius: 14px;
            z-index: 0;
            box-shadow: 0 0 0 0 rgba(61, 106, 255, 0.7), 0 0 0 0 #ff2288;
            pointer-events: none;
            transition: box-shadow 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .card:hover {
            box-shadow: 0 0 10px #ffffff;
            transition: all 0.3s ease-in-out;
            transform: scale(1.05);
        }


        .card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: transparent;
            object-fit: cover;
            height: 150px;
        }

        .card-name {
            font-weight: 700;
            font-size: 1.2em;
            margin-bottom: 8px;
        }

        .price-tag {
            background-color: royalblue;
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            padding: 5px 25px;
            font-size: 1em;
            display: inline-block;
            margin-top: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.75);
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: #222;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
            padding: 25px 30px;
            box-shadow: 0 0 14px royalblue;
            color: #ddd;
            text-align: center;
        }

        .modal-content img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
            height: 300px;
            object-fit: contain;
            background-color: #000;
        }

        .modal-content h2 {
            margin-bottom: 15px;
            font-size: 2em;
        }

        .modal-content p {
            font-size: 1.1em;
            line-height: 1.5em;
            margin-bottom: 20px;
            color: #bbb;
        }

        .modal-content .price {
            font-size: 1.8em;
            font-weight: 700;
            color: #ff2288;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: transparent;
            border: none;
            font-size: 2em;
            color: royalblue;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-btn:hover {
            color: #fff;
        }

        .addToCartBtn {
            position: relative;
            padding: 10px 20px;
            border-radius: 7px;
            margin: 20px 0;
            border: 1px solid rgb(61, 106, 255);
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 2px;
            background: transparent;
            color: #fff;
            overflow: hidden;
            box-shadow: 0 0 0 0 transparent;
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }

        .addToCartBtn:hover {
            background: rgb(61, 106, 255);
            box-shadow: 0 0 30px 5px rgba(0, 142, 236, 0.815);
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
        }

        .addToCartBtn:hover::before {
            -webkit-animation: sh02 0.5s 0s linear;
            -moz-animation: sh02 0.5s 0s linear;
            animation: sh02 0.5s 0s linear;
        }

        .addToCartBtn::before {
            content: '';
            display: block;
            width: 0px;
            height: 86%;
            position: absolute;
            top: 7%;
            left: 0%;
            opacity: 0;
            background: #fff;
            box-shadow: 0 0 50px 30px #fff;
            -webkit-transform: skewX(-20deg);
            -moz-transform: skewX(-20deg);
            -ms-transform: skewX(-20deg);
            -o-transform: skewX(-20deg);
            transform: skewX(-20deg);
        }

        @keyframes sh02 {
            from {
                opacity: 0;
                left: 0%;
            }

            50% {
                opacity: 1;
            }

            to {
                opacity: 0;
                left: 100%;
            }
        }

        .addToCartBtn:active {
            box-shadow: 0 0 0 0 transparent;
            -webkit-transition: box-shadow 0.2s ease-in;
            -moz-transition: box-shadow 0.2s ease-in;
            transition: box-shadow 0.2s ease-in;
        }

        .img-magnifier-container {
            position: relative;
        }

        .img-magnifier-glass {
            position: absolute;
            pointer-events: none;
            border: 3px solid crimson;
            border-radius: 50%;
            cursor: none;
            top: 0;
            left: 0;
            /*Set the size of the magnifier glass:*/
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <?php include 'frontend/all_iems/component/cursor.php'; ?>
    <?php include 'frontend/all_iems/component/mini-header.php'; ?>
    <?php include 'frontend/all_iems/component/header.php'; ?>
    <main>
        <h1>Our Products</h1>

        <div class="card-container">
            <?php foreach ($products as $product): ?>
                <div class="card"
                    data-image="<?= htmlspecialchars($product['item_image']) ?>"
                    data-name="<?= htmlspecialchars($product['item_name']) ?>"
                    data-description="<?= htmlspecialchars($product['item_description']) ?>"
                    data-price="<?= number_format($product['item_price'], 2) ?>">

                    <?php if (!empty($product['item_image'])): ?>
                        <img src="frontend/all_iems/image/<?= htmlspecialchars($product['item_image']) ?>" alt="<?= htmlspecialchars($product['item_name']) ?>" loading="lazy" />
                    <?php else: ?>
                        <div style="height:150px; background:#444; line-height:150px;">No Image</div>
                    <?php endif; ?>

                    <div class="card-name"><?= htmlspecialchars($product['item_name']) ?></div>
                    <div class="price-tag">৳ <?= number_format($product['item_price'], 2) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Modal Structure -->
        <div class="modal" id="productModal">
            <div class="modal-content img-magnifier-container">
                <button class="close-btn" id="modalClose">&times;</button>
                <img id="modalImage" src="" alt="Product Image" width="600" height="400" />
                <h2 id="modalName">Product Name</h2>
                <p id="modalDescription">Product Description</p>
                <div class="price" id="modalPrice">৳ 0.00</div>
                <button class="addToCartBtn" id="addToCartBtn">
                    Add to Cart
                </button>
            </div>
        </div>

    </main>
    <?php include 'frontend/all_iems/component/footer.php'; ?>

    <script>
        const cards = document.querySelectorAll('.card');
        const modal = document.getElementById('productModal');
        const modalClose = document.getElementById('modalClose');
        const modalImage = document.getElementById('modalImage');
        const modalName = document.getElementById('modalName');
        const modalDescription = document.getElementById('modalDescription');
        const modalPrice = document.getElementById('modalPrice');
        const addToCartBtn = document.getElementById('addToCartBtn');
        let currentProduct = {};

        // কার্ড ক্লিক করলে modal দেখাও
        cards.forEach(card => {
            card.addEventListener('click', () => {
                const image = card.getAttribute('data-image');
                const name = card.getAttribute('data-name');
                const description = card.getAttribute('data-description');
                const price = card.getAttribute('data-price');

                currentProduct = {
                    image,
                    name,
                    description,
                    price
                };

                modalImage.src = image ? `frontend/all_iems/image/${image}` : '';
                modalImage.alt = name || 'Product Image';
                modalName.textContent = name || 'No name available';
                modalDescription.textContent = description || 'No description available';
                modalPrice.textContent = price ? ('৳ ' + price) : 'Price not available';

                modal.classList.add('active');
            });
        });

        // কার্টে যোগ করার ফাংশন
        addToCartBtn.addEventListener('click', () => {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            const exists = cart.find(p => p.name === currentProduct.name);
            if (!exists) {
                cart.push(currentProduct);
                localStorage.setItem('cart', JSON.stringify(cart));
                alert('✅ কার্টে যোগ করা হয়েছে!');
            } else {
                alert('🛒 এই প্রোডাক্টটি আগেই কার্টে আছে।');
            }

            updateCartCount();
            modal.classList.remove('active'); // কার্টে যোগ করার পর modal বন্ধ
        });

        // কার্টের সংখ্যা আপডেট
        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById('cartCount').textContent = cart.length;
        }
        updateCartCount();

        // Modal বন্ধ করার ফাংশন
        modalClose.addEventListener('click', () => {
            modal.classList.remove('active');
        });

        modal.addEventListener('click', e => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    </script>
    <script>
        var tl = gsap.timeline()
        gsap.from(".card", {
            duration: 1.5,
            opacity: 0,
            stagger: 0.3
        });
    </script>
    <?php include 'frontend/all_iems/js/magnify.php'; ?>
</body>

</html>