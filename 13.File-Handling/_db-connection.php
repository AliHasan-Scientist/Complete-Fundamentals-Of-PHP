<?php
$servername="localhost";
$username="root";
$password="";

// data base name
$database="notes-taker";
 $conn=	mysqli_connect($servername,$username,$password,$database);
 if (!$conn) {
	die("connection failed!". mysqli_connect_error()); }
else 	 echo "";
?>