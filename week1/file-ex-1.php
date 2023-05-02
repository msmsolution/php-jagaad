<?php

declare(strict_types=1);

//Write a script to create and store information in a text file

$myFile = fopen('test.txt', 'w+');
$fileInput = readline("Enter a text to store in the file: \n");
file_put_contents('test.txt', $fileInput);

//Get the file name from path on my PC
$filePath = 'C:\xampp\htdocs\phpstar\test.txt';
$path = explode(DIRECTORY_SEPARATOR, $filePath);
$filename = end($path);

if(file_exists('test.txt')){
    echo "The file $filename created successfully!";
}else{
    echo "Please create a file as instructed";
}

