<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "arbazforprep";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die ("Database not Connected" . mysqli_connect_error());
}

?>