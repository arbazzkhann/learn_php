<?php 


$fptr = fopen("myfile.txt", "r");


$content1 = fread($fptr, 3);   //fread(fileOpen, file size);
$content2 = fread($fptr, filesize("myfile.txt"));   //fread(fileOpen, file size);


// it will cut content from 'myfile.txt' and put length of 3 in first 'content1'
echo $content1;
// all left content will put into the 'content2'
echo $content2;


fclose($fptr);  //always close the file with fclose() if fopen() used 

?>  