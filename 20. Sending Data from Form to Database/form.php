<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #212121;
            color: white;
        }
    </style>
</head>
<body>
    <h1 class="heading">ENTER YOUR DETAILS</h1>
    <form action="form.php" method="post">
        <label>Name : </label>
        <input type="text" name="name" id="name"> <br> <br>
        <label>Email : </label>
        <input type="email" name="email" id="email"> <br> <br>
        <label>Password : </label>
        <input type="password" name="password" id="password"> <br> <br>

        <button type="submit">SUBMIT</button>
        <button type="reset">RESET</button>
    </form>

    <?php

        //db details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "detailsphp";

        //error detection
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        //saving form data into variables
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];


        //sql query for insertion
        $sql = "INSERT INTO `details` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

        $result = mysqli_query($conn, $sql);

    ?>
</body>
</html>