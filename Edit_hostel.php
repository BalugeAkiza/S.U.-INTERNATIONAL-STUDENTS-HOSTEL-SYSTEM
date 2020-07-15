<?php

$hostel_id = $_GET['hostel_id'];
//connect to the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
$hostel = mysqli_query($db,"SELECT * FROM hostel WHERE hostel_id = $hostel_id");
if (($hostel->num_rows) > 0) 
{
    // output data of each row
    while($row = $hostel->fetch_assoc()) 
    {
        
        $hostel_id = $row["hostel_id"]; 
        $name = $row["hostel_name"];
        $profile = $row["profile_image"];
        $price = $row["Price"];
        $description  = $row["desciption"];
        $address  = $row["physical_address"];
        $rooms = $row["Number_of_People"];
    }
}

if(isset($_POST['update_hostel'])){
    $hostel_id = mysqli_real_escape_string($db,$_POST['hostel_id']);
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $rooms = mysqli_real_escape_string($db,$_POST['people']);
    $address = mysqli_real_escape_string($db,$_POST['address']);
    if (isset($_FILES['image']['tmp_name'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            print "Trying to upload ".$imageFileType;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["Image"]["name"]). " has been uploaded.";
            echo("File has been uploaded successfully");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        //$password = md5($password1);
        $query = "UPDATE `hostel` SET `hostel_name`='$name',`profile_image`= '$target_file',
        `Price`='$price',`desciption`='$description',`physical_address`='$address',
        `Number_of_People`='$rooms' WHERE hostel_id = $hostel_id";
        if(mysqli_query($db,$query)){
            header('location:admin.php');
        }else{
            echo "Could not execute update".mysqli_error($db);
        }
        
    }
}
?>
<?php
//if you do not login,you cannot acces this page
session_start();
if(!isset($_SESSION['user_name']) || $_SESSION['user_name']!="Admin"){
    header('location:login_page.php');
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Update User Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="css/Style1.css" rel="stylesheet" type="text/css">
        <style>
            .panel{
                width: 700px;
                margin-left: 200px;
                text-align: center;
            }
            .panel-body label {
                width: 200px;
                margin-left: 10px;
            }
            .panel-body input {
                width: 200px;
                margin-left: 05px;
            }

        </style>
    </head>
    <body>
        <header>
        <div id="title">
            <span class="logo"><a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a></span>
            <br><h1>Recommended hostels</h1><br>
        </div>
        </header>
        <form action="Edit_hostel.php?hostel_id=<?php print $_GET['hostel_id'] ?>" method="post" enctype="multipart/form-data">
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>Update details</h3></div>
                  <div class="panel-body">
                    <br><br>
                    <input type="hidden" name="hostel_id" value="<?php echo $hostel_id ?>"  required><br><br>
                    <label for="hostel_name">Hostel Name: </label>
                    <input type="text" name="name" value="<?php echo $name ?>"  required><br><br>
                    <label for="last name"> Profile </label>
                    <input type="file" name="image" value="<?php echo $profile ?>" required><br><br>
                    <label for="price">Price: </label>
                    <input type="text" name="price" value="<?php echo $price ?>" required><br><br>
                    <label for="description">Description: </label>
                    <input type="text" name="description" value="<?php echo $description?>" required><br><br>
                    <label for="address">Physical address: </label>
                    <input type="text" name="address"  value="<?php echo $address ?>" required><br><br>
                    <label for="people">Number of People: </label>
                    <input type="text" name="people"  value="<?php echo $rooms ?>" required><br><br>
                    <button class="btn btn-primary" name="update_hostel">update</button>
                    </div>
                </div>
            </div>
    </form>
     
     
    </body>
</html>