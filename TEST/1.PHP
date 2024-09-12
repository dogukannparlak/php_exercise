<?php
// Ürün listesi (örnek ürünler)
$products = [
    1 => ['name' => 'Ürün 1', 'price' => 100],
    2 => ['name' => 'Ürün 2', 'price' => 200],
    3 => ['name' => 'Ürün 3', 'price' => 300],
];

// Sepeti başlat
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Sepete ekleme işlemi
if (isset($_GET['add'])) {
    $productId = (int)$_GET['add'];
    if (isset($products[$productId])) {
        $_SESSION['cart'][$productId] = $products[$productId];
        echo "Ürün sepete eklendi: " . $products[$productId]['name'];
    }
}

// Ürün listesi görüntüleme
?>
<ul>
    <?php foreach ($products as $id => $product): ?>
        <li>
            <?php echo htmlspecialchars($product['name']); ?> - <?php echo htmlspecialchars($product['price']); ?> TL
            <a href="?add=<?php echo $id; ?>">Sepete Ekle</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="2.PHP">Sepeti Görüntüle</a>
