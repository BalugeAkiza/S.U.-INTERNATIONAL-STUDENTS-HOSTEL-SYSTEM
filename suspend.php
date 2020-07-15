<?php
//connect ot the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");

$hostel_id = $_GET['hostel_id'];

$query = "UPDATE `hostel` SET `suspend`= 1 WHERE hostel_id = '$hostel_id'";
mysqli_query($db,$query);

header('location:admin.php');



?>