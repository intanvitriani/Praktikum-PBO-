<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Services\UserService;
use App\Services\ProductService;

try {
    // Menampilkan User
    $userService = new UserService();
    $user = $userService->createUser('Budi', 'budi@example.com');
    echo $userService->displayUser($user) . "<br><br>";

    // Menampilkan Dua Product
    $productService = new ProductService();
    $product1 = $productService->createProduct('Laptop Asus', 12500000);
    $product2 = $productService->createProduct('Mouse Wireless', 250000);

    echo $productService->displayProduct($product1) . "<br>";
    echo $productService->displayProduct($product2) . "<br>";

} catch (Throwable $e) {
    echo "<h3>Terjadi Error</h3>";
    echo "<p>Pesan: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
}