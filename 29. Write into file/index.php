<!-- 

    
    => fwrite over write the files with "w" mode on fopen
    => fwrite appending the program with the files with "a" mode on fopen
    
    NOTE: fopen create file if dosn't exists

 -->

<?php
// //write mode
// $fptr = fopen("myfile.txt", "w");        //open file in "w" (write mode).

// fwrite($fptr,"hello i am file...");      //writing the text which will be overrided

// fclose($fptr);       //closing the file




// //append mode
// $fptr = fopen("myfile2.txt", "a");          //opening file with "a" (append mode).

// fwrite($fptr, "this is appended text.");    //writing the text which will be appended

// fclose($fptr);          //closing the file

?>