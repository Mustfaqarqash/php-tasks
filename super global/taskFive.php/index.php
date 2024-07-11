<!DOCTYPE html>
<html>
<body>
<!-- 
!	Project and Script Name
*	Task: Display the project name and script name on a webpage.
*	Instructions: Use PHP to dynamically determine and display these names.
*	Objective: Practice using PHP's $_SERVER super global variable.
 -->

<?php
echo $_SERVER['PHP_SELF'];// project name
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];// script name
echo "<br>";

?>

</body>
</html>