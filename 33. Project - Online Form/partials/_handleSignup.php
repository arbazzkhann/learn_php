<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        
        include '_dbconnect.php';
    
        $user_email = $_POST['signupEmail'];
        $user_password = $_POST['signupPassword'];
        $user_confirm_password = $_POST['signupConfirmPassword'];

        // checking weather email exists in db or not
        $existingSql = "SELECT * FROM `users` WHERE user_email='$user_email'";
        $result = mysqli_query($conn, $existingSql);
        
        $numRows = mysqli_num_rows($result);

        if($numRows > 0) {
            $showError = "Email already exists";
        }
        else {
            if($user_password == $user_confirm_password){
                $password_hash = password_hash($user_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_password`, `time_stamp`) VALUES ('$user_email', '$password_hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                
                if($result) {
                    $showAlert = true;
                    header("Location: /arbaz/learn_php/33.%20Project%20-%20Online%20Form/index.php?signupsuccess=true");
                    exit();
                }
            } 
            else {
                $showError = "Password doesn't matched";
            }
        }
        header("Location: /arbaz/learn_php/33.%20Project%20-%20Online%20Form/index.php?signupsuccess=false");
    }

?>