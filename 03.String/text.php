<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strings in PHP</title>
</head>

<body>
	<?php
	$text= "Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa beatae quae cumque? Possimus, alias perspiciatis!!!";
//strlen -> is used to find the lenght of text
echo "Character : ". strlen($text);


// str_word_count
echo " <br>Words : " . str_word_count($text);
// is used to Reverse the String 
echo "<br> String Reversed: " . strrev($text);

// Search the particular word in the given String
echo "<br> Searching ... index: " . strpos($text ,"amet"); 
// Replace 
echo " <br> <b>After Replace : </b> " . str_replace("sit" ,"set" ,$text);
?>

</body>

</html>