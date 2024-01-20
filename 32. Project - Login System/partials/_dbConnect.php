<?php
//database details
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "users";

//making connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

//if connection fail
if(!$conn) {
    die ("Error! Database not connected  -->> " . mysqli_connect_error());
}
?>