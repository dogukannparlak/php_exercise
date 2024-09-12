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
// Kullanıcıya özel sepet kontrolü
if (!isset($_SESSION['cart'][$userId])) {
    $_SESSION['cart'][$userId] = array();
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $product_id = (int)$_GET['id']; // ID'yi integer olarak alalım

    if ($action == 'add') {
        if (!isset($_SESSION['cart'][$userId][$product_id])) {
            $_SESSION['cart'][$userId][$product_id] = 1; // İlk kez ekleniyorsa miktar 1
        } else {
            $_SESSION['cart'][$userId][$product_id]++; // Zaten varsa miktarı artır
        }
    } elseif ($action == 'increase') {
        if (isset($_SESSION['cart'][$userId][$product_id])) {
            $_SESSION['cart'][$userId][$product_id]++;
        }
    } elseif ($action == 'decrease') {
        if (isset($_SESSION['cart'][$userId][$product_id])) {
            if ($_SESSION['cart'][$userId][$product_id] > 1) {
                $_SESSION['cart'][$userId][$product_id]--;
            } else {
                unset($_SESSION['cart'][$userId][$product_id]);
            }
        }
    } elseif ($action == 'remove') {
        unset($_SESSION['cart'][$userId][$product_id]);
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
    <link rel="stylesheet" href="style.css">
</head>
<body class="cart">
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
    <?php endif;
//    print_r($_SESSION['cart'][$userId]);
    ?>

    <a href="main.php">Ana Sayfaya Dön</a>
    <a href="logout.php" class="logout">Oturumu Kapat</a>
</div>
</body>
</html>
