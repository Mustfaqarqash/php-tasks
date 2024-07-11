<?php
    /* 
    ------setcookie(name[required],value, Expire , Path , Domain , Secure , HTTP_Only);    
    ------name
    ------value
    ------Expire
    ------path
    ------Domain
    ------Secure
    ------HTTP only
    */
    setcookie("style", "dark", time() + 60 * 60 * 24 * 30);
    // setcookie("style", "light", time() + 60 * 60 * 24 * 30);
    // setcookie("popup", "done",strtotime("+1 month"));
    setcookie("popup", "done", strtotime("+1 month") , "/index.php" , "www.example.com");
    setcookie("popup", "" ,time() - 3600, "/");//delete cookies
    echo"<pre>";

    if (isset($_COOKIE['style'] ))
    {
        print_r($_COOKIE);
    }
    
    echo"</pre>";