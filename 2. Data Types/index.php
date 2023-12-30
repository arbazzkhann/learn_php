<!-- There are Data Types in PHP

1. String   - "ARBAZ"
2. Int      - 24 
3. Float    - 32.443
4. Boolean  - 0 or 1  | true or false
5. Array    - ["arbaz", "superman", "spiderman"]
6. Object   - Instance of Class
7. Null     - NULL

-->
<?php
$name = "ARBAZ";
$id = 26502;
$amount = 25005.25;
$developer = true;
$arr = ["Superman", "Spiderman", "Batman"];
$phone = NULL;

echo "$name <br>";
echo "$id <br>";
echo "$amount <br>";
echo "$developer <br>";
echo "$arr[2] <br>";
echo "$phone <br>";



//val_dump function
//it will give, what type of variable it is.
echo var_dump($developer);
echo "<br>";
echo var_dump($arr);

?>