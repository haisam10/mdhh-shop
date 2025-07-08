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
</style>
</head>
<body>
<header class="d-flex justify-content-between align-items-center">
    <h3>MDHH Shop Dashboard</h3> 
    <form method="POST" id="from_sl-bar">
    <button type="submit" id="btn">Reload</button>
  </form>
</header>
</body>
</html>