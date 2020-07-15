<?php
session_start();
//connect ot the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
$errors = array();//d where to store errors


if(isset($_POST['Register'])){
    $firstName = mysqli_real_escape_string($db,$_POST['first_name']);
    $lastName = mysqli_real_escape_string($db,$_POST['last_name']);
    $userName = mysqli_real_escape_string($db,$_POST['user_name']);
    $phoneNumber = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $country = mysqli_real_escape_string($db,$_POST['country']);
    $password1 = mysqli_real_escape_string($db,$_POST['password']);
    $password2 = mysqli_real_escape_string($db,$_POST['confirm']);
    //check if fields are empty
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
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Invalid email format");
    }
    if(empty($country)){
        array_push($errors,"The country field is empty");
    }
    if(empty($password1)){
        array_push($errors,"The password field is empty");
    }
    if(empty($firstName)){
        array_push($errors,"The please  confirm your password");
    }
    //check if the username is unique or email or phone number
    //check whether the user name is unique
    $User_check_query = mysqli_query($db,"SELECT * FROM international_student  WHERE UserName = '$userName' or email = '$email' 
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
        $query = "INSERT INTO  international_student (First_name,Last_name,UserName,country_of_origin,email,phone_number,passWord) values ('$firstName',
        '$lastName','$userName','$country','$email','$phoneNumber','$password')";
        mysqli_query($db,$query);
        $_SESSION['First_name']= $firstName;
        $_SESSION['success']="You have logged in";
        header('location:login_page.php');
    
    }
}
   
    //login user
    if(isset($_POST['Login'])){
        $userName = mysqli_real_escape_string($db,$_POST['user_name']);
        $password =mysqli_real_escape_string($db,$_POST['password']);
        if(empty($userName)){
            array_push($errors,"The user name field is empty");
        }
        if(empty($password)){
            array_push($errors,"The password field is empty");
        }
        if(count($errors)==0){
            $password =md5($password);
            $query1 ="SELECT * FROM international_student WHERE UserName='$userName' AND PASSWORD ='$password'";
            $query2="SELECT * FROM administrator WHERE UserName='$userName' AND PASSWORD ='$password'";
            $query3="SELECT * FROM hostel_owner WHERE UserName='$userName' AND PASSWORD ='$password'";
            $result1 =mysqli_query($db,$query1);
            $result2 =mysqli_query($db,$query2);
            $result3 =mysqli_query($db,$query3);
        if(mysqli_num_rows($result1) ==1){
            $_SESSION['user_name'] = $userName;
            echo $_SESSION['user_name'];
            $_SESSION['success']= "You have logged in";
            header('location:index.php');

        }
        else if(mysqli_num_rows($result2) ==1){
                $_SESSION['user_name'] = $userName;
                echo $_SESSION['user_name'];
                $_SESSION['success']= "You have logged in";
                header('location:admin.php');
    
            
        }
        else if(mysqli_num_rows($result3) ==1){
            $_SESSION['user_name'] = $userName;
            echo $_SESSION['user_name'];
            $_SESSION['success']= "You have logged in";
            header('location:owner_view.php');

        
    }
        else{
            array_push($errors,"Wrong user name or password");
        }
    }
}

    //logout users
    if(isset($_GET['logout'])){
        unset($_SESSION['user_name']);
        session_destroy();
        header('location:login_page.php');
    }
    





?>