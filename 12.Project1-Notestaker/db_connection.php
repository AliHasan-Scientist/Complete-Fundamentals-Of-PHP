<?php
$servername="localhost";
$username="root";
$password="";
$datatbase="notes-taker";
 $conn=	mysqli_connect($servername,$username,$password,$datatbase);
 if (!$conn) {
	die("connection failed!"."connected". mysqli_connect_error()); }
else 	 echo "";
?>