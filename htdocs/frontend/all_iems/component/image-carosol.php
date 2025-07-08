<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "mdhh-shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Collect data in array (for looping twice for seamless scroll)
$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}
?>

<div id="carousel" style="width: 100%; overflow: hidden; position: relative;">
    <div id="carousel-images" style="display: flex; transition: none; white-space: nowrap;">
        <?php
        // Loop twice for seamless scroll
        for ($i = 0; $i < 2; $i++) {
            foreach ($items as $item) {
                ?>
                <div>
                    <img src="frontend/all_iems/image/<?= htmlspecialchars($item['item_image']) ?>" alt="<?= htmlspecialchars($item['item_name']) ?>" style="width: 300px;">
                    <div id="hero-area-image-side-tag">
                        <?= htmlspecialchars($item['item_name']) ?>
                        <button>Price: <?= htmlspecialchars($item['item_price']) ?> BDT</button>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<script>
    const carouselImages = document.getElementById('carousel-images');
    let scrollAmount = 0;

    function startScrolling() {
        const speed = 0.5;
        scrollAmount -= speed;
        carouselImages.style.transform = `translateX(${scrollAmount}px)`;

        if (Math.abs(scrollAmount) >= carouselImages.scrollWidth / 2) {
            scrollAmount = 0;
        }

        requestAnimationFrame(startScrolling);
    }

    startScrolling();
</script>
