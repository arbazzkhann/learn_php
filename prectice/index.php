<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>


    <!-- navbar -->
    <nav class="navbar bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">FORM</a>
        </div>
    </nav>


    <!-- form -->
    <form action="index.php" method="post">
        <div class="container">
            <h1>Enter Details</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input name="fullName" type="text" class="form-control" id="fullName">
            </div>
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input name="id" type="text" class="form-control" id="id">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input max-length="16" name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


    <!-- php -->
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "arbazforprep";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if(!$conn) {
            die("Connection Failed ---> " . mysqli_connect_error());
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullName = $_REQUEST['fullName'];
            $id = $_REQUEST["id"];
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            
        $sql = "INSERT INTO `arbaz` (`name`, `id`, `email`, `password`) VALUES ('$fullName', '$id', '$email', '$password')";

        $result = mysqli_query($conn, $sql);
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>