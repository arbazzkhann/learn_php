<!-- Arrays in PHP -->


<?php

//Normal Access with index
$fruits = ["orange", "apple", "guava", "banana"];

echo "$fruits[0] <br>"; 
echo "$fruits[1] <br>"; 
echo "$fruits[2] <br>"; 
echo "$fruits[3] <br>"; 


echo "<br>";
echo "<br>";




//Associative Array
//means array function with key
$favColor = array('Aman' => 'Blue', 'Ajay' => 'Orange', 'Arbaz' => 'Red');

echo $favColor["Arbaz"];
echo "<br>";

//applying foreach loop
foreach($favColor as $key => $value) {
    echo "$key favourite color is $value <br>";
}




?>