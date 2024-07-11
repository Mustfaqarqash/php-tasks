<?php
session_start();    

$_SESSION['name'] = "mustafa";

isset($_SESSION["view"]) ? $_SESSION["view"]++ : $_SESSION["view"]=1 ;

echo"welcome"."   ". $_SESSION["name"]  ."  "."view count  : "."  ".$_SESSION['view'];
echo"<br>";


// echo session_id();
//session_destroy();

