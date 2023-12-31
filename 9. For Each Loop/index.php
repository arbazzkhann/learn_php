<!-- foreach Loop -->


<?php 

$arr = ["apple", "banana", "grapes", "guava", "litchi", "mango", "orange"];


//with for Loop.
// for ($i = 0; $i < count($arr); $i++) {
//     echo $arr[$i];
//     echo "<br>";
// }



//with foreach loop.
//better way to do same thing.
foreach ($arr as $value) {
    echo $value . "<br>";
}



?>