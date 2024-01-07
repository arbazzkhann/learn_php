<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ak1234";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    echo "connection not build successfully! <br>";
} else {
    echo "connection created successfully!!! <br>";
}


// //creating database and table query
// $dbCreate = "CREATE DATABASE IF NOT EXISTS ak1234";
// $tbCreate = "CREATE TABLE IF NOT EXISTS `ak1234`.`test123` (`id` INT(3) NULL AUTO_INCREMENT , `name` INT(15) NOT NULL , `age` INT(2) NOT NULL , `post` VARCHAR(12) NOT NULL , PRIMARY KEY (`id`))";

// // running query
// $databaseCreate = mysqli_query($conn, $dbCreate);
// $tableCreate = mysqli_query($conn, $tbCreate);


$name = "arbaz";
$age = "20";
$post = "programmer";


//inserting data into tables
$sql = "INSERT INTO `test123` (`id`, `name`, `age`, `post`) VALUES ('', '$name', '$age', '$post')";
$result = mysqli_query($conn, $sql);

if($result == true) {
    echo "Query successfull";
} else {
    echo "Error ---->". mysqli_error($conn);
}





?>