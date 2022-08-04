<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<!-- connect with database -->
	<?php include 'db_connection.php';?>
	<?php
$get_user_data="SELECT * FROM `users_data` ";

$finded_data=mysqli_query($conn,$get_user_data);
$row=mysqli_num_rows($finded_data);
if ($row>0) {
	$row=mysqli_num_rows($finded_data);
    $data=mysqli_fetch_assoc($finded_data);
	
while ($row=mysqli_fetch_assoc($finded_data)) {
	echo $row['first_name']. "<br>";
}
}
?>



</body>

</html>