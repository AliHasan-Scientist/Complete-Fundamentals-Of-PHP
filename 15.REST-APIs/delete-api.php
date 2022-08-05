<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origon: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization');


$data_keys=json_decode(file_get_contents("php://input"), true);

// $find_note_id=$data_key["n_id"];
$notes_Id=$data_keys['notes_Id'];

include('_db-connection.php');

$get_notes_data="DELETE FROM `notes_data` WHERE `notes_data`.`notes_Id` = '$notes_Id' ";

// found21
$inserted_notes_data=mysqli_query($conn,$get_notes_data);
// $notes_data_check=($founded_notes_data) ? "" : "" ;

if ($inserted_notes_data) {
	echo json_encode(array('message'=>"record deleted successfully","staus"=>true));
	

}else{
	echo json_encode(array('message'=>"record not deleted successfully","staus"=>false));

}
?>