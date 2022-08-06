<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origon: *');
include('_db-connection.php');
$get_student_data = "SELECT * FROM students s INNER JOIN student_result sr on s.`results` = sr.`res_Id`;";

// found
$founded_student_data = mysqli_query($conn, $get_student_data);
$notes_data_check = ($founded_student_data) ? "" : "<br>somethon goes wrong";
if (mysqli_num_rows($founded_student_data) > 0) {
    $get_data = mysqli_fetch_all($founded_student_data, MYSQLI_ASSOC);
    echo json_encode($get_data);

} else {
    echo json_encode(array('message' => "record note found", "staus" => false));

}
