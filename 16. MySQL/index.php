<!-- 
Ways to connect Database to Server 
    1. MySQLi extension
    2. PDO
-->


<?php 


//connecting dababase
$servername = "localhost";
$username = "root";
$password = "";


// //create a connection
$conn = mysqli_connect($servername, $username, $password);


//if connection was not stablish
if(!$conn) {
    die("Sorry Connection was not stablish" . mysqli_connect_error());
}
else {
    echo "Connection was successfull.";
}


?>