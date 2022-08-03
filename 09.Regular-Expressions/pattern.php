<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regular-Expression in PHP</title>
</head>

<body>

	<?php
$text="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum porro eaque vero ipsam quis architecto eveniet provident ill  animi nobis incidunt quam? accusantium culpa delectus quod, itaque facilis autem ill cum. [1]";
$pattern="/cum/i"; // possible  regExp Modifiers
$pattern1="/[0-9]/i";
// it mathes only first result
echo preg_match($pattern,$text);
// it mathes all the  results in text
echo preg_match_all($pattern1,$text);
// preg_replace 

 echo preg_replace($pattern,"----" ,$text);
?>
</body>

</html>