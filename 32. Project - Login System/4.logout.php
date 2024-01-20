<?php

session_unset();                         //it will unset all things which are setted in session.
session_destroy();                       //it will distroy the session.

echo "You are logged out.";

?>