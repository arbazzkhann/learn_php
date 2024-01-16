<!-- 
    Video Link: https://youtu.be/VXC6LbWMjuI

=>  Session is used to manage information across different pages. 

    NOTE: 1. Sessions are used for saving sensitive information into the users browser.     

-->

<?php

session_start();                            //it will starting the session.

// $_SESSION['username'] = "Arbaz";         //creating session 'username'
// $_SESSION['favCat'] = "Tech";            //creating session 'favCat'

if(isset($_SESSION['username'])) {          //it checks the session is available
echo "Welcome " . $_SESSION['username'] . "<br />";
echo "Your Favourite Category is " . $_SESSION['favCat'] . "<br />";

} else {
    echo "Please login to continue";
}
// session_unset();                         //it will unset all things which are setted in session.
// session_destroy();                       //it will distroy the session.




?>