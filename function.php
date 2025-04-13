<?php


$br = "</br>";

//Part 1


function decimalToBinary($number) {
    $binary = ""; 

    if ($number == 0) {
        return "0";
    }

    while ($number > 0) {
        $remainder = $number % 2; 
        $binary = $remainder . $binary; 
        $number = intdiv($number, 2); 
    }

    return $binary;
}


echo decimalToBinary(23); 


echo $br;
echo $br;

// ---------------------------------

function decimalToRoman($number) {
    if ($number > 3999) {
        return "Error: Only numbers from 1 to 3999 are allowed.";
    }

    $romanNumb = [
        "M"  => 1000,
        "CM" => 900,
        "D"  => 500,
        "CD" => 400,
        "C"  => 100,
        "XC" => 90,
        "L"  => 50,
        "XL" => 40,
        "X"  => 10,
        "IX" => 9,
        "V"  => 5,
        "IV" => 4,
        "I"  => 1
    ];

    $roman = "";

    foreach ($romanNumb as $symbol => $value) {
        while ($number >= $value) {
            $roman = $roman . $symbol;
            $number -= $value; 
        }
    }

    return $roman;
}

echo decimalToRoman(1987); // Output: MCMLXXXVII


echo $br;
echo $br;
echo $br;
echo $br;


// part 2

function binaryToDecimal($binary) {
    $length = strlen($binary);
    $decimal = 0;

    for ($i = 0; $i < $length; $i++) {
        $bit = $binary[$length - $i - 1];

        
        $power = 1;
        for ($j = 0; $j < $i; $j++) {
            $power *= 2;
        }

        $decimal += $bit * $power;
    }

    return $decimal;
}

echo binaryToDecimal("1010");



echo $br;
echo $br;
echo $br;
echo $br;
 
//------------------------------------------
function romanToDecimal($roman) {
    $map = [
        'M' => 1000,
        'D' => 500,
        'C' => 100,
        'L' => 50,
        'X' => 10,
        'V' => 5,
        'I' => 1
    ];

    $roman = strtoupper($roman); 
    $length = strlen($roman);
    $decimal = 0;

    for ($i = 0; $i < $length; $i++) {
        $current = $map[$roman[$i]];
        $next = ($i + 1 < $length) ? $map[$roman[$i + 1]] : 0;

        if ($current < $next) {
            $decimal -= $current;
        } else {
            $decimal += $current;
        }
    }

    return $decimal;
}



echo romanToDecimal("XXV"); 


echo $br; 
echo $br;
// recursive part 3
function RecursiveBinary($number) {
    if ($number == 0) {
        return '0';
    } elseif ($number == 1) {
        return '1';
    } else {
        return RecursiveBinary(intval($number / 2)) . ($number % 2);
    }
}
echo RecursiveBinary(23);