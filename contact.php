<?php
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
$errors = array();
if(isset($_POST['send'])){
    $subject=mysqli_escape_string($db,$_POST['subject']);
    $mail=mysqli_escape_string($db,$_POST['email']);
    $message=mysqli_escape_string($db,$_POST['message']);
    if(empty($subject)){
        array_push($errors,"The hsubject field is empty");
    }
    if (empty($mail)) {
        array_push($errors,"Email is required");
      } 
        // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            array_push($errors,"Invalid email format");
    }
      
    if(empty($message)){
        array_push($errors,"The message field is empty");
    }
    if(count($errors) == 0){
      $query =
      $query = "INSERT INTO `contacts`(`title`, `email`, `message`) VALUES ('$subject','$mail','$message')"
      or die("Error!".mysqli_error($db));
      mysqli_query($db,$query);
      header('location:index.php'); 
    }
    


}
?>