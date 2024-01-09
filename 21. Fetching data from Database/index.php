<!-- Video Link : https://youtu.be/gbnkDGtlkyo -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "arbazforprep";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die("Connection Failed ---> " . mysqli_connect_error());
}

$sql = "SELECT * FROM arbaz";

$result = mysqli_query($conn, $sql);


// // Find the number of records returned
$num = mysqli_num_rows($result);
echo $num . "<br>";

// //Display rows of table
// if($num > 0) {
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";

//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";

//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";

//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";

//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";
// }

//better way to display rows of table
while($row = mysqli_fetch_assoc($result)) {
    echo "id = " . $row["id"];
    echo " name = " . $row["name"];
    echo " email = " . $row["email"];
    echo " password = " . $row["password"];

    echo "<br>";
}

?>


<!-- 

there are 5 fetch methods 

    1. mysqli_fetch_assoc()     ===>>> column name  
    2. mysqli_fetch_row()       ===>>> index
    3. mysqli_fetch_array()     ===>>> column name and index both
    4. mysqli_fetch_all()       ===>>> 2D array
    5. mysqli_fetch_field()     ===>>> info of field

-->