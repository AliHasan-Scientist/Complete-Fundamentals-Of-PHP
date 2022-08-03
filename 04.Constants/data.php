<?php
define("BASE_URI" ,"https://",true);

// define the Arrays of Constants
define("ORIGON_LOCATIONS",array("Pakistan","london","china","saudi-arabia,"));

echo base_uri;

// 
echo " <br>Open Location : " . ORIGON_LOCATIONS[3];
for ($i=0; $i < 3; $i++) { 
	echo ORIGON_LOCATIONS[$i];
	echo " ,";
}

?>