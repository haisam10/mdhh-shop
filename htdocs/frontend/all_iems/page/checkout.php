<?php
require_once 'backend/connect.php'; // Database connection

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    echo "<p style='text-align:center; color:red;'>❌ কার্ট খালি!</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $orderDate = date('Y-m-d H:i:s');

    if ($name && $phone && $address) {
        // Insert order
        $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, address, order_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $phone, $address, $orderDate);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        $stmt->close();

        // Insert each item
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, item_name, price, image) VALUES (?, ?, ?, ?)");

        foreach ($cart as $item) {
            $stmt->bind_param("isds", $order_id, $item['name'], $item['price'], $item['image']);
            $stmt->execute();
        }

        $stmt->close();

        // Clear session cart
        unset($_SESSION['cart']);
        echo "<script>
        localStorage.removeItem('cart');
        alert('✅ অর্ডার সফলভাবে সম্পন্ন হয়েছে!');
        window.location.href = './'; // অথবা যেকোনো ধন্যবাদ পেজ
    </script>";
        exit;
    } else {
        echo "<p style='text-align:center; color:red;'>⚠️ সমস্ত তথ্য পূরণ করুন।</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {
            background-color: #111;
            color: #eee;
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #222;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px royalblue;
            top: 25px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 6px;
            background-color: #333;
            color: white;
        }


        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        /* From Uiverse.io by risabbir */
        .nebula-input {
            position: relative;
            width: 250px;
            margin: 30px auto;
        }

        .nebula-input .input {
            width: 100%;
            padding: 15px;
            border: 2px solid #2a2a3a;
            background: #00000f;
            color: white;
            font-size: 16px;
            outline: none;
            border-radius: 8px;
            transition: all 0.4s ease-out;
        }

        .nebula-input .user-label {
            position: absolute;
            left: 15px;
            top: 15px;
            pointer-events: none;
            color: #6a6a8a;
            transition: all 0.4s ease-out;
            background: #00000f;
            padding: 0 5px;
        }

        .nebula-input .input:focus {
            border-color: #b56aff;
            box-shadow:
                0 5px 8px rgba(181, 106, 255, 0.3),
                0 10px 20px rgba(181, 106, 255, 0.2),
                0 15px 40px rgba(181, 106, 255, 0.15),
                0 20px 60px rgba(181, 106, 255, 0.1);
        }

        .nebula-input .input:focus~.user-label,
        .nebula-input .input:valid~.user-label {
            transform: translateY(-25px);
            font-size: 12px;
            color: #d18cff;
            left: 10px;
        }

        .nebula-particle {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            top: 50%;
            left: 10px;
            filter: blur(0.8px);
            mix-blend-mode: screen;
            transition: opacity 0.3s ease;
        }

        .nebula-input .input:focus~.nebula-particle {
            animation: nebula-float 2s forwards ease-out;
        }

        @keyframes nebula-float {
            0% {
                transform: translate(0, -50%) scale(0.8);
                opacity: 0;
                background: #c774ff;
            }

            20% {
                opacity: 0.8;
            }

            100% {
                transform: translate(calc(var(--x) * 140px), calc(var(--y) * 35px)) scale(1.1);
                opacity: 0;
                background: #6df2ff;
            }
        }

        /* From Uiverse.io by neerajbaniwal */ 
.btn-shine {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 12px 48px;
  color: #fff;
  background: linear-gradient(to right, #9f9f9f 0, #fff 10%, #868686 20%);
  background-position: 0;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: shine 3s infinite linear;
  animation-fill-mode: forwards;
  -webkit-text-size-adjust: none;
  font-weight: 600;
  font-size: 16px;
  text-decoration: none;
  white-space: nowrap;
  font-family: "Poppins", sans-serif;
}
@-moz-keyframes shine {
  0% {
    background-position: 0;
  }
  60% {
    background-position: 180px;
  }
  100% {
    background-position: 180px;
  }
}
@-webkit-keyframes shine {
  0% {
    background-position: 0;
  }
  60% {
    background-position: 180px;
  }
  100% {
    background-position: 180px;
  }
}
@-o-keyframes shine {
  0% {
    background-position: 0;
  }
  60% {
    background-position: 180px;
  }
  100% {
    background-position: 180px;
  }
}
@keyframes shine {
  0% {
    background-position: 0;
  }
  60% {
    background-position: 180px;
  }
  100% {
    background-position: 180px;
  }
}
/* From Uiverse.io by mi-series */ 
.btn {
  outline: 0;
  display: inline-flex;
  align-items: center;
  justify-content: space-between;
  background: royalblue;
  min-width: 200px;
  border: 0;
  border-radius: 4px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
  box-sizing: border-box;
  padding: 16px 20px;
  color: #fff;
  font-size: 16px;
  font-weight: 600;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  overflow: hidden;
  cursor: pointer;
}

.btn:hover {
  opacity: .95;
}

.btn .animation {
  border-radius: 100%;
  animation: ripple 0.6s linear infinite;
}

@keyframes ripple {
  0% {
    box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1), 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 40px rgba(255, 255, 255, 0.1), 0 0 0 60px rgba(255, 255, 255, 0.1);
  }

  100% {
    box-shadow: 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 40px rgba(255, 255, 255, 0.1), 0 0 0 60px rgba(255, 255, 255, 0.1), 0 0 0 80px rgba(255, 255, 255, 0);
  }
}
    </style>
    <?php include 'frontend/all_iems/css/style.php'; ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login" />
</head>

<body>
    <?php include 'frontend/all_iems/component/mini-header.php'; ?>
    <?php include 'frontend/all_iems/component/header.php'; ?>
    <form method="POST" onsubmit="disableButton()">
        <h2>📦 Checkout Form</h2>
        <!-- From Uiverse.io by neerajbaniwal --> 
<a href="#" class="btn-shine">📦 Checkout Form<</a>

        <!-- From Uiverse.io by risabbir -->
        <div class="nebula-input">
            <input required="" type="text" name="name" autocomplete="off" class="input" />
            <label class="user-label">👤 নাম:</label>
            <div class="nebula-particle" style="--x:0.2; --y:-0.4; --delay:0.1s"></div>
            <div class="nebula-particle" style="--x:0.5; --y:-0.2; --delay:0.3s"></div>
            <div class="nebula-particle" style="--x:0.3; --y:0.3; --delay:0.5s"></div>
            <div class="nebula-particle" style="--x:0.7; --y:0.1; --delay:0.2s"></div>
            <div class="nebula-particle" style="--x:0.1; --y:-0.7; --delay:0.4s"></div>
            <div class="nebula-particle" style="--x:0.6; --y:0.4; --delay:0.6s"></div>
        </div>
        <div class="nebula-input">
            <input required="" type="number" name="phone" autocomplete="off" class="input" />
            <label class="user-label">📞 মোবাইল নম্বর:</label>
            <div class="nebula-particle" style="--x:0.2; --y:-0.4; --delay:0.1s"></div>
            <div class="nebula-particle" style="--x:0.5; --y:-0.2; --delay:0.3s"></div>
            <div class="nebula-particle" style="--x:0.3; --y:0.3; --delay:0.5s"></div>
            <div class="nebula-particle" style="--x:0.7; --y:0.1; --delay:0.2s"></div>
            <div class="nebula-particle" style="--x:0.1; --y:-0.7; --delay:0.4s"></div>
            <div class="nebula-particle" style="--x:0.6; --y:0.4; --delay:0.6s"></div>
        </div>
        <div class="nebula-input">
            <textarea required="" type="text" name="address" autocomplete="off" class="input" ></textarea>
            <label class="user-label">🏠 ঠিকানা:</label>
            <div class="nebula-particle" style="--x:0.2; --y:-0.4; --delay:0.1s"></div>
            <div class="nebula-particle" style="--x:0.5; --y:-0.2; --delay:0.3s"></div>
            <div class="nebula-particle" style="--x:0.3; --y:0.3; --delay:0.5s"></div>
            <div class="nebula-particle" style="--x:0.7; --y:0.1; --delay:0.2s"></div>
            <div class="nebula-particle" style="--x:0.1; --y:-0.7; --delay:0.4s"></div>
            <div class="nebula-particle" style="--x:0.6; --y:0.4; --delay:0.6s"></div>
        </div>

  <center>
    <!-- From Uiverse.io by mi-series --> 
<div class=".txt-cn">
    <button class="btn"><i class="animation"></i>✅ Order Confirm<i class="animation"></i>
    </button>
</div>
  </center>      
    </form>
    <?php include 'frontend/all_iems/component/footer.php'; ?>
</body>
<script>
    function disableButton() {
        document.querySelector('.btn').disabled = true;
        document.querySelector('.btn').innerText = "⏳ Processing...";
    }
</script>

</html>