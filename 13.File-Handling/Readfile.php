<?php
// $file_data=readfile("file.txt");
//  $file_data;
//  $image_data=readfile("index.html");
// $image_data;
//file pointer
$file_pointer=fopen("file.txt","r");
// echo var_dump($file_pointer) ;
if (!$file_pointer) {
	die("uable to open this file");
}
?>