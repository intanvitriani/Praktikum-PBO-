<?php
// NIM H1101241054
const DIGIT_NIM = 4;
abstract class MenuKafe
{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    // Constructor
    public function __construct($id, $nama, $hargaDasar)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }
    
    public function getId()         { return $this->id; }
    public function getNama()       { return $this->nama; }
    public function getHargaDasar() { return $this->hargaDasar; }
    abstract public function hitungTotal();
    abstract public function getJenis();
}
class Kopi extends MenuKafe
{
    private $susuMl;
    public function __construct($id, $nama, $hargaDasar, $susuMl)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->susuMl = $susuMl;
    }
    public function hitungTotal()
    {
        return $this->hargaDasar + (200 * $this->susuMl);
    }
    public function getJenis() { return "Kopi"; }
    public function cetakDetail()
    {
        return "Kopi dengan susu {$this->susuMl} ml";
    }
}

class Teh extends MenuKafe
{
    private $esBatu;
    public function __construct($id, $nama, $hargaDasar, $esBatu)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->esBatu = $esBatu;
    }

    public function hitungTotal()
    {
        return $this->hargaDasar * $this->esBatu;
    }
    public function getJenis() { return "Teh"; }
    public function cetakDetail()
    {
        return "Teh dengan {$this->esBatu} es batu";
    }
}

class Jus extends MenuKafe
{
    private $buahButir;
    public function __construct($id, $nama, $hargaDasar, $buahButir)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->buahButir = $buahButir;
    }
    public function hitungTotal()
    {
        $total = $this->hargaDasar * $this->buahButir;
        // Diskon jika buah lebih dari digit NIM
        if ($this->buahButir > DIGIT_NIM) {
            $total = $total - ($total * 0.10);
        }
        return $total;
    }
    public function getJenis() { return "Jus"; }
    public function cetakDetail()
    {
        $ket = "Jus {$this->buahButir} butir buah";

        if ($this->buahButir > DIGIT_NIM) {
            $ket .= " (diskon 10%)";
        }
        return $ket;
    }
}
$daftarMenu = [
    new Kopi("K001", "Intan Vitriani", 15000, 100),
    new Teh("K002", "Geryaldine Agustiwi", 2000, 6),
    new Jus("K003", "Vita", 2500, 9),
    new Kopi("K004", "Latte", 18000, 150),
    new Jus("K005", "Jus Jeruk", 3000, 4),
];
$totalKeseluruhan = 0;
// Menampilkan daftar menu
foreach ($daftarMenu as $menu) {
    echo $menu->getNama() . " : " . $menu->cetakDetail() . "<br>";
}