<?php

declare(strict_types=1);

$input = readline("Enter a number: ");

$n = range(1, $input);
shuffle($n);
echo PHP_EOL;

echo "Unsorted array: " . PHP_EOL;
$final = json_encode($n) . ' test.php';
echo $final . PHP_EOL;

echo PHP_EOL;

echo "Sorted array: ";

$final = array($final);

for($i = 0; $i < count($final); $i++) {
    for ($j = 0; $j < count($final) - 1; $j++) {

        if ($final[$i] > $final[$i + 1]) {
            $temp = $final[$i];
            $final[$i] = $final[$i + 1];
            $final[$i + 1] = $temp;
        }

    }

    echo PHP_EOL;
    echo $final[$j];
}
