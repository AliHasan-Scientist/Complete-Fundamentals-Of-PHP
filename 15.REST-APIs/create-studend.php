<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origon: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization');
$get_data = json_decode(file_get_contents('php://input'), true);
$first_name = $get_data['first_name'];
$last_name = $get_data['last_name'];
$email = $get_data['email'];
$student_hash = $get_data['password'];
$pass = password_hash($student_hash, PASSWORD_DEFAULT);
//$password = $password_hash;
$results = $get_data['results'];
include('_db-connection.php');
$create_student_result_table = "CREATE TABLE student_result
(
    `res_Id`   INT(255)    NOT NULL UNIQUE ,
    `board`    VARCHAR(45) NOT NULL,
    `uni_name` VARCHAR(65) NOT NULL,
    `semester` VARCHAR(44) NOT NULL,
    `roll_num` VARCHAR(45) NOT NULL,
    `class`    VARCHAR(65) NOT NULL,
    PRIMARY KEY (`res_Id`)

);";
$create_student_table = "CREATE TABLE students
(
    `s_Id`       INT(255)    NOT NULL UNIQUE AUTO_INCREMENT,
    `first_name` VARCHAR(65) NOT NULL,
    `last_name`  VARCHAR(65) NOT NULL,
    `email`      VARCHAR(32) NOT NULL UNIQUE,
    `password`   VARCHAR(300) NOT NULL,
    `results`    INT(255)    NOT NULL,
    FOREIGN KEY (`results`) REFERENCES student_result (`res_Id`)
);";
$result_created = mysqli_query($conn, $create_student_result_table);
$student_created = mysqli_query($conn, $create_student_table);
if ($result_created && $student_created) {
    echo "student and result both are created successfully";
} else echo "student and result are not created successfully";

// insert data into the student table;
$insert_student = "INSERT INTO `students`
(
 `first_name`,
 `last_name`,
 `email`,
 `password`,
 `results`)
VALUES ('$first_name' , '$last_name ' ,'$email','$pass','$results');";
$student_data_inserted = mysqli_query($conn, $insert_student);
if ($student_data_inserted) {
    echo json_encode(array('message' => "record inserted successfully", "staus" => true));
    echo $password;


} else {
    echo json_encode(array('message' => "record not inserted successfully", "staus" => false));

}