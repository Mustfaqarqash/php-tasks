<?php
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchText = $_POST['searchText'];
    if (filter_var($searchText, FILTER_VALIDATE_URL)) {
        
        header("Location: " . $searchText);
        exit(); 
    } else {
        echo "Invalid URL. Please enter a valid URL.";
    }
}
