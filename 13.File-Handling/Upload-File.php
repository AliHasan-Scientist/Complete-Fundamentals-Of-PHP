<?php
// Include the database configuration file

// If file upload form is submitted
$status = $statusMsg = '';
if (isset($_POST["upload"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database
            $insert_image = "INSERT into `images` (`image`, `created`) VALUES ('$imgContent', NOW());";
            include('_db-connection.php');
            $insert = mysqli_query($conn, $insert_image);
            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message
echo $statusMsg;

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<form class="py-4 px-5 " action="Upload-File.php" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
               aria-label="Upload" name="image">
        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="upload">Button</button>
    </div>
</form>
<?php
// Include the database configuration file
require_once '_db-connection.php';

// Get image data from database
$img = "SELECT `image` FROM `images` ORDER BY id DESC";
$result=mysqli_query($conn,$img)
?>

<?php if(mysqli_num_rows($result) > 0){ ?>
    <div class="gallery">
        <?php while($row = $result->fetch_assoc()){

            echo json_decode($row);
            ?>

            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
        <?php } ?>
    </div>
<?php }else{ ?>
    <p class="status error">Image(s) not found...</p>
<?php } ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
</html>
