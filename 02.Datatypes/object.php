<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Objects in PHP</title>
</head>
<body>
	<?php
	// class data type
	class Car {
		public $color;
		public $model;
		public function __construct($color, $model) {
		  $this->color = $color;
		  $this->model = $model;
		}
		public function message() {
		  return "My car is a " . $this->color . " " . $this->model . "!";
		}
	  }
	$mycar =new Car("red " ,"audi");
	echo $mycar->message();
	echo var_dump($mycar)
	?>
</body>
</html>