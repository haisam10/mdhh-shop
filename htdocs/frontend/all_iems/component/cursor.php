<div class="cursor"></div>
<style>
    .cursor {
        background-color: yellowgreen;
        opacity: 0.8;
        width: 20px;
        height: 20px;
        position: fixed;
        top: 0;
        left: 0;
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
    }
</style>
<?php include 'frontend/all_iems/js/gsap.php'; ?>
 <script>
        var body = document.querySelector('body');
        var cursor = document.querySelector('.cursor');

        body.addEventListener('mousemove', function(dets) {
            gsap.to(cursor, {
                x: dets.x,
                y: dets.y,
                ease: "elastic.out(2,0.3)",
                duration: 1,
            });
        });
    </script>