<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Cart Page</title>
<style>
    body {
        background-color: #111;
        color: #ddd;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px;
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    .cart-container {
        max-width: 800px;
        margin: auto;
    }
    .cart-item {
        display: flex;
        background-color: #222;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 10px;
        align-items: center;
        gap: 20px;
    }
    .cart-item img {
        width: 120px;
        height: 120px;
        object-fit: contain;
        border-radius: 8px;
        background: #000;
    }
    .item-info {
        flex: 1;
    }
    .item-name {
        font-size: 1.2em;
        font-weight: bold;
    }
    .item-price {
        color: royalblue;
        font-size: 1.1em;
        margin-top: 8px;
    }
    /* From Uiverse.io by cssbuttons-io */ 
.noselect {
 width: 150px;
 height: 50px;
 cursor: pointer;
 display: flex;
 align-items: center;
 background: red;
 border: none;
 border-radius: 5px;
 box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
 background: #e62222;
}

.noselect, .noselect span {
 transition: 200ms;
}

.noselect .text {
 transform: translateX(35px);
 color: white;
 font-weight: bold;
}

.noselect .icon {
 position: absolute;
 border-left: 1px solid #c41b1b;
 transform: translateX(110px);
 height: 40px;
 width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
}

.noselect svg {
 width: 15px;
 fill: #eee;
}

.noselect:hover {
 background: #ff3636;
}

.noselect:hover .text {
 color: transparent;
}

.noselect:hover .icon {
 width: 150px;
 border-left: none;
 transform: translateX(0);
}

.noselect:focus {
 outline: none;
}

.noselect:active .icon svg {
 transform: scale(0.8);
}
    .total {
        text-align: center;
        margin-top: 40px;
        font-size: 1.5em;
        font-weight: bold;
        color: lightgreen;
    }
</style>
<link rel="shortcut icon" href="frontend/all_iems/image/favicon.png" type="image/x-icon">
<?php require 'frontend/all_iems/css/style.php'; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login" />
</head>
<body>
    <!-- Cursor for hover effect -->
    <?php include 'frontend/all_iems/component/cursor.php'; ?>
    <?php include 'frontend/all_iems/component/mini-header.php'; ?>
    <?php include 'frontend/all_iems/component/header.php'; ?>
    <h1>🛒 Your Cart</h1>
    <div class="cart-container" id="cartContainer"></div>
    <div class="total" id="totalPrice"></div>
    <?php include 'frontend/all_iems/component/footer.php'; ?>
<script>
    const cartContainer = document.getElementById('cartContainer');
    const totalPriceEl = document.getElementById('totalPrice');

    function loadCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartContainer.innerHTML = '';

        if(cart.length === 0){
            cartContainer.innerHTML = '<p style="text-align:center;">আপনার কার্ট খালি।</p> ';
            totalPriceEl.textContent = '';
            return;
        }

        let total = 0;
        cart.forEach((item, index) => {
            total += parseFloat(item.price);

            const div = document.createElement('div');
            div.className = 'cart-item';
            div.innerHTML = `
                <img src="frontend/all_iems/image/${item.image}" alt="${item.name}" />
                <div class="item-info">
                    <div class="item-name">${item.name}</div>
                    <div class="item-price">৳ ${item.price}</div>
                </div>

<button onclick="removeFromCart(${index})" class="noselect"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
            `;
            cartContainer.appendChild(div);
        });

        totalPriceEl.textContent = `Total: $${total.toFixed(2)}`;
    }

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart();
    }

    loadCart();
</script>

</body>
</html>
