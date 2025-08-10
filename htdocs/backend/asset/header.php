<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    header{
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
      h3{
        color: #111;
      }
    }
    #btn{
      background-color: #111;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
    }
    #from_sl-bar{
        background-color: transparent;
        margin: 0;
        padding: 0;
    }
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
      z-index: 1;
      img{
        width: 200px;
        height: 200px;
        border-radius: 50%!important;
        border: 2px solid yellowgreen;
      }
    }
</style>
</head>
<body>
  <div class="loader">
    <img src="http://localhost/backend/asset/Loading.gif" alt="">
  </div>
<header class="d-flex justify-content-between align-items-center">
    <h3>MDHH Shop Dashboard</h3> 
    <form method="POST" id="from_sl-bar">
    <button type="submit" id="btn">Reload</button>
  </form>
</header>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script>
    window.addEventListener('load', () => {
      gsap.to('.loader', {
        opacity: 0,
        duration: 0.4,
        onComplete: () => {
          document.querySelector('.loader').style.display = 'none';
          document.querySelector('.main-content').style.display = 'block';
        }
      });
    });
  </script>
</body>
</html>