<?php
echo "<h3>Deret Fibonacci (10 Suku Pertama):</h3>";

$n1 = 0;
$n2 = 1;

for ($i = 0; $i < 10; $i++) {
    if ($i == 0) {
        echo $n1 . " ";
        continue;
    }
    if ($i == 1) {
        echo $n2 . " ";
        continue;
    }
    
    $n3 = $n1 + $n2;
    echo $n3 . " ";
    
    $n1 = $n2;
    $n2 = $n3;
}
?>