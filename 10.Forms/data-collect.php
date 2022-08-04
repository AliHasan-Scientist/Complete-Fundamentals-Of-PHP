<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Form</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
	<?php
	if (isset($_POST['submit'])) {
		$db_username="root";
$db_password="";
$host_name="localhost";
$db_name="learn-php";
//
$first_name=$_POST["First_Name"];
$last_name=$_POST["Last_Name"];
$bio=$_POST["User_Bio"];
// connection with database
$check_connection=mysqli_connect($host_name,$db_username,$db_password,$db_name);
$display_result = ($check_connection) ? "" : die("".mysqli_connect_error());
echo $display_result;
// Create a table 
$create_user="CREATE TABLE `users_data`(`user_Id` INT(100) NOT NULL AUTO_INCREMENT,`first_name` VARCHAR(30) NOT NULL ,`last_name` VARCHAR(30) NOT NULL	, `user_bio` VARCHAR(1000) NOT NULL ,PRIMARY KEY (`user_Id`) ) ";
$user_query=mysqli_query($check_connection,$create_user);
$check_userTable = ($user_query) ? "" : "" ;
echo $check_userTable;
// insert Data into db
   $inset_query="INSERT INTO `users_data` ( `first_name`, `last_name`, `user_bio`) VALUES ( '$first_name', '$last_name', '$bio');";

   
   if (mysqli_query($check_connection,$inset_query)) {
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Holy guacamole!</strong> Your Form is submited succesfully
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
} else {
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Holy guacamole!</strong> Something went wrong 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
}
	}
// database details

?>

	<div class="mx-3 my-4">


		<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			<div class="mb-3 ">
				<label for="firstName" class="form-label">First Name</label>
				<input type="text" class="form-control" id="firstName" placeholder="Enter your first name "
					name="First_Name">
			</div>
			<div class="mb-3">
				<label for="lastName" class="form-label">Last Name</label>
				<input type="text" class="form-control" id="lastName" placeholder="Enter your last name"
					name="Last_Name">
			</div>
			<div class="mb-3">
				<label for="userBio" class="form-label">Enter You Bio</label>
				<textarea class="form-control" id="userBio" rows="3" name="User_Bio"></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>

		</form>
	</div>




	<!-- backend -->


	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
	</script>
</body>


</html>