<?php
session_start();

$_SESSION['name'] = "mustafa";
$ipAdd = getenv("REMOTE_ADDR");
$ipAddArr = array();

array_push($ipAddArr, $ipAdd);
$_SESSION["ipAddArr"] = $ipAddArr;
$ipAddArr =$_SESSION["ipAddArr"] ;

for($i = 0 ; $i < count($ipAddArr) ; $i++){
    if(!$ipAdd == $ipAddArr[$i]){
        isset($_SESSION["view"]) ? $_SESSION["view"]++ : $_SESSION["view"] = 1;
    }
}

echo "welcome" . "   " . $_SESSION["name"]  . "  " . "view count  : " . "  " . $_SESSION['view'];

echo "<br>";

//------------chat gpt -------------------

// Start the session
session_start();

// Function to get the visitor count from a file
function getVisitorCount() {
    $filename = 'visitor_count.txt';
    if (file_exists($filename)) {
        $count = file_get_contents($filename);
        return intval($count);
    } else {
        return 0;
    }
}

// Function to increment the visitor count and save it to a file
function incrementVisitorCount() {
    $count = getVisitorCount() + 1;
    file_put_contents('visitor_count.txt', $count);
    return $count;
}

// Check if the user has a cookie indicating they are a returning visitor
if (!isset($_COOKIE['unique_visitor'])) {
    // If no cookie, set a cookie and increment the visitor count
    setcookie('unique_visitor', 'true', time() + (86400 * 30)); // 30 days
    $visitorCount = incrementVisitorCount();
} else {
    // If the cookie exists, just get the current visitor count
    $visitorCount = getVisitorCount();
}

echo "Number of unique visitors: " . $visitorCount;

