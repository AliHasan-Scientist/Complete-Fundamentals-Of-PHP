<?php
$natural_numbers=array(2,4,5,6,89,86,54,343,342,22,2,22);
 sort($natural_numbers);
foreach ($natural_numbers as $n) {
	echo $n ." , ";
}
echo " <br> <b> Sort in Decending order</b> <br>";
rsort($natural_numbers);
foreach ($natural_numbers as $n) {
	echo " ". $n ." , ";
}
// associative-array sort
echo "<br>";
$key_value=array("ali"=>19,"hussan"=>17,"omar"=>22,"bilal"=>15);
// sort the array according to value
asort($key_value);
foreach ($key_value as $key => $value) {
	echo "key : ". $key ."--" ."value" . ":" .$value;
}
echo "<br>";
// sort the array according to key 
ksort($key_value);
foreach ($key_value as $key => $value) {
	echo "key : ". $key ."--" ."value" . ":" .$value;
}
// same as arsort , krsort in reverse order

?>