<?php
/*
!1.	Write a PHP script to: 
*.	Convert the entered string to uppercase.
*.	Convert the entered string to lowercase.
*.	Make the first letter of the string uppercase.
*.	Make the first letter of each word capitalized.
*/
echo strtoupper("mustafa") . "<br>";

echo strtolower("MUSTAFA") . "<br>";

echo ucfirst("hello world!") . "<br>";

echo lcfirst("Mustafa") . "<br>";

echo "-------------task2------------" . "<br>";
/*
!   2.	Write a PHP script splitting the following numeric string to be a date format. 

*   Sample Output: '085119'
*   Expected Output: 08:51:19

*/

$d = strtotime("085119");
echo date("h:i:sa", $d) . "<br>";
echo "-------------task3------------" . "<br>";

/*
     
!3.	Write a PHP script to check whether the sentence contains a specific word.

*Sample Output: ‘I am a full stack developer at orange coding academy’
*Sample Word: ‘Orange’
*Expected Output: ‘Word Found!’

*/
$sentence = "I am a full stack developer at orange coding academy";
$specificWord = "Orange";

// Check if the specific word exists in the sentence
$found = stripos($sentence, $specificWord) !== false;

if ($found) {
    echo "Word Found!";
} else {
    echo "Word Not Found!";
}

echo "<br>" . "-------------task4------------" . "<br>";
/*
!    4.	Write a PHP script to extract the file name from the URL. 

*    Sample Output: 'www.orange.com/index.php'
*    Expected Output: 'index.php'

*/
$url = 'http://www.orange.com/index.php';
$parsedUrl = parse_url($url);
$fileName = basename($parsedUrl['path']);
echo "File name: " . $fileName;
echo "<br>" . "-------------task5------------" . "<br>";
/*
!5.	Write a PHP script to extract the username from the following email address. 

*Sample Output: 'info@orange.com'
*Expected Output: 'info'

*/
$email = 'info@orange.com';


$parts = explode('@', $email);


$username = $parts[0];

echo "Username: " . $username;
echo "<br>" . "-------------task6------------" . "<br>";
/*
!6.	Write a PHP script to get the last three characters from the string. 
*Sample Output: 'info@orange.com'
*Expected Output: 'com'
*/
$lastThreeChar = substr($email, 12, 3);
echo $lastThreeChar;
echo "<br>" . "-------------task7------------" . "<br>";
/*
!7.	Write a PHP script to generate simple random passwords [do not use rand () function] from a given string. 

*Sample Output: '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'

*Expected Output: 254ABCc or h242sfeDAFEe32  -> random number 

*/
$textToGenerate = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
$shuffledText = str_shuffle($textToGenerate);
echo substr($shuffledText, 6, 13);

echo "<br>" . "-------------task8------------" . "<br>";
/*
!8.	Write a PHP script to replace the first word of the sentence with another word.
*Sample Output: 'That new trainee is so genius.'
*Sample Word: 'Our'
*Expected Result: 'Our new trainee is so genius.'
*/
$sentence = 'That new trainee is so genius.';
$replacementWord = 'Our';
$sentenceArray = explode(' ', $sentence);
$sentenceArray[0] = $replacementWord;
$newSentence = implode(' ', $sentenceArray);

echo "Updated Sentence: " . $newSentence;
echo "<br>" . "-------------task9------------" . "<br>";
/*
?9.	Write a PHP script to find the first character that is different between two strings. 
*String1 : 'dragonball'
*String2 : 'dragonboll'
*Expected Result : First difference between two strings at position 7: "a" vs "o"
*/
$string1 = 'dragonball';
$string2 = 'dragonboll';

$length = min(strlen($string1), strlen($string2));
for ($i = 0; $i < $length; $i++) {
    if ($string1[$i] != $string2[$i]) {
        echo "First difference between two strings at position $i:" . $string1[$i] . " vs " . $string2[$i] ;
        break;
    }
}
echo "<br>" . "-------------task10------------" . "<br>";
/*
!10.	Write a PHP script to put a string in an array, use the (var_dump) to view the array. 
*Sample Output: "Twinkle, twinkle, little star."
*Expected Result: array (4) {[0] => string (30) "Twinkle, " [1] => string (26) " twinkle," [2] => string (27) twinkle" [3] => string (26) " little star.”}
*/
$string = "Twinkle, twinkle, little star.";
$array = explode(' ', $string);
var_dump($array);

