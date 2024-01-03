<?php 

$a = 10;  //global variable
$b = 20;  //global variable

function printVariable() {

    $a = 33;  //local variable
    $b = 44;  //local variable
    
    global $a, $b; //accessing global variable

    echo "The Global Sum is ". $a + $b;  //printing global variable
}

printVariable();  //calling function



echo "<br>";
echo "<br>";



//GLOBALS have all Global Variables in array
echo var_dump($GLOBALS['a']);
echo var_dump($GLOBALS['b']);


?>