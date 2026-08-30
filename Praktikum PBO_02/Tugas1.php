<?php

class Mobil {
    // Properti
    public $merek;
    public $warna;
    public $kecepatan;

    // Constructor untuk inisialisasi semua properti
    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    // Method getInfo
    public function getInfo() {
        return "Mobil {$this->merek} berwarna {$this->warna} dengan kecepatan {$this->kecepatan} km/jam.";
    }

    // Method jalankan
    public function jalankan() {
        return "Mobil {$this->merek} berjalan...";
    }

    // Method berhenti
    public function berhenti() {
        return "Mobil {$this->merek} berhenti.";
    }
}

// ==================== Pembuatan 3 Objek ====================

// Objek 1
$mobil1 = new Mobil("Toyota", "Merah", 120);
echo $mobil1->getInfo() . "<br>";
echo $mobil1->jalankan() . "<br>";
echo $mobil1->berhenti() . "<br><br>";

// Objek 2
$mobil2 = new Mobil("Honda", "Hitam", 100);
echo $mobil2->getInfo() . "<br>";
echo $mobil2->jalankan() . "<br>";
echo $mobil2->berhenti() . "<br><br>";

// Objek 3
$mobil3 = new Mobil("BMW", "Putih", 180);
echo $mobil3->getInfo() . "<br>";
echo $mobil3->jalankan() . "<br>";
echo $mobil3->berhenti() . "<br>";

?>