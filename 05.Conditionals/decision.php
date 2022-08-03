<?php
$age=50;

if ($age<19) {
	echo "Restricted -- You age is less than 19 .";
}
elseif ($age==19) {
	echo " Search Safe -- You are 19 yeares old";
}

else{
	echo "Buddies  -- Your older than 19";
}
// Ternary Operator or Conditional Assignment operator
$age = ($age<19) ? " <br>less than 19 " : "<br>greater than 19" ;
echo $age;
?>