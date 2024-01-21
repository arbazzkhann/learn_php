<?php
    // default false values variable
    $login = 2;
    $showError = false;
    
    
    // checking server request is post
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        include './partials/_dbConnect.php';  //database details
        $username = $_POST['username'];       //storing username
        $password = $_POST['password'];       //storing password

            
            $sql = "(SELECT * FROM users WHERE username='$username' AND password='$password')";   //sql query
            
            $result = mysqli_query($conn, $sql);    //running query
            
            $num = mysqli_num_rows($result);  //checking how many number of rows in database

            // checking if number of rows = 1 or not
            if($num == 1) {
                $login = 1;    //making default variable to true
                session_start();  //starting session
                $_SESSION['loggedin'] = true;   //applying session loggedin=true
                $_SESSION['username'] = $username;   //applying session username=true

                header("location: ./3.welcome.php");  //directing to the welcome page
            }
            else {
                $showError = "Invalid Credentials";   //else showError value
                $login = 0;
            }
           }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php require ('./partials/_navbar.php') ?> <!-- navbar -->
    <?php 
        // cheacking login is true or not
        if($login == 1) { //success
            echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> You are logged into your account.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
        else if($login == 0){  //error
            echo    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Can not logged in. ' . $showError . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    ?>
    
    <!-- container -->
    <div class="container my-4">
        <!-- heading -->
        <h1 class="text-center">Login to Our Website</h1>

        <!-- form -->
        <form action="2.login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
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