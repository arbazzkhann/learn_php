<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "xyz_123";


//creating connection 
$conn = mysqli_connect($servername, $username, $password, $database);


//error handing of db connect
if(!$conn) {
   die("Connection not created" . mysqli_connect_error());
} 
else {    
    echo "Connection successfully connected <br>";
}


//sql query
$sql = "CREATE TABLE `xyz_123`.`test` (`id` INT(3) NULL AUTO_INCREMENT , `name` INT(15) NOT NULL , `age` INT(2) NOT NULL , `post` VARCHAR(12) NOT NULL , PRIMARY KEY (`id`))";

// $sql = "DROP TABLE `xyz_123`.`test`";


$result = mysqli_query($conn, $sql);


//databse create error handling
if($result == true) {
    echo "The table was created successfully";
}
else {
    echo "The table was not created because ---->" . mysqli_error($conn);   
}




?>