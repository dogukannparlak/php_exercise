<?php
session_start();

// Kullanıcı oturum kontrolü
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Ürünler dizisi
$products = [
    1 => ['name' => 'Telefon', 'price' => 5000],
    2 => ['name' => 'Laptop', 'price' => 15000],
    3 => ['name' => 'Kulaklık', 'price' => 500],
];

// Sepet işlemleri
if (isset($_GET['action'])) {
    $product_id = $_GET['id'];
    $action = $_GET['action'];

    if (isset($_SESSION['cart'][$userId])) {
        if ($action == 'increase') {
            $_SESSION['cart'][$userId][$product_id]++;
        } elseif ($action == 'decrease') {
            if ($_SESSION['cart'][$userId][$product_id] > 1) {
                $_SESSION['cart'][$userId][$product_id]--;
            } else {
                unset($_SESSION['cart'][$userId][$product_id]);
            }
        } elseif ($action == 'remove') {
            unset($_SESSION['cart'][$userId][$product_id]);
        }
    }
}

// Sepet ürünleri dizisini al
$cart = isset($_SESSION['cart'][$userId]) ? $_SESSION['cart'][$userId] : array();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepetim</title>

</head>
<body>
<div class="container">
    <h1>Sepetim</h1>

    <?php if (empty($cart)): ?>
        <p>Sepetinizde ürün bulunmuyor.</p>
    <?php else: ?>
        <?php $total = 0; ?>
        <?php foreach ($cart as $productId => $quantity): ?>
            <?php if (isset($products[$productId])): ?>
                <?php

                $product = $products[$productId];
                $itemTotal = $product['price'] * $quantity;
                $total += $itemTotal;

                ?>
                <div class="cart-item">
                    <p><strong>Ürün:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
                    <p><strong>Fiyat:</strong> <?php echo htmlspecialchars($product['price']); ?> TL</p>
                    <p><strong>Miktar:</strong> <?php echo htmlspecialchars($quantity); ?></p>
                    <p><strong>Toplam:</strong> <?php echo htmlspecialchars($itemTotal); ?> TL</p>
                    <a href="cart.php?action=increase&id=<?php echo $productId; ?>">Miktarı Artır</a> |
                    <a href="cart.php?action=decrease&id=<?php echo $productId; ?>">Miktarı Azalt</a> |
                    <a href="cart.php?action=remove&id=<?php echo $productId; ?>">Sil</a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="total">
            <p><strong>Toplam Tutar:</strong> <?php echo htmlspecialchars($total); ?> TL</p>
        </div>
    <?php endif; ?>

    <a href="main.php">Ana Sayfaya Dön</a>
    <a href="logout.php" class="logout">Oturumu Kapat</a>
</div>
</body>
</html>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .cart-item {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item p {
        margin: 0;
    }

    .total {
        margin-top: 20px;
        font-weight: bold;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    .logout {
        display: block;
        margin-top: 20px;
        padding: 10px;
        background: #007bff;
        color: #fff;
        text-align: center;
        border-radius: 4px;
    }

    .logout:hover {
        background: #0056b3;
    }
</style>