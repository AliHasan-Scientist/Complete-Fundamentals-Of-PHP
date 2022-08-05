<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>iNote-Taker</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
		integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModal">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
							<input type="hidden" name="snoEdit" id="snoEdit">
							<label for="Note_Title" class="form-label">Note
								Title</label>
							<input type="text" class="form-control" id="Note_Title_Edit" placeholder="Enter title here"
								name="Note_Title_Edit">
					</div>
					<div class="mb-3">
						<label for="Note_Description" class="form-label">Note Description</label>
						<textarea class="form-control" id="Note_Description_Edit" rows="4"
							name="Note_Description_Edit"></textarea>
						<button type="submit" class="btn btn-primary my-2" name="save_notes_edit">Update Note</button>
						</form>
						<!-- update Record -->
						<?php
  $notes_inserted_check=false;
if (isset($_POST['save_notes_edit'])) {
  include('db_connection.php');
  $notes_title=$_POST["Note_Title_Edit"];
  $notes_description=$_POST["Note_Description_Edit"];
  $notes_id=$_POST["snoEdit"];

 $add_notes_data="UPDATE `notes_data` SET `notes_tilte` = '$notes_title', `notes_description` = '$notes_description' WHERE `notes_data`.`notes_Id` = '$notes_id'; ";
$notes_update=mysqli_query($conn,$add_notes_data);
$notes_update_check = ($notes_update) ? true : "note insertion error";
echo $notes_update_check;
}

?>

					</div>
		</div>


			</div>
		</div>
	</div>






	<!-- add data into the table -->
	<?php
  $notes_inserted_check=false;
if (isset($_POST['save_notes'])) {
  include('db_connection.php');
  $notes_title=$_POST["Note_Title"];
  $notes_description=$_POST["Note_Description"];
 $add_notes_data="INSERT INTO `notes_data` (`notes_tilte`, `notes_description`) VALUES ('$notes_title','$notes_description');";
$notes_inserted=mysqli_query($conn,$add_notes_data);
$notes_inserted_check = ($notes_inserted) ? true : "note insertion error";
}

?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.php.net "><img style="height:1.8rem"
					src="https://www.php.net//images/logos/new-php-logo.svg"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>
	<?php
  if ($notes_inserted_check) {
echo '<div class=" mb-0 alert alert-success alert-dismissible fade show" role="alert">
Form is successfully submitted
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

  }
  
  ?>
	<!-- form -->
	<?php
   
  ?>
	<div class="container my-4 ">
		<h2>Add you Note</h2>
		<div class="mb-3">
			<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
				<label for="Note_Title" class="form-label">Note Title</label>
				<input type="text" class="form-control" id="Note_Title" placeholder="Enter title here"
					name="Note_Title">
		</div>
		<div class="mb-3">
			<label for="Note_Description" class="form-label">Note Description</label>
			<textarea class="form-control" id="Note_Description" rows="4" name="Note_Description"></textarea>
			<button type="submit" class="btn btn-primary my-2" name="save_notes">Add Note</button>
			</form>



			<div class="container">

				<!-- list the items  -->
				<table class="table" id="myTable">
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Title</th>
							<th scope="col">Description</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
        include('db_connection.php');
$get_notes_data="SELECT * FROM `notes_data`";

// found
$founded_notes_data=mysqli_query($conn,$get_notes_data);
$notes_data_check=($founded_notes_data) ? "<br>" : "<br>somethon goes wrong" ;
echo $notes_data_check;
while ($rows = mysqli_fetch_assoc($founded_notes_data)) {
  echo " <tr>
  <th scope='row'>".$rows['notes_Id']."</th>
  <td>".$rows['notes_tilte']."</td>
  <td>".$rows['notes_description']."</td>
  <td>
  <div class='d-grid gap-2 '>
  <button type='button'id='".$rows['notes_Id']."' class='edit btn btn-sm btn-primary'>Edit</button>
  <button type='button' class='delete btn btn-sm btn-primary'>Delete</button>
</div>
</td>
   </tr>";
  
};
?>
					</tbody>
				</table>

				<?php
  // create a Note Taker table;
  $create_note_query="CREATE TABLE `notes-taker`.`notes_data` (`notes_Id` INT(200) NOT NULL AUTO_INCREMENT , `notes_tilte` VARCHAR(1000) NOT NULL , `notes_description` TEXT NOT NULL , `create_time` TIMESTAMP NOT NULL , PRIMARY KEY (`notes_Id`)) ENGINE = InnoDB;";
  $note_added= mysqli_query($conn,$create_note_query);
  $note_added_check = ($note_added) ? "" : "" ;
  echo $note_added_check;
   ?>
			</div>

		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

	<script>
	$(document).ready(function() {
		$('#myTable').DataTable();

	});
	edits = document.getElementsByClassName('edit')

	Array.from(edits).forEach((element) => {
		element.addEventListener("click", (e) => {
			console.log(e.target.parentNode.parentNode.parentNode);
			tr = e.target.parentNode.parentNode.parentNode;
			title = tr.getElementsByTagName("td")[0].innerText;
			description = tr.getElementsByTagName("td")[1].innerText;
			console.log(title);
			Note_Title_Edit.value = title;
			Note_Description_Edit.value = description;
			snoEdit.value = e.target.id;
			$('#myModal').modal('toggle')
			console.log(e.target.id);

		})
	});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
		integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
		integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
	</script>

</body>

</html>