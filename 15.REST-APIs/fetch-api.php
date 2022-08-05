<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origon: *');
include('_db-connection.php');
$get_notes_data="SELECT * FROM `notes_data`";

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