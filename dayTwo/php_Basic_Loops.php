<?php
//todo Task 1: Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line.
$str = "";
for ($i = 1; $i <= 10; $i++) {
    if ($i != 10) {
        $str .= $i . "-";
    } else {
        $str .= $i;
    }
}
echo $str . "\n";
echo "<br>";

//todo Task 2: Create a script using a for loop to add all the integers between 0 and 30 and display the total.
$sum = 0;
for ($i = 0; $i <= 30; $i++) { // Changed '<' to '<=' to include 30
    $sum += $i;
}
echo $sum . "\n";

echo "<br>";

//todo Task 3: Print a 5x5 square pattern of asterisks using nested for loops.
for ($i = 0; $i < 5; $i++) {  
    for ($j = 0; $j < 5; $j++) {
        echo "* ";
    }
    echo "<br>"; 
}

echo "<br>";

//todo Task 4: Write a program to calculate and print the factorial of a number using a for loop.
$number = 5; // Sample Input
$factorial = 1;
for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}
echo $factorial . "\n";

echo "<br>";

//todo Task 5: Write a program to calculate and print the Fibonacci sequence using a for loop.
$n = 10; // Number of terms to display
$fib = [0, 1];
for ($i = 2; $i < $n; $i++) {
    $fib[] = $fib[$i - 1] + $fib[$i - 2];
}
echo implode(", ", $fib) . "\n";

echo "<br>";

//todo Task 6: Write a program which will count the "c" characters in the text "Orange Coding Academy".
$text = "Orange Coding Academy";
$count = 0;
for ($i = 0; $i < strlen($text); $i++) {
    if (strtolower($text[$i]) == 'c') {
        $count++;
    }
}
echo $count . "\n";

echo "<br>";

//todo Task 7: Write a PHP script that creates the following table using for loops.
echo '<table border="1" cellpadding="3px" cellspacing="0px">';
for ($i = 1; $i <= 6; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 5; $j++) {
        echo '<td>' . $i . ' * ' . $j . ' = ' . ($i * $j) . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

echo "<br>";

//todo Task 8: Write a PHP program that repeats integers from 1 to 50.
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz ";
    } elseif ($i % 3 == 0) {
        echo "Fizz ";
    } elseif ($i % 5 == 0) {
        echo "Buzz ";
    } else {
        echo $i . " ";
    }
}

echo "<br>";

//todo Task 9: Write a PHP program to generate and display the first n lines of a Floyd triangle.
$n = 5; // Number of lines to display
$num = 1;
for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $num . " ";
        $num++;
    }
    echo "<br>";
}
?>
