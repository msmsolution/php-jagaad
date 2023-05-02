<?php
    //Prompt for input from the user
    $score = readline("Enter a number: ");

    $grade = '';
    $courseCredit = 3;
    $maxPoint = 4.0;
    $maxCredit = $courseCredit * $maxPoint;

    //Calculate percentages
    $A_studentPercent = ($maxPoint * $courseCredit)*100 / $maxCredit;
    $B_studentPercent = (($maxPoint - 1) * $courseCredit)*100 / $maxCredit;
    $C_studentPercent = (($maxPoint - 2) * $courseCredit)*100 / $maxCredit;
    $D_studentPercent = (($maxPoint - 3) * $courseCredit)*100 / $maxCredit;
    $F_studentPercent = (($maxPoint - 4) * $courseCredit)*100 / $maxCredit;

    if($score < 0 || $score > 100 || $score === '' || !is_numeric($score)){
        echo "Wrong input. Please enter a positive number NOT greater than 100!";
    }elseif($score >= 90){
        $grade = 'A';
        echo "Your grade of $score corresponds to a letter grade of $grade and a percentage score of $A_studentPercent%";
    }elseif ($score >= 80){
        $grade = 'B';
        echo "Your grade of $score corresponds to a letter grade of $grade and a percentage score of $B_studentPercent%";
    }elseif ($score >= 70){
        $grade = 'C';
        echo "Your grade of $score corresponds to a letter grade of $grade and a percentage score of $C_studentPercent%";
    }elseif ($score >= 60){
        $grade = 'D';
        echo "Your grade of $score corresponds to a letter grade of $grade and a percentage score of $D_studentPercent%";
    }else{
        $grade = 'F';
        echo "Your grade of $score corresponds to a letter grade of $grade and a percentage score of $F_studentPercent%";
    }
