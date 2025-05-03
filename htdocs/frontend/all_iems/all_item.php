<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDHH Shop</title>
    <link rel="shortcut icon" href="frontend/all_iems/image/favicon.png" type="image/x-icon"> 
    <?php require 'frontend/all_iems/css/style.php' ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login" />
</head>
<body>
    <!-- item page -->
    <header>
        <span class="txt-cn">
            <?php include 'component/mini-header.php';?>
        </span>
        <div>
            <?php include 'component/header.php';?>
        </div>
    </header>
    <div>
        <?php include 'component/all-item.php';?>
    </div>
    <footer>
        <?php include 'component/footer.php';?>
    </footer>
</body>
</html>
