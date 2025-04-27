<?php
  


function NumberCheck($numbers) {
    $br = "<br>";
    $romanPattern = '/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/i';

    foreach ($numbers as $x) {
        $str = strval($x);
        if (preg_match($romanPattern, $str)) {
            echo "$str is a Roman numeral $br";
        }

        else if (preg_match('/^[01]+$/', $str)) {
            echo "$str is binary $br";
        }

        else if (preg_match('/^[+-]\d+$/', $str)) {
          
            if (preg_match('/^[+-]0\d+$/', $str)) {
                echo "$str is invalid (starts with 0) $br";
            } else {
                echo "$str is a signed decimal $br";
            }
        }

        else if (preg_match('/^\d+$/', $str)) {
            echo "$str is an unsigned decimal $br";
        }

        else {
            echo "$str is invalid $br";
        }
    }
}

$numbers = ["I", "XV", "100", "010", "101", "+10", "-20", "+0123", "-001", "545"];
NumberCheck($numbers);

