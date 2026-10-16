<?php

// 1. ABSTRACTION
abstract class Warga {
    // 2. PROPERTY & 3. ENCAPSULATION
    protected $noRumah; 
    protected $nama;

    public function __construct($noRumah, $nama) {
        $this->noRumah = $noRumah;
        $this->nama = $nama;
    }

    public function getNama() { return $this->nama; }
    public function getNoRumah() { return $this->noRumah; }

    abstract public function hitungIuran();
    abstract public function getTipeCard();
    abstract public function getBadgeName();
    abstract public function getInfoKhusus();
}

// 4. INHERITANCE (Warga Tetap)
class WargaTetap extends Warga {
    private $noKK;

    public function __construct($noRumah, $nama, $noKK) {
        parent::__construct($noRumah, $nama);
        $this->noKK = $noKK;
    }

    // 5. POLYMORPHISM
    public function hitungIuran() { return 50000; }
    public function getTipeCard() { return "card-tetap"; }
    public function getBadgeName() { return "Warga Tetap"; }
    public function getInfoKhusus() { return "<span>No. KK</span> : " . $this->noKK; }
}

// 4. INHERITANCE (Warga Kos)
class WargaKos extends Warga {
    private $namaPemilikKos;

    public function __construct($noRumah, $nama, $namaPemilikKos) {
        parent::__construct($noRumah, $nama);
        $this->namaPemilikKos = $namaPemilikKos;
    }

    // 5. POLYMORPHISM
    public function hitungIuran() { return 15000; }
    public function getTipeCard() { return "card-kos"; }
    public function getBadgeName() { return "Warga Kos/Kontrak"; }
    public function getInfoKhusus() { return "<span>Pemilik Kos</span> : " . $this->namaPemilikKos; }
}

// 6. CLASS & OBJECT (Data ditulis statis langsung di dalam array)
$daftarWarga = [
    new WargaTetap("Blok A-01", "Budi Santoso", "KK-9988776655"),
    new WargaKos("Blok B-05", "Andi Pratama", "Bpk. Haji Somad"),
    new WargaTetap("Blok A-02", "Siti Aminah", "KK-1122334499"),
    new WargaKos("Blok C-12", "Dimas Anggara", "Kos Mawar No. 5")
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Warga</title>
    <!-- Memanggil CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <div class="prodi-info">Mini Project Sistem Informasi</div>
        <h1>Sistem Manajemen Warga RT </h1>
        <p>Oleh Kelompok Manajemen Warga</p>
    </div>

    <!-- Menampilkan Data Warga -->
    <div class="card-grid">
        <?php foreach ($daftarWarga as $warga): ?>
            
            <div class="card <?= $warga->getTipeCard(); ?>">
                <div class="badge"><?= $warga->getBadgeName(); ?></div>
                <h2 class="nama-warga"><?= $warga->getNama(); ?></h2>
                
                <ul class="info-list">
                    <li><span>No. Rumah</span> : <?= $warga->getNoRumah(); ?></li>
                    <li><?= $warga->getInfoKhusus(); ?></li>
                </ul>

                <div class="tagihan <?= ($warga instanceof WargaTetap) ? 'tagihan-tetap' : 'tagihan-kos'; ?>">
                    Tagihan Iuran: Rp <?= number_format($warga->hitungIuran(), 0, ',', '.'); ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

</body>
</html>