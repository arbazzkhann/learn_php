<?php
session_start();

session_unset();
session_destroy();

header("location: ./2.login.php");
exit;
?>