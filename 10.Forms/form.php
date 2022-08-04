<?php 
if ($_SERVER['REQUEST_METHOD']) {
	$f_name=$_POST["First_Name"];
	$last_name=$_POST["Last_Name"];
	echo $f_name;
    echo "<br>";
	echo $last_name;
	// Connecting to database
	$servername="localhost";
	$username="root";
	$password="";
	$datatbase="learn-php";
	 $conn=	mysqli_connect($servername,$username,$password,$datatbase);
	 if (!$conn) {
		die("connection failed!". mysqli_connect_error());
	 }
else 	 echo " <br> successfull";


	} 
	// create a new databae
	// $sql="CREATE DATABASE students_record1";
    // $check=	mysqli_query($conn,$sql);
	// // data base creation Successfull!
	// $result = ($check) ? "<br>Db is create succesfully" : "<br>Db cannot be created Sorry!" ;
	// echo $result;
    // create a new table
	$sql = "CREATE TABLE `student_results` (`s_id` INT(40) NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(40) NOT NULL , `last_name` VARCHAR(40) NOT NULL , `email` VARCHAR(35) NOT NULL , PRIMARY KEY (`s_id`)) ENGINE = InnoDB;";
    $result =mysqli_query($conn ,$sql);
if ($result) {
	echo "created";
} else {
	echo "not create";
}

 // Get data throught the form
$first_name=$_POST["First_Name"];
$last_name=$_POST["Last_Name"];

   // insert Data into db
   $inset_query="INSERT INTO `student_results` ( `first_name`, `last_name`, `email`) VALUES ( '$first_name', ' $last_name ', 'hussanali@gmail.com'); ";
   if (mysqli_query($conn,$inset_query)) {
	echo "<br>Data Added into the table";
} else {
	echo "<br>data not added into the table";
}
?>