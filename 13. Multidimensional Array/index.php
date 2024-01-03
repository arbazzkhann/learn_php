<!-- 2D Array -->

<?php 

$mat = array(
    array(24,20,16),
    array(12,34,36),
    array(62,45,52),
    array(62,45,52),
    array(62,45,52)
);

for($i=0; $i<count($mat); $i++) {
    for($j=0; $j<count($mat[$i]); $j++) {
        echo $mat[$i][$j];
        echo " ";
    }
    echo"<br>";
}


?>