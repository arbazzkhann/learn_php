<!-- functions in php -->


<?php 

function marksCalculate($marksArr) {
    $sum = 0;
    foreach($marksArr as $value) {
        $sum += $value;
    }
    return $sum;
}

// $random = [65, 78, 82, 90, 88, 72, 83];
$random = [88, 92, 73, 98, 55, 67];
$totalMarks = marksCalculate($random);

echo $totalMarks;


?>
