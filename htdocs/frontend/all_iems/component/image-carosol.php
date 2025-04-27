<div id="carousel" style="width: 100%; overflow: hidden; position: relative;">
    <div id="carousel-images" style="display: flex; transition: none; white-space: nowrap;">
        <div>
            <img src="frontend/all_iems/image/baby-cap-black.avif" alt="Image 1" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/baby-onesie-beige-1.avif" alt="Image 2" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/bag-1-dark.avif" alt="Image 3" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/mug-1.avif" alt="Image 4" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/cup-black.avif" alt="Image 5" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/hoodie-1.avif" alt="Image 6" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/t-shirt-1.avif" alt="Image 7" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <!-- Duplicate images for seamless scrolling -->
        <div>
            <img src="frontend/all_iems/image/baby-cap-black.avif" alt="Image 1" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/baby-onesie-beige-1.avif" alt="Image 2" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/bag-1-dark.avif" alt="Image 3" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/mug-1.avif" alt="Image 4" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/cup-black.avif" alt="Image 5" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/hoodie-1.avif" alt="Image 6" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
        <div>
            <img src="frontend/all_iems/image/t-shirt-1.avif" alt="Image 7" style="width: 300px;">
            <div id="hero-area-image-side-tag">{item-name}<button>Price: {amount} BDT</button></div>
        </div>
    </div>
</div>

<script>
    const carouselImages = document.getElementById('carousel-images');
    let scrollAmount = 0;

    function startScrolling() {
        const speed = 0.5; // Adjust speed for smooth scrolling
        scrollAmount -= speed;
        carouselImages.style.transform = `translateX(${scrollAmount}px)`;

        // Reset scroll position for seamless effect
        if (Math.abs(scrollAmount) >= carouselImages.scrollWidth / 2) {
            scrollAmount = 0;
        }

        requestAnimationFrame(startScrolling);
    }

    // Start the continuous scrolling
    startScrolling();
</script>
