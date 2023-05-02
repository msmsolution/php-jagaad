<?php

declare(strict_types=1);

//Write a PHP script to convert words in $input to digits.
function word2digit($word): string {
    //Convert words to string array
    $wordArray = explode(',',$word);
    $output = '';
    //loop through each word given
    foreach($wordArray as $value){
        switch(trim($value)){
            case 'zero':
                $output .= '0';
                break;
            case 'one':
                $output .= '1';
                break;
            case 'two':
                $output .= '2';
                break;
            case 'three':
                $output .= '3';
                break;
            case 'four':
                $output .= '4';
                break;
            case 'five':
                $output .= '5';
                break;
            case 'six':
                $output .= '6';
                break;
            case 'seven':
                $output .= '7';
                break;
            case 'eight':
                $output .= '8';
                break;
            case 'nine':
                $output .= '9';
                break;
        }
    }
    return $output;
}

echo word2digit("two,zero,two,three"). PHP_EOL;
echo word2digit("two,zero,two,four");