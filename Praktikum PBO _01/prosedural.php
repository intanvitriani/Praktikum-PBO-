<?php

$panjang = 100;
$lebar = 10;

function luas($panjang, $lebar){
    $luas = $panjang * $lebar;
    return $luas;

}

echo "Luas persegi panjang adalah: " . luas($panjang, $lebar);

?>