echo "<br>" . "-------------task11------------" . "<br>";
/*
!11.	Write a PHP script to print the next letter of the inputted letter. 
*Sample Character: 'a'
*Expected Output: 'b'
*Sample Character: 'z'
*Expected Output: 'a'
*/
$char = 'a';
$nextChar = ++$char;
if (strlen($nextChar) > 1) {
    $nextChar = $nextChar[0];
}
echo "Next Character: " . $nextChar;
echo "<br>";

$char = 'z';
$nextChar = ++$char;
if (strlen($nextChar) > 1) {
    $nextChar = $nextChar[0];
}
echo "Next Character: " . $nextChar;
echo "<br>" . "-------------task12------------" . "<br>";
/*
!12.	Write a PHP script to insert a string at the specified position in a given string. 
*Original String: 'The brown fox'
*Insert 'quick' between 'The' and 'brown'.
*Expected Output: 'The quick brown fox'
*/
$originalString = 'The brown fox';
$insertString = 'quick';
$position = strpos($originalString, 'brown');
$newString = substr_replace($originalString, $insertString . ' ', $position, 0);

echo "Updated String: " . $newString;
echo "<br>" . "-------------task13------------" . "<br>";
/*
!13.	Write a PHP script to remove zeroes from the given number. 
*Original String: '0000657022.24'
*Expected Output: '65722.24'
*/
$numberString = '0000657022.24';
$numberWithoutZeroes = ltrim($numberString, '0');
echo "Number without zeroes: " . $numberWithoutZeroes;
echo "<br>" . "-------------task14------------" . "<br>";
/*
!14.	Write a PHP script to remove part of a string. 
*Original String: 'The quick brown fox jumps over the lazy dog'
*Remove 'fox' from the above string.
*Expected Output: 'The quick brown jumps over the lazy dog'
*/
$originalString = 'The quick brown fox jumps over the lazy dog';
$removeString = 'fox';
$updatedString = str_replace($removeString, '', $originalString);
$updatedString = preg_replace('/\s+/', ' ', $updatedString); // Remove extra spaces
echo "Updated String: " . $updatedString;
echo "<br>" . "-------------task15------------" . "<br>";
/*
!15.	Write a PHP script to remove trailing dashes from a string. 
*Original String: 'The quick brown fox jumps over the lazy dog---'
*Expected Output: 'The quick brown fox jumps over the lazy dog'
*/
$originalString = 'The quick brown fox jumps over the lazy dog---';
$updatedString = rtrim($originalString, '-');
echo "Updated String: " . $updatedString;
echo "<br>" . "-------------task16------------" . "<br>";
/*
!16.	Write a PHP script to remove Special characters from the following string. 
*Sample Output: '\"\1+2/3*2:2-3/4*3'
*Expected Output: '1 2 3 2 2 3 4 3'
*/
$sampleString = '\"\1+2/3*2:2-3/4*3';
$cleanString = preg_replace('/[^A-Za-z0-9 ]/', '', $sampleString);
echo "Cleaned String: " . $cleanString;
echo "<br>" . "-------------task17------------" . "<br>";
/*
!17.	Write a PHP script to select first 5 words from the following string. 
*Sample Output: 'The quick brown fox jumps over the lazy dog'
*Expected Output: 'The quick brown fox jumps'
*/
$sampleString = 'The quick brown fox jumps over the lazy dog';
$words = explode(' ', $sampleString);
$firstFiveWords = implode(' ', array_slice($words, 0, 5));
echo "First 5 words: " . $firstFiveWords;
echo "<br>" . "-------------task18------------" . "<br>";
/*
!18.	Write a PHP script to remove comma(s) from the following numeric string.
*Sample Output: '2,543.12'
*Expected Output: 2543.12
*/
$numericString = '2,543.12';
$updatedNumericString = str_replace(',', '', $numericString);
echo "Updated Numeric String: " . $updatedNumericString;
echo "<br>" . "-------------task19------------" . "<br>";
/*
!19.	Write a PHP script to print letters from 'a' to 'z'. 
*Expected Output: a b c d e f g h i j k l m n o p q r s t u v w x y z
*/
$letters = range('a', 'z');
echo implode(' ', $letters);
