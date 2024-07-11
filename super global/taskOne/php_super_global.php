<?php
/*
!   1.	Form Handling and Method Detection
?	Task: Create an HTML form that asks for an email and a password.
?	Instructions: When the form is submitted, the action page should determine if the data was sent using the GET or POST method.
?	Objective: Understand and use PHP super global variables $_GET and $_POST.

*/
$userName = $_POST['userName'];
$userEmai = $_POST['email'];
echo'the user name is: '.$userName.' the user email is: '.$userEmai;
// *----------------------------------------------------------------


