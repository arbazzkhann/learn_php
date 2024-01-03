<?php 

$multiDim = array(
    array(24,24,53,42),
    array(54,44,57,47),
    array(25,45,92,45),
    array(62,83,63,44)
);

for($i=0; $i<count($multiDim); $i++) {
    for($j=0; $j<count($multiDim[$i]); $j++) {
        echo $multiDim[$i][$j];
        echo " ";
    }
    echo "<br>";
}


?>