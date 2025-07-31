<style>
      .loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: transparent;
    color: white;
    font-size: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;

    img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      border: 2px solid royalblue;
    }
  }
</style>
<p class="mini-header">
    up to 20% discount on all items
</p>
<div class="loader">
  <img src="http://localhost/frontend/all_iems/component/Christmas%20Loading.gif" alt="">
</div>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
  window.addEventListener('load', () => {
    gsap.to('.loader', {
      opacity: 0,
      duration: 1,
      ease: 'power2.inOut',
      onComplete: () => {
        document.querySelector('.loader').style.display = 'none';
        document.querySelector('.main-content').style.display = 'block';
      }
    });
  });
</script>