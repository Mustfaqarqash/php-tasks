<pre>
    <?php
    //todo 1. Write a PHP script to check if the inserted number is a prime number 
    $primeNumber = 7;

    function isPrimeNumber($number)
    {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }

    if (isPrimeNumber($primeNumber)) {
        echo "$primeNumber is a prime number.";
    } else {
        echo "$primeNumber is not a prime number.";
    }

    // todo 2. Write a PHP script to reverse a string
    $str = "mustafa";

    function getReverseString($str)
    {
        $length = strlen($str);
        $newReverseString = "";
        for ($i =  $length - 1; $i >= 0; $i--) {
            $newReverseString .= $str[$i];
        }
        return $newReverseString;
    }
    echo "<br>";
    echo getReverseString($str);
    //todo 3. Write a PHP script to check if the all string characters are lower cases

    $lowerCaseStr = "mustafa qarqash";

    function isLowerCase($str)
    {
        $strLength = strlen($str);
        for ($i = 0; $i < $strLength; $i++) {
            $asciiValue = ord($str[$i]);
            if ($asciiValue != 32 && ($asciiValue < 97 || $asciiValue > 122)) {
                return false;
            }
        }
        return true;
    }

    echo "<br>";
    if (isLowerCase($lowerCaseStr)) {
        echo "$lowerCaseStr is all characters in lower case";
    } else {
        echo "$lowerCaseStr is not all characters in lower case";
    }

    // todo 4.	Write a PHP function to swap to variables?
    $firstValue = 12;
    $secondValue = 10;

    function swapValue(&$firstValue, &$secondValue)
    {
        $firstValue = $firstValue + $secondValue; // 22
        $secondValue = $firstValue - $secondValue; // 12
        $firstValue = $firstValue - $secondValue; // 10
    }

    swapValue($firstValue, $secondValue);
    echo "<br>";
    echo "First Value: $firstValue<br>";
    echo "Second Value: $secondValue<br>";


    // todo 6.	Write a PHP function to check if a number is an Armstrong number or not ?

    function isArmstrong($number)
    {
        $power = strlen((string)$number);
        $strnum = (string)$number;
        $sum = 0;

        for ($i = 0; $i < $power; $i++) {
            $sum += pow((int)$strnum[$i], $power);
        }

        return $sum == $number;
    }


    $number = 153;
    if (isArmstrong($number)) {
        echo "$number is an Armstrong number.";
    } else {
        echo "$number is not an Armstrong number.";
    }

    //todo 7.	Write a PHP function that checks whether a passed string is a palindrome or not?


    //todo 8.	Write a PHP function to remove duplicates from an array ?
    $array1 = array(2, 4, 7, 4, 8, 4);

    function removeDuplicate($arr)
    {
        $newArr = array();
        for ($i = 0; $i < count($arr); $i++) {
            $isDuplicate = false;
            for ($j = 0; $j < count($newArr); $j++) {
                if ($arr[$i] == $newArr[$j]) {
                    $isDuplicate = true;
                    break;
                }
            }
            if (!$isDuplicate) {
                $newArr[] = $arr[$i];
            }
        }
        return $newArr;
    }

    $result = removeDuplicate($array1);
    print_r($result);

    ?>
</pre>