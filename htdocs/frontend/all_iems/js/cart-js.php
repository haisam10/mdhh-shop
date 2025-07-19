<script>
  // Function to update the cart count display
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    document.getElementById("cartCount").textContent = cart.length;
  }

  // Call it on page load
  document.addEventListener("DOMContentLoaded", updateCartCount);
</script>
