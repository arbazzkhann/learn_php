<?php
    $showAlert = 2;
    $showError = false;

    if($_SERVER['REQUEST_METHOD'] == "POST") {


        include './partials/_dbConnect.php';  //database details
        $username = $_POST['username'];       //storing username
        $password = $_POST['password'];       //storing password
        $confirmPassword = $_POST['confirmPassword'];

        $existsSql = "(SELECT * FROM users WHERE username='$username')";   //query of username is exists or not
        $result = mysqli_query($conn, $existsSql);      //running query

        $existsNumRows = mysqli_num_rows($result);      //couting number of rows of username

        //checking rows
        if($existsNumRows > 0) {
            $showAlert = 0;
            $showError = "User already exists.";
        }
        else {
            if(($password == $confirmPassword)) {
                $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password  ', current_timestamp())";

                $result = mysqli_query($conn, $sql);

                if($result) {
                    $showAlert = 1;
                }
            }
            else {
                $showAlert = 0;
                $showError = "Password do not matched.";  //error message
            }
        }
    }
    

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php require ('./partials/_navbar.php') ?>
    <?php 
        if($showAlert == 1) { //success message if $showAlert = true
            echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your account has been created. Now you can login into your account.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        } 
        else if($showAlert == 0) {
            echo    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error! </strong>' . $showError . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    ?>
    
    <!-- container -->
    <div class="container my-4">
        <!-- heading -->
        <h1 class="text-center">Signup to Our Website</h1>
        <!-- form -->
        <form action="1.signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>