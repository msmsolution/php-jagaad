<?php
declare(strict_types=1);

//Write a script to read an existing file.

$fileName = fopen('test.txt', 'w+');
$fileInput = readline("Enter a text to store in the file: \n");

$content = file_put_contents('test.txt', $fileInput);
$content = file_get_contents('test.txt');

//Get the file name from path on my PC
$filePath = 'C:\xampp\htdocs\phpstar\test.txt';
$path = explode(DIRECTORY_SEPARATOR, $filePath);
$filename = end($path);

if($content){
    echo "The content of the file $filename is: $content";
}else{
    echo "Sorry, wrong file given";
}