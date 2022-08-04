<html lang="en">

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
	<div class="my-3 mx-4">
		<h1>Please fill the Details</h1>
		<form action="data-collect.php" method="POST">
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
			<button type="button" class="btn btn-primary">Submit</button>



		</form>

	</div>




	<!-- backend -->
	<?php
// database details
$db_username="root";
$db_password="";
$host_name="localhost";
$db_name="learn-php";
// connection with database
$check_connection=mysqli_connect($host_name,$db_username,$db_password,$db_name);
$display_result = ($check_connection) ? "connected with database successfully!" : die("Oops connection is faild widt db.".mysqli_connect_error());
echo $display_result;
// Create a table 
$create_user="CREATE TABLE `users_data`(`user_Id` INT(100) NOT NULL AUTO_INCREMENT,`first_name` VARCHAR(30) NOT NULL ,`last_name` VARCHAR(30) NOT NULL	, `user_bio` VARCHAR(1000) NOT NULL ,PRIMARY KEY (`user_Id`) ) ";
$user_query=mysqli_query($check_connection,$create_user);
$check_userTable = ($user_query) ? "<br>user table is created successfully" : "<br>Oops! something wrong user table is not create" ;
echo $check_userTable;

$first_name=$_POST["First_Name"];
$last_name=$_POST["Last_Name"];
$bio=$_POST["User_Bio"];

   // insert Data into db
   $inset_query="INSERT INTO `student_results` ( `first_name`, `last_name`, `user_bio`) VALUES ( '$first_name', '$last_name', '$bio');";

   
   if (mysqli_query($conn,$inset_query)) {
echo '<div class="alert alert-success" role="alert">
A simple success alert—check it out!
</div>
';
} else {
	echo "<br>data not added into the table";
}
?>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
	</script>
</body>


</html>