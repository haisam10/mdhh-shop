<script>
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    document.getElementById("cartCount").textContent = cart.length;
    const phoneCart = document.getElementById("cartCount_phone");
    if (phoneCart) phoneCart.textContent = cart.length;
  }

  document.addEventListener("DOMContentLoaded", updateCartCount);
</script>