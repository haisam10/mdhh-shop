<style>
  /* Desktop Cart Button */
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

  .cart-icon::after,
  .cart-icon::before {
    content: "";
    position: absolute;
    left: 3%;
    width: 95%;
    height: 40%;
    background-color: #0F0F0F;
    transition: 0.5s;
    transform-origin: center;
  }

  .cart-icon::after {
    top: -10px;
  }

  .cart-icon::before {
    top: 80%;
  }

  .cart-icon:hover::before,
  .cart-icon:hover::after {
    transform: scale(0);
  }

  .cart-icon:hover {
    box-shadow: inset 0px 0px 25px #1479EA;
  }

  /* Loader */
  .loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #000;
    color: white;
    font-size: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }

  .loader img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 2px solid yellowgreen;
  }

  /* Responsive */
  @media only screen and (max-width: 750px) {
    .header {
      display: none !important;
    }

    .phone-view-header {
      display: flex !important;
      justify-content: flex-start;
      align-items: center;
      padding: 10px 20px;
      background-color: rgba(18, 23, 66, 0.63);
      position: fixed !important;
      width: 100vw;
      top: 0;
      z-index: 100;
    }

    .phone-view-header img {
      height: 40px;
      margin-right: 10px;
    }

    .phone-view-header ul {
      display: flex;
      gap: 10px;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .phone-view-header a {
      padding: 10px;
      text-decoration: none;
      color: white;
    }

    .phone-view-header a li {
      font-size: 1.2rem;
      font-weight: 500;
    }

    .phone-view-header a:hover {
      color: #149CEA;
    }

    .phone-cart {
      padding: 5px 10px;
      border-radius: 5px;
      background: transparent;
      transition: 0.3s ease;
    }
  }
</style>

<!-- Phone View Header -->
<div class="phone-view-header" style="display: none;">
  <img src="frontend/all_iems/image/favicon.png" alt="Logo">
  <ul class="d-flex a-i-cn">
    <a href="/"><li>🏠</li></a>
    <a href="/item"><li>👕</li></a>
    <a href="/about"><li>ℹ️</li></a>
    <a href="cart" class="phone-cart">🛒(<span id="cartCount_phone">0</span>)</a>
  </ul>
</div>
<!-- Phone View Header End -->

<!-- Desktop Header -->
<div class="header d-flex j-cn-ar a-i-cn">
  <div class="d-flex a-i-cn j-cn-cn">
    <img src="frontend/all_iems/image/favicon.png" alt="Logo">
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
  </div>
</div>

<!-- PHP Includes -->
<?php include 'frontend/all_iems/js/cart-js.php'; ?>
<?php include 'frontend/all_iems/js/gsap.php'; ?>

<!-- GSAP Animation -->
<script>
  var tl = gsap.timeline();
  tl.from(".header div", {
    duration: 1,
    opacity: 0,
    y: -30,
    stagger: 0.3
  });
</script>

<!-- Update Cart Count Script -->
<script>
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    document.getElementById("cartCount").textContent = cart.length;
    const phoneCart = document.getElementById("cartCount_phone");
    if (phoneCart) phoneCart.textContent = cart.length;
  }

  document.addEventListener("DOMContentLoaded", updateCartCount);
</script>
