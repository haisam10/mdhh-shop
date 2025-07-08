<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login');
        .big-title {
            background-color: royalblue;
            height: 100%;
            overflow-x: hidden;
            padding: 15px 10px;
            h2{
            background-color: var(--first-color);
            color: var(--fourth-color);
            font-size: 30vw;
            font-weight: 600;
            text-transform: uppercase;
            flex-direction: column;
            text-align: center;
            white-space: nowrap;
            span{
                color: yellowgreen;
            }
            }
        }
    </style>
    <div class="big-title">
        <h2>welcome to <span>mdhh</span> shop</h2>
    </div>
</div>
<?php include 'frontend/all_iems/js/gsap.php'; ?>
<script>
    gsap.to(".big-title h2", {
        transform:"translateX(-320%)",
        scrollTrigger:{
            trigger:".big-title h2",
            scroller:"body",
            start:"top 0%",
            end:"top -200%",
            scrub:5,
            pin:true
        }
    });
</script>