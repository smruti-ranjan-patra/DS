<?php
echo "<pre>";
solution([1,3,4,5], [1,4,5,7], 7);

function solution ($weight, $val, $maxWeight) {
    $map = [];
    for ($i=0; $i < count($weight); $i++) { 
        for ($j=0; $j <= $maxWeight; $j++) { 
            if ($j == 0) {
                $map[$i][$j] = 0;
            } elseif ($i == 0) {
                $map[$i][$j] = ($j >= $weight[$i]) ? $val[$i] : 0;
            } elseif ($j < $weight[$i]) {
                $map[$i][$j] = $map[$i-1][$j];
            } else {
                $map[$i][$j] = max(($val[$i] + $map[$i-1][$j-$weight[$i]]), $map[$i-1][$j]);
            }
        }
    }

    $i = count($weight)-1;
    $j = $maxWeight;

    echo "Selected Items : <br>";
    while ($map[$i][$j] !== 0 && $i >= 0 && $j >= 0) {
        $temp = $map[$i][$j];
        if ($i == 0 || $temp !== $map[$i-1][$j]) {
            echo "Weight -> $weight[$i] | Value -> $val[$i] <br>";
            $j -= $weight[$i];
        }
        $i--;
    }

    print_r($map);
}

