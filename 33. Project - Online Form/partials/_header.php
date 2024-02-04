<?php

$loggedIn = false;
session_start();
if(isset($_SESSION['loggedIn'])) {
    $loggedIn = true;
}

echo
        '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">iDiscuess</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>';
                        if($loggedIn) {
                            echo '
                            <p class="text-white my-1 mx-2">'.$_SESSION['userEmail'].'</p>
                            <button class="btn btn-success" type="submit">Logout</button>';
                        }
                        else {
                            echo '<button class="btn btn-outline-success mx-2 " data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                                  <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
                        }
                    echo '</form>
                </div>
            </div>
        </nav>
';



include '_loginModal.php';
include '_signupModal.php';

if(isset($_GET['signupsuccess']) == true) {
    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert my-0">
                <strong>Signup successfull!</strong> Your account has been created and you can now login on iDicuss website.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
// if(isset($_GET['loginsuccess']) == true) {
//     echo '  <div class="alert alert-success alert-dismissible fade show" role="alert my-0">
//                 <strong>Login successfull!</strong> You are now logged in 
//                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//             </div>';
// }


?>