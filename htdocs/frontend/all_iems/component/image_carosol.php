<style>
    .carousel {
        position: relative;
        width: 80%;
        margin: 0 auto;
        max-width: 800px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 0px 15px rgba(255, 255, 255, 0.7);
    }

    .carousel-track {
        display: flex;
        width: 100%;
    }

    .carousel-item {
        position: relative;
        min-width: 100%;
    }

    .carousel-img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    .carousel-caption {
        position: absolute;
        bottom: 15%;
        left: 5%;
        color: white;
        background-color: rgba(65, 105, 225,0.5);
        /* background-color: rgba(0, 0, 0, 0.6); */
        padding: 15px 25px;
        border-radius: 5px;
        font-size: 1.8rem;
        font-weight: bold;
    }

    .controls {
        position: absolute;
        bottom: 10px;
        width: 100%;
        text-align: center;
    }

    .controls button {
        /* background-color: rgba(255, 255, 255, 0.2); */
        background-color: royalblue;
        border: none;
        color: white;
        padding: 10px 20px;
        margin: 0 10px;
        font-size: 1.2rem;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
<div class="carousel">
    <div class="carousel-track">
        <div class="carousel-item">
            <img src="frontend/all_iems/image/style_pic_1.jpg" class="carousel-img" />
            <div class="carousel-caption"> Skilled tailor</div>
        </div>
        <div class="carousel-item">
            <img src="frontend/all_iems/image/style_pic_2.jpg" class="carousel-img" />
            <div class="carousel-caption">Skilled designer</div>
        </div>
        <div class="carousel-item">
            <img src="frontend/all_iems/image/style_pic_3.jpg" class="carousel-img" />
            <div class="carousel-caption">New Branch</div>
        </div>
        <div class="carousel-item">
            <img src="frontend/all_iems/image/style_pic_4.jpg" class="carousel-img" />
            <div class="carousel-caption">Live Your Dreams</div>
        </div>
        <div class="carousel-item">
            <img src="frontend/all_iems/image/style_pic_5.jpg" class="carousel-img" />
            <div class="carousel-caption">Buy our brand products</div>
        </div>
    </div>
    <div class="controls">
        <button id="prevBtn">⟵</button>
        <button id="nextBtn">⟶</button>
    </div>
</div>
<!-- Include GSAP Link -->
<?php include 'frontend/all_iems/js/gsap.php'; ?>
<!-- GSAP for smooth transitions -->
<script>
    const track = document.querySelector(".carousel-track");
    const items = document.querySelectorAll(".carousel-item");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    let currentIndex = 0;
    const imageWidth = items[0].clientWidth;

    function goToSlide(index) {
        if (index < 0) index = items.length - 1;
        else if (index >= items.length) index = 0;
        currentIndex = index;

        gsap.to(track, {
            x: -imageWidth * currentIndex,
            duration: 0.8,
            ease: "power2.out"
        });
    }

    nextBtn.addEventListener("click", () => goToSlide(currentIndex + 1));
    prevBtn.addEventListener("click", () => goToSlide(currentIndex - 1));

    // Optional: Auto Slide
    setInterval(() => {
        goToSlide(currentIndex + 1);
    }, 5000);
</script>