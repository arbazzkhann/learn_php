<?php
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);
    
    if($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userEmail'] = $email;
        }
        header("Location: /arbaz/learn_php/33. Project - Online Form/index.php");
        exit();
    }


}


?>