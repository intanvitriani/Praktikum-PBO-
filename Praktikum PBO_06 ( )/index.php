<?php

// 1. Buat interface Bentuk dengan method hitungLuas()
interface Bentuk {
    public function hitungLuas();
}

// 2. Buat class Persegi yang mengimplementasikan interface Bentuk
class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function getSisi() {
        return $this->sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }
}

// 3. Buat class Lingkaran yang mengimplementasikan interface Bentuk
class Lingkaran implements Bentuk {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function hitungLuas() {
        return 3.14 * $this->radius * $this->radius;
    }
}

// 4. Skrip Eksekusi
// - Menampung objek Persegi dan Lingkaran dalam satu array
$daftarBentuk = [
    new Persegi(5),
    new Lingkaran(7)
];

// - Melakukan loop untuk mencetak luas setiap bentuk
foreach ($daftarBentuk as $bentuk) {
    if ($bentuk instanceof Persegi) {
        echo "Luas Persegi (sisi=" . $bentuk->getSisi() . "): " . $bentuk->hitungLuas() . "<br>";
    } elseif ($bentuk instanceof Lingkaran) {
        echo "Luas Lingkaran (radius=" . $bentuk->getRadius() . "): " . $bentuk->hitungLuas() . "<br>";
    }
}