<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projects";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die(false . mysqli_connect_error());
} else     echo '';
