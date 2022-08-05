<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origon: *');
include('_db-connection.php');
$data_key=json_decode(file_get_contents( "php://input"),true);

$find_note_id=$data_key["n_id"];

$get_notes_data="SELECT * FROM `notes_data` WHERE notes_id='$find_note_id'";

// found
$founded_notes_data=mysqli_query($conn,$get_notes_data);
$notes_data_check=($founded_notes_data) ? "" : "<br>somethon goes wrong" ;
echo $notes_data_check;
if (mysqli_num_rows($founded_notes_data)>0) {
	$get_data=mysqli_fetch_all($founded_notes_data,MYSQLI_ASSOC); 
echo json_encode($get_data);

}else{
	echo json_encode(array('message'=>"record note found","staus"=>false));

}
?>