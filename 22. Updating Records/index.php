<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Records</title>
</head>
<body>
    
    <!-- form -->
    <form action="index.php" method="post">
        <label>New Name</label>
        <input type="text" placeholder="name" name="name" id="nameText"> <br />
        <label>Old ID</label>
        <input type="text" placeholder="Old ID" name="oldId" id="oldIdText"> <br />
        <label>New ID</label>
        <input type="text" placeholder="ID" name="newId" id="idText"> <br />
        <label>New Email</label>
        <input type="mail" placeholder="Email" name="email" id="emailText"> <br />
        <label>New password</label>
        <input type="password" placeholder="Password" name="password" id="passwordText"> <br />
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>


    <!-- php -->
    <?php 
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "arbazforprep";
    
    //connection creating with database
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }

    //selecting all data from database
    $sql = "SELECT * FROM arbaz";
    $result = mysqli_query($conn, $sql);
    
    //empty array
    $idArr = [];

    //pushing id from db to empty array
    while($row = mysqli_fetch_assoc($result)) {
        array_push($idArr, $row['id']);
    }

    //if method is post
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $oldId = $_POST['oldId'];
        $newId = $_POST['newId'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //for loop for checking id
        for($i = 0; $i < count($idArr); $i++) {
            if($oldId == $idArr[$i]) {
                $sql = "UPDATE `arbaz` SET `name` = '$name', `id` = '$newId', `email` = '$email', `password` = '$password' WHERE `arbaz`.`id` = $oldId";
                $result = mysqli_query($conn, $sql);

                //rows afftected holding into variable
                $aff = mysqli_affected_rows($conn);

                echo "Successfully updated <br />";
                echo "$aff rows are afftected";
   
                break;
            }
            else {
                echo "ERROR! Check your old id and Try Again";
                break;
            }
        }
    }

?>


</body>
</html>