<div class="header d-flex j-cn-ar a-i-cn">
    <div class="d-flex a-i-cn j-cn-cn">
        <img src="frontend/all_iems/image/favicon.png" alt=""> 
        <span>&nbsp; MDHH Shop</span>
    </div>
    <div>
        <ul class="d-flex a-i-cn">
            <a href="/"><li>Home</li></a>
            <a href="/item"><li>Item</li></a>
            <a href="/about"><li>About</li></a>
        </ul>
    </div>
    <div>
    <a href="/login"><span class="material-symbols-outlined">login</span></a>
    </div>
</div>
<?php include 'frontend/all_iems/js/gsap.php'; ?>
<script>
    var tl = gsap.timeline()
    tl.from("header div",{
        duration: 1,
        opacity: 0,
        y: -30,
        stagger:0.3
    })

</script>