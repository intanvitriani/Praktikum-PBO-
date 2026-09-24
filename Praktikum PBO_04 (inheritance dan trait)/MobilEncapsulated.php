<?php
class Mobil {
    // 1. Ubah semua properti menjadi private
    private $merek;
    private $warna;
    private $kecepatan;
    private $mesinHidup;

    public function __construct($merek, $warna) {
        $this->merek = $merek;
        $this->setWarna($warna); // Menggunakan setter warna agar tervalidasi saat inisialisasi
        $this->kecepatan = 0;
        $this->mesinHidup = false;
    }

    // 2. Getter untuk semua properti
    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function getKecepatan() {
        return $this->kecepatan;
    }

    public function isMesinHidup() {
        return $this->mesinHidup;
    }

    // 3. Setter Kecepatan dengan Validasi (Tidak negatif & Maksimal 200 km/jam)
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            throw new Exception("Kecepatan tidak boleh negatif!");
        }
        if ($kecepatan > 200) {
            throw new Exception("Kecepatan maksimal adalah 200 km/jam!");
        }
        if (!$this->mesinHidup && $kecepatan > 0) {
            throw new Exception("Mesin harus hidup untuk mengatur kecepatan!");
        }
        $this->kecepatan = $kecepatan;
    }

    // 4. Setter Warna dengan Validasi (Tidak kosong & Minimal 3 karakter)
    public function setWarna($warna) {
        $warnaTrim = trim($warna);
        if (empty($warnaTrim)) {
            throw new Exception("Warna tidak boleh kosong!");
        }
        if (strlen($warnaTrim) < 3) {
            throw new Exception("Warna minimal harus 3 karakter!");
        }
        $this->warna = $warnaTrim;
    }

    // Method Operasional / Bisnis
    public function startMesin() {
        $this->mesinHidup = true;
        return "Mesin dinyalakan.";
    }

    public function stopMesin() {
        if ($this->kecepatan > 0) {
            throw new Exception("Tidak bisa mematikan mesin saat mobil bergerak!");
        }
        $this->mesinHidup = false;
        return "Mesin dimatikan.";
    }

    public function getInfo() {
        $statusMesin = $this->mesinHidup ? "hidup" : "mati";
        return "Mobil {$this->merek} (Warna: {$this->warna}), Kecepatan: {$this->kecepatan} km/jam, Mesin: {$statusMesin}";
    }
}

// === PENGUJIAN PROGRAM ===
try {
    echo "<h3>--- Pengujian Normal ---</h3>";
    $mobil = new Mobil("Toyota", "Merah");
    echo $mobil->getInfo() . "<br>";

    echo $mobil->startMesin() . "<br>";
    $mobil->setKecepatan(120); // Pengujian kecepatan valid
    echo "Kecepatan saat ini: " . $mobil->getKecepatan() . " km/jam<br><br>";

    echo "<h3>--- Pengujian Error / Validasi ---</h3>";
    
    // Pengujian validasi kecepatan melebihi 200 km/jam
    $mobil->setKecepatan(250); 

} catch (Exception $e) {
    echo "<b style='color:red;'>Error: " . $e->getMessage() . "</b>";
}
?>