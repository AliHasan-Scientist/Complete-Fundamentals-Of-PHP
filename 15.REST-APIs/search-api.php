<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origon: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization');


// $data_keys=json_decode(file_get_contents("php://input"), true);

// $find_note_id=$data_key["n_id"];
// $search_key=$data_keys['search_key'];
$search_key = (isset($_GET['search_key'])) ?  $_GET['search_key']: die() ;
include('_db-connection.php');

$found_notes_data_query="SELECT * FROM `notes_data` WHERE `notes_tilte` LIKE '%{$search_key}%' ";

// found21
$founded_notes_data=mysqli_query($conn,$found_notes_data_query);
// $notes_data_check=($founded_notes_data) ? "" : "" ;

if (mysqli_num_rows($founded_notes_data)>0) {
	$get_data=mysqli_fetch_all($founded_notes_data,MYSQLI_ASSOC); 
echo json_encode($get_data);

}else{
	echo json_encode(array('message'=>"record not found","staus"=>false));

}
?>