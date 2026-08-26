<?php
class PersegiPanjang {
    public $panjang;
    public $lebar; 

    public function luas() {
        return $this->panjang * $this->lebar;
    }
}

// Objek Pertama (Kotak 1)
$kotak = new PersegiPanjang();
$kotak->panjang = 10;
$kotak->lebar = 5;

echo "Luas Kotak 1 = " . $kotak->luas() . "<br>"; // Output: 50

// Objek Kedua (Kotak 2)
$kotak2 = new PersegiPanjang();
$kotak2->panjang = 15;
$kotak2->lebar = 5;

echo "Luas Kotak 2 = " . $kotak2->luas(); // Output: 75
?>