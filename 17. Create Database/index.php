<!-- Creating Database -->

<?php 

//db details
$servername = "localhost";
$username = "root";
$password = "";



//creating connection
$conn = mysqli_connect($servername, $username, $password);



//error handling of connecting database 
if(mysqli_connect_error() == true) {
    echo "Connection Error";
} 
else {    
    echo "Connection Successfully Connected <br>";
}




//creating database
$sql = "CREATE DATABASE xyz_ltd";

$result = mysqli_query($conn, $sql);



//databse create error handling
if($result == true) {
    echo "The database created successfully";
}
else {
    echo "The db not created because ---->" . mysqli_error($conn);   
}



?>

