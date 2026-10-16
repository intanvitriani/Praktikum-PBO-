<?php

class Mobil {

    private $kecepatan = 0;

    public function getKecepatan() {
        return $this->kecepatan;
    }


   public function setKecepatan($kecepatan){
        // $this -> kecepatan = $kecepatan;
        if ($kecepatan >= 0){
            $this -> kecepatan = $kecepatan;
        } else {
            echo "kecepatan tidak boleh negatif.";
        }
    }
}

$mobil = new Mobil();

$mobil->setKecepatan(-100);

echo $mobil->getKecepatan();