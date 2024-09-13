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
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="main">
<div class="container">
    <h1>Ürünler</h1>
    <ul>
        <?php foreach ($products as $id => $product): ?>
            <li>
                <?php echo htmlspecialchars($product['name']); ?> - <?php echo htmlspecialchars($product['price']); ?> TL
                <a href="?action=add&id=<?php echo $id; ?>">Sepete Ekle</a>
            </li>
        <?php endforeach; ?>
    </ul>


    <a href="cart.php">Sepeti Görüntüle</a>
    <a href="logout.php" class="logout">Oturumu Kapat</a>
</div>
</body>
</html>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $product_id = (int)$_GET['id']; // ID'yi integer olarak alalım

    if (!isset($_SESSION['cart'][$userId][$product_id])) {
        $_SESSION['cart'][$userId][$product_id] = 1; // İlk kez ekleniyorsa miktar 1
    } else {
        $_SESSION['cart'][$userId][$product_id]++; // Zaten varsa miktarı artır
    }
}
echo "Ürün sepete eklendi!<br>";

//print_r($_SESSION['cart'][$userId]);

?>