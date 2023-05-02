<?php
declare(strict_types=1);

//create a file if not found
$fileName = fopen('test.txt', 'w+');

//Write a script to write multiple lines in a text file
$lines = (integer)readline("Enter number of lines to be written: ");

echo ":: The lines are ::" . PHP_EOL;
for($i = 1; $i <= $lines; $i++){

    $content = file_put_contents('test.txt', 'test line ' . $i);
    $content = file_get_contents('test.txt');
    echo $content . PHP_EOL;
}

$filePath = 'C:\xampp\htdocs\phpstar\test.txt';
$path = explode(DIRECTORY_SEPARATOR, $filePath);
$filename = end($path);

echo PHP_EOL;

echo "The content of the file $filename is: " . PHP_EOL;
for($i = 1; $i <= $lines; $i++){
    $content = file_put_contents('test.txt', 'test line ' . $i);
    $content = file_get_contents('test.txt');
    echo $content . PHP_EOL;
}
fclose($fileName);