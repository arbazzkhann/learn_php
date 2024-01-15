<?php

$fptr = fopen("myfile.txt", "r");


// // fgets reads one line
//     echo fgets($fptr) . "<br />";
//     echo fgets($fptr) . "<br />";
//     echo fgets($fptr) . "<br />";

// // with while loop
//     while($a = fgets($fptr)) {
//         echo $a . "<br />"; 
    
//     }
//     echo "End of the file";


// //it gets charcter by charecter
//      echo fgetc($fptr);



/*  ques
    write a program which reads content in 'myfile.txt' and breaks after 
    '.'
*/ 
        while($a = fgetc($fptr)){
            echo $a;
            if($a == ".") {
                break;
            };
        }



?>