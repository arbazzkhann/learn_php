<!-- functions in php -->


<?php 

function marksCalculate($marksArr) {
    $sum = 0;
    foreach($marksArr as $value) {
        $sum += $value;
    }
    return "$sum <br>";
}

$user1 = [65, 78, 82, 90, 72, 82];
$user2 = [88, 92, 73, 98, 65, 67];

$userTotalMarks1 = marksCalculate($user1);
$userTotalMarks2 = marksCalculate($user2);

echo "your marks is $userTotalMarks1";
echo "your marks is $userTotalMarks2";


?>
