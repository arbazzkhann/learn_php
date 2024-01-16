<?php

/*
Syntax : setcookies("key", "value", time() + 'expire time in sec', "/");

*/

setcookie("category", "books", time() + 86400, "/");

echo "cookie is set";



?>