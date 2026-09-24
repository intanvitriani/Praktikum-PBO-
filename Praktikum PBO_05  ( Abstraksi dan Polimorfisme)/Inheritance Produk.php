<?php
// 1. Parent Class
class Produk {
protected string $merek;
protected float $harga;
public function __construct(string $merek, float $harga) {
if ($harga < 0) {
throw new Exception("Harga tidak boleh negatif!");
}
$this->merek = $merek;
$this->harga = $harga;
}
public function getInfo(): string {
return "Merek: {$this->merek}<br>Harga: Rp " .
number_format($this->harga, 0, ',', '.');
}
}
// 2. Child Class Makanan
class Makanan extends Produk {
private string $namaProduk;
private string $tanggalKadaluaarsa;
public function __construct(string $namaProduk, string $merek,
float $harga, string $tanggalKadaluaarsa) {
parent::__construct($merek, $harga);
$this->namaProduk = $namaProduk;
$this->tanggalKadaluaarsa = $tanggalKadaluaarsa;
}
private function getStatus(): string {
$today = date('Y-m-d');
return ($this->tanggalKadaluaarsa >= $today) ? "Segar" :
"Kadaluarsa";
}

public function getInfo(): string {
return "Produk: Makanan - {$this->namaProduk}<br>" .
parent::getInfo() . "<br>" .
"Tanggal Kadaluarsa: {$this->tanggalKadaluaarsa}<br>"
.
"Status: " . $this->getStatus() . "<br>";
}
}
// 3. Child Class Elektronik
class Elektronik extends Produk {
private string $namaProduk;
private int $garansi;
public function __construct(string $namaProduk, string $merek,
float $harga, int $garansi) {
parent::__construct($merek, $harga);
$this->namaProduk = $namaProduk;
$this->garansi = $garansi;
}
public function getInfo(): string {
return "Produk: Elektronik - {$this->namaProduk}<br>" .
"Merek: {$this->merek}<br>" .
"Harga:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nb
sp;&nbsp;&nbsp;&nbsp;Rp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nb
sp;" . number_format($this->harga, 0, ',', '.') . "<br>" .
"Garansi: {$this->garansi} bulan<br>";
}
}
// --- Output Test ---
// Tanggal disesuaikan agar statusnya "Segar"
$makanan = new Makanan("Mie Instan", "Indomie", 3500, "2027-06-30");
echo $makanan->getInfo();
echo "<br>";
$elektronik = new Elektronik("Smart TV", "Samsung", 5000000, 12);
echo $elektronik->getInfo();

?>