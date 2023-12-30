<!-- 
    "." operator
    it concatinate string with other string 
-->
<?php

$first_name = "arbaz";
$middle_name = " ";
$last_name = "khan";

echo $first_name . $middle_name . $last_name ;
echo "<br>";

//another
echo "arbaz". " " . "khan";
echo "<br>";

?>





<!-- 
    "strlen()" 
    it will find the length of string.
-->
<?php
    $address = "mayur vihar phase 1 new delhi 110091";
    echo strlen($address);  
    echo "<br>";
?>





<!-- 
    "str_word_count()" 
    it will find how many words are there.
-->
<?php
    $address = "mayur vihar phase 1 new delhi 110091";
    echo str_word_count($address);
    echo "<br>";
?>





<!-- 
    "strrev()" 
    it will find reverse the string.
-->
<?php
    $address = "mayur vihar phase 1 new delhi 110091";
    echo strrev($address);
    echo "<br>";
?>




<!-- 
    "strpos()" 
    it will find 'string index' in a string.
-->
<?php
    $address = "mayur vihar phase 1 new delhi 110091";
    echo strpos($address, "phase");
    echo "<br>";
?>




<!-- 
    "str_replace()" 
    it will replace 'string' in a string.
-->
<?php
    $address = "mayur vihar phase 1 new delhi 110091";
    echo str_replace("1", "2", $address);
    echo "<br>";
?>





<!-- 
    "var_dump()" 
    it will give, what type of variable it is and length and whole string.
-->
<?php
    $address = "mayur vihar phase 1 new delhi 110091";
    echo var_dump($address);
    echo "<br>";
?>


<!-- 
    "str_repeat()" 
    it will print multiple times.
-->
<?php
    $name = "arbaz <br>";
    echo str_repeat($name, 10);
    echo "<br>";
?>





<!-- 
    "rtrim()" and "ltrim()"
    it will trim spaces in string.
-->
<?php
    echo rtrim("   hello whatsapp     ");     //remove right spaces
    echo ltrim("   hello whatsapp     <br>"); //remove left spaces
    echo "<br>";
?>