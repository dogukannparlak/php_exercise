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

// Sepete ürün ekleme
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];

    // Kullanıcıya özel sepet kontrolü
    if (!isset($_SESSION['cart'][$userId])) {
        $_SESSION['cart'][$userId] = array();
    }


    if (!isset($_SESSION['cart'][$userId][$product_id])) {
        $_SESSION['cart'][$userId][$product_id] = 1; // İlk kez ekleniyorsa miktar 1
    } else {
        $_SESSION['cart'][$userId][$product_id]++; // Zaten varsa miktarı artır
    }

    echo "Ürün sepete eklendi!<br>";
}
print_r($_SESSION['cart'][$userId]);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>

</head>
<body>
<div class="container">
    <h1>Ürünler</h1>
    <ul>
        <?php foreach ($products as $id => $product): ?>
            <li>
                <?php echo htmlspecialchars($product['name']); ?> - <?php echo htmlspecialchars($product['price']); ?> TL
                <a href="?add=<?php echo $id; ?> ">Sepete Ekle</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="cart.php">Sepeti Görüntüle</a>
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

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    li:last-child {
        border-bottom: none;
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