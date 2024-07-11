<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator=$_POST['operator'];

    if ($operator == "add") {
        echo $num1 + $num2;
    }else if ($operator == "subtract") {
        echo $num1 - $num2;
    }else if ($operator == "multiply") {
        echo $num1 * $num2;
    }else if ($operator == "divide") {
        echo $num1 / $num2;
    }
}