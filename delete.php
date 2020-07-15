<?php
//connect ot the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
if(isset($_GET['owner_id'])){
        $owner_id=$_GET['owner_id'];
        $query4="DELETE FROM `hostel_owner` WHERE `owner_id` = $owner_id";
        mysqli_query($db,$query4);
        header('location:owners.php');

    }
    if(isset($_GET['hostel_id'])){
        $hostel_id=$_GET['hostel_id'];
        $query4="DELETE FROM `hostel` WHERE `hostel_id` = $hostel_id";
        mysqli_query($db,$query4);
        header('location:admin.php');

    }
    if(isset($_GET['student_id'])){
        $student_id=$_GET['student_id'];
        $query4="DELETE FROM `international_student` WHERE `id` = $student_id";
        mysqli_query($db,$query4);
        header('location:users.php');

    }
    IF(isset($_GET['Number'])){
        $number = $_GET['Number'];
        $query4="DELETE FROM `contacts` WHERE `Number` = $number";
        mysqli_query($db,$query4);
        header('location:view_message.php');
    }
    


?>
