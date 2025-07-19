<style>
/* .cart-icon{
    color: white;
    text-decoration: none;
    padding: 10px;
    background-color: transparent;
    border-radius: 5px;
    transition: 0.3s ease;
}
.cart-icon:hover {
    background-color: rebeccapurple;
} */
.cart-icon {
  width: 10em;
  position: relative;
  height: 3.5em;
  border: 3px ridge #149CEA;
  outline: none;
  background-color: transparent;
  color: white;
  transition: 1s;
  border-radius: 0.3em;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  padding: 10px 20px;
  text-decoration: none;
}

.cart-icon::after {
  content: "";
  position: absolute;
  top: -10px;
  left: 3%;
  width: 95%;
  height: 40%;
  background-color: #111;
  transition: 0.5s;
  transform-origin: center;
}

.cart-icon::before {
  content: "";
  transform-origin: center;
  position: absolute;
  top: 80%;
  left: 3%;
  width: 95%;
  height: 40%;
  background-color: #111;
  transition: 0.5s;
}

.cart-icon:hover::before, .cart-icon:hover::after {
  transform: scale(0)
}

.cart-icon:hover {
  box-shadow: inset 0px 0px 25px #1479EA;
}

</style>
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
    <a href="cart" class="cart-icon">🛒 Cart (<span id="cartCount">0</span>)</a>
    <!-- From Uiverse.io by Spacious74 --> 

    <?php include 'frontend/all_iems/js/cart-js.php'; ?>
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
