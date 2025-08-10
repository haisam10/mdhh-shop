<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login');

        .big-title {
            margin-top: 50px;
            position: relative;
            background-color: transparent;
            height: 100%;
            overflow-x: hidden;
            padding: 15px 10px;
            box-shadow: 0px -20px 20px 0px rgba(5, 18, 37, 0.9);

            h2 {
                background-color: var(--first-color);
                color: var(--text-color);
                font-size: 20vw;
                font-weight: 600;
                text-transform: uppercase;
                flex-direction: column;
                text-align: center;
                white-space: nowrap;
                span {
                    color: yellowgreen;
                }
            }

            .bg-video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                object-fit: cover;
                z-index: -1;
            }
        }
        .phone_big-title {
            display: none;
        }
        @media only screen and (max-width: 750px) {
            .big-title {
                display: none;
            }
            .phone_big-title {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100vw;
                overflow: hidden;
                height: 100vh;
                h2 {
                display: flex;
                padding: 20px;
                background-color: var(--first-color);
                color: var(--text-color);
                font-size: 15vw;
                font-weight: 600;
                text-transform: uppercase;
                flex-direction: column;
                text-align: center;
                white-space: nowrap;
                span {
                    color: yellowgreen;
                }
            }
            }
            .bg-video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                object-fit: cover;
                z-index: -1;
            }
        }
    </style>
    <div class="big-title">
        <div>
            <h2>Buy your <span>dreams</span></h2>
            <video autoplay muted loop playsinline class="bg-video">
            <source src="frontend/all_iems/video/style_vid_1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>
    </div>
    <div class="phone_big-title">
        <div>
            <h2>Buy your <span>dreams</span></h2>
            <video autoplay muted loop playsinline class="bg-video">
            <source src="frontend/all_iems/video/style_vid_1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>
    </div>
</div>
<?php include 'frontend/all_iems/js/gsap.php'; ?>
<script>
    gsap.to(".big-title h2", {
        transform: "translateX(-110%)",
        scrollTrigger: {
            ease: "power1.out",
            duration: 2,
            trigger: ".big-title h2",
            scroller: "body",
            start: "top 0%",
            end: "top -120%",
            scrub: 1,
            pin: true,
            // markers: true,
        },
    });
</script>

</script>