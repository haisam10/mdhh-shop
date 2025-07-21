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
            transition: 0.3s ease;
        }

        .cart-item:hover {
            box-shadow: 0px 0px 9px 0px #FFF;
            transition: 0.3s ease;
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

        input.qty-input {
            width: 60px;
            padding: 5px;
            font-size: 1em;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-left: 5px;
            text-align: center;
            background: transparent;
            color: #fff;
        }

        strong {
            color: greenyellow;
        }

        /* From Uiverse.io by aaronross1 */
        .delete-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(20, 20, 20);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0px 0px 9px 0px crimson;;
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
            position: relative;
        }

        .delete-svgIcon {
            width: 15px;
            transition-duration: 0.3s;
        }

        .delete-svgIcon path {
            fill: white;
        }

        .delete-button:hover {
            width: 90px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: rgb(255, 69, 69);
            align-items: center;
        }

        .delete-button:hover .delete-svgIcon {
            width: 20px;
            transition-duration: 0.3s;
            transform: translateY(60%);
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .delete-button::before {
            display: none;
            content: "Delete";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .delete-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }

        .total {
            text-align: center;
            margin-top: 40px;
            font-size: 1.5em;
            font-weight: bold;
            color: yellowgreen;
        }

        /* From Uiverse.io by gharsh11032000 */
        .Checkout_Button {
            position: relative;
            width: 120px;
            height: 40px;
            background-color: #000;
            display: flex;
            align-items: center;
            color: white;
            flex-direction: column;
            justify-content: center;
            border: none;
            padding: 12px;
            gap: 12px;
            border-radius: 8px;
            cursor: pointer;
        }

        .Checkout_Button::before {
            content: '';
            position: absolute;
            inset: 0;
            left: -4px;
            top: -1px;
            margin: auto;
            width: 128px;
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(-45deg, #e81cff 0%, #40c9ff 100%);
            z-index: -10;
            pointer-events: none;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .Checkout_Button::after {
            content: "";
            z-index: -1;
            position: absolute;
            inset: 0;
            background: linear-gradient(-45deg, #fc00ff 0%, #00dbde 100%);
            transform: translate3d(0, 0, 0) scale(0.95);
            filter: blur(20px);
        }

        .Checkout_Button:hover::after {
            filter: blur(30px);
        }

        .Checkout_Button:hover::before {
            transform: rotate(-180deg);
        }

        .Checkout_Button:active::before {
            scale: 0.7;
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
    <div style="text-align: center; margin-top: 20px;">
        <center>
            <button class="Checkout_Button" onclick="goToCheckout()">
                Checkout
            </button>
        </center>


    </div>

    <?php include 'frontend/all_iems/component/footer.php'; ?>

    <script>
        const cartContainer = document.getElementById('cartContainer');
        const totalPriceEl = document.getElementById('totalPrice');

        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cartContainer.innerHTML = '';

            if (cart.length === 0) {
                cartContainer.innerHTML = '<p style="text-align:center;">আপনার কার্ট খালি।</p>';
                totalPriceEl.textContent = '';
                return;
            }

            let total = 0;
            cart.forEach((item, index) => {
                // যদি quantity না থাকে তাহলে ডিফল্ট 1 ধরবে
                let qty = item.quantity || 1;
                let subtotal = parseFloat(item.price) * qty;
                total += subtotal;

                const div = document.createElement('div');
                div.className = 'cart-item';
                div.innerHTML = `
                <img src="frontend/all_iems/image/${item.image}" alt="${item.name}" />
                <div class="item-info">
                    <div class="item-name">${item.name}</div>
                    <div class="item-price">
                        ৳ ${item.price} x 
                        <input 
                            type="number" 
                            min="1" 
                            value="${qty}" 
                            class="qty-input"
                            onchange="updateQuantity(${index}, this.value)" 
                        />
                        = <strong>৳ ${subtotal.toFixed(2)}</strong>
                    </div>
                </div>
                <button class="delete-button"  onclick="removeFromCart(${index})">
                <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                </svg>
                </button>
            `;
                cartContainer.appendChild(div);
            });

            totalPriceEl.textContent = `Total: ৳${total.toFixed(2)}`;
        }

        function updateQuantity(index, newQty) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart[index].quantity = parseInt(newQty) || 1;
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        function goToCheckout() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert("⚠️ আপনার কার্ট খালি!");
                return;
            }

            fetch('backend/asset/store-cart-session.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        cart
                    })
                })
                .then(res => res.text())
                .then(response => {
                    if (response === 'success') {
                        window.location.href = 'checkout';
                    } else {
                        alert("❌ Session সেট করা যায়নি!");
                    }
                });
        }

        loadCart();
    </script>

</body>

</html>