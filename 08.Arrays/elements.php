<?php
$fruit_list=array("Bannanas","Apple","Orange","Grapes","Kivi","Mangose");

// count function is used to find the number of elemetns in arrays
 echo "array lenght : ". count($fruit_list) ;
 echo "<br>";
for ($i=0; $i < count($fruit_list); $i++) { 
	echo $fruit_list[$i];
	echo "<br>";
}


?>