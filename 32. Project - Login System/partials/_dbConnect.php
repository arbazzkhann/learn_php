<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "users";

$conn = mysqli_connect($servername, $username, $password, $dbName);

if(!$conn) {
    die ("Error! Database not connected  -->> " . mysqli_connect_error());
}
?>