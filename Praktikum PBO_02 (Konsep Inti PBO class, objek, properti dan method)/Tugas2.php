<?php

class Product {
    // Properti
    public $nama;
    public $harga;
    public $kategori;

    // Constructor
    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    // Method menampilkan informasi produk
    public function getInfo() {
        return "Produk: {$this->nama} | Kategori: {$this->kategori} | Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }

    // Method untuk menghitung & mengubah harga setelah diskon
    public function applyDiskon($persen) {
        $potongan = $this->harga * ($persen / 100);
        $this->harga = $this->harga - $potongan;
    }
}

// ==================== Pembuatan 2 Objek ====================

// Objek 1
$produk1 = new Product("Laptop Gaming", 15000000, "Elektronik");
echo "<b>" . $produk1->getInfo() . "</b><br>";

$produk1->applyDiskon(10); // Diskon 10%
echo "Setelah Diskon 10%: " . $produk1->getInfo() . "<br><br>";

// Objek 2
$produk2 = new Product("Sepatu Lari", 800000, "Fashion");
echo "<b>" . $produk2->getInfo() . "</b><br>";

$produk2->applyDiskon(25); // Diskon 25%
echo "Setelah Diskon 25%: " . $produk2->getInfo() . "<br>";

?>