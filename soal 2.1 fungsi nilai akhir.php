<?php
function hitungNilaiAkhir($uts, $uas, $tugas) {
    $nilaiAkhir = ($uts * 0.30) + ($uas * 0.40) + ($tugas * 0.30);
    return (float) $nilaiAkhir;
}

// Pengujian Fungsi
$uts = 80;
$uas = 85;
$tugas = 90;

$hasil = hitungNilaiAkhir($uts, $uas, $tugas);

echo "Nilai UTS: $uts <br>";
echo "Nilai UAS: $uas <br>";
echo "Nilai Tugas: $tugas <br>";
echo "<strong>Nilai Akhir: " . $hasil . "</strong>";
?>