<?php
//connect ot the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
$errors = array();// where to store errors
if(isset($_POST['add_owner'])){
    $firstName = mysqli_real_escape_string($db,$_POST['first_name']);
    $lastName = mysqli_real_escape_string($db,$_POST['last_name']);
    $userName = mysqli_real_escape_string($db,$_POST['user_name']);
    $phoneNumber = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password1 = mysqli_real_escape_string($db,$_POST['password']);
    $password2 = mysqli_real_escape_string($db,$_POST['confirm']);
    if(empty($firstName)){
        array_push($errors,"The first Name field is empty");
    }
    if(empty($lastName)){
        array_push($errors,"The last Name field is empty");
    }
    if(empty($userName)){
        array_push($errors,"The user Name field is empty");
    }
    if(empty($phoneNumber)){
        array_push($errors,"The phone number field is empty");
    }
    if(empty($email)){
        array_push($errors,"The email field is empty");
    }
    if(empty($password1)){
        array_push($errors,"The password field is empty");
    }
    if(empty($firstName)){
        array_push($errors,"The please  confirm your password");
    }
    //check if the username is unique or email or phone number
    //check whether the user name is unique
    $User_check_query = mysqli_query($db,"SELECT * FROM hostel_owner WHERE UserName = '$userName' or email = '$email' 
    or phone_number ='$phoneNumber'LIMIT 1");
        
    $user = mysqli_fetch_assoc($User_check_query);
   
    if($user['UserName']==$userName){
        array_push($errors,"User name already existed");
    }
   if($user['email']==$email){
       array_push($errors,"email already used");

   }
    if($user['phone_number'] == $phoneNumber){
        array_push($errors,"phone number already used");
    }
    //if no error,we then register a user
    if(count($errors) == 0){
        $password = md5($password1);
        $query = "INSERT INTO  hostel_owner (First_name,Last_name,UserName,email,phone_number,passWord) values ('$firstName',
        '$lastName','$userName','$email','$phoneNumber','$password')";
       // print_r($query);
        mysqli_query($db,$query);
        header('location:admin.php');
}
}

if(isset($_POST['addHostel'])){
    $hostelName = mysqli_real_escape_string($db,$_POST['name']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $rooms=mysqli_real_escape_string($db,$_POST['rooms']);
    $owner = mysqli_real_escape_string($db,$_POST['owner']);
    if(empty($hostelName)){
        array_push($errors,"The hostel name field is empty");
    }
    if(empty($price)){
        array_push($errors,"The price field is empty");
    }
    if(empty($description)){
        array_push($errors,"The description field is empty");
    }
    if(empty($address)){
        array_push($errors,"The address field is empty");
    }
    if(empty($owner)){
        array_push($errors,"The owner field is empty");
    }
    if(empty($rooms)){
        array_push($errors,"The Number of people field is empty");
    }

    $User_check_query = mysqli_query($db,"SELECT * FROM hostel_owner WHERE UserName = '$owner' LIMIT 1");
        
    $user = mysqli_fetch_assoc($User_check_query);
   
    $ownerId=$user['owner_id'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["Image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
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
    if ($_FILES["Image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
           // echo "The file ". basename( $_FILES["Image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $query = "INSERT INTO hostel(hostel_name, profile_image, Price, desciption, physical_address,Number_of_People, owner_id) VALUES ('$hostelName',
        '$target_file','$price','$description','$address','$rooms','$ownerId')" or die("Error!".mysqli_error($db));
         mysqli_query($db,$query);
    }
}





?>