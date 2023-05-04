<?php
declare(strict_types=1);
//Write a PHP function that takes a filename as input and outputs the number of words,
// number of sentences, and number of non-empty symbols in that file.

$wordCount = 0;
$sentenceCount = 0;
$nonEmptySymbolCount = 0;

function countStat($file): string{
    global $nonEmptySymbolCount;
    global $wordCount;
    global $sentenceCount;

    //Read from a text file
    $readFile = file_get_contents($file);

    for($i = 0; $i < strlen($readFile); $i++){
        if (preg_match('/[a-zA-Z]/', $readFile[$i]) || preg_match('/\d/', $readFile[$i])){
            $nonEmptySymbolCount += 1;
        }elseif ($readFile[$i] == ' '){
            if(preg_match('/[a-zA-Z]/', $readFile[$i-1]) || preg_match('/\d/', $readFile[$i-1])){
                $wordCount += 1;
            }else{
                echo "Check if your file have any content";
            }
        }elseif ($readFile[$i] == '.' || $readFile[$i] == '!' || $readFile[$i] == '?'){
            if(!($readFile[$i+1] == '.' || $readFile[$i+1] == '!' || $readFile[$i+1] == '?')){
                $sentenceCount += 1;
            }else{
                echo "I don't understand this input please!";
            }
        }else{
            echo "Stephen Mangai thinks PHP is cool!";
        }
    }
    return "wordCount => $wordCount, sentenceCount => $sentenceCount, nonEmptySymbolCount => $nonEmptySymbolCount";
}
$countingElements = countStat('test.txt');
echo $countingElements;