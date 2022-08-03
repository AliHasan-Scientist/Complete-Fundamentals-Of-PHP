<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regular-Expression in PHP</title>
</head>

<body>
	
<?php
$text="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum porro eaque vero ipsam quis architecto eveniet provident animi nobis incidunt quam? accusantium culpa delectus quod, itaque facilis autem cum.";
$pattern="/quam?/i";

echo preg_match($pattern,$text);

?>
</body>

</html>