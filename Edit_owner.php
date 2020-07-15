<?php

$user_id = $_GET['owner_id'];
//connect to the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
$user = mysqli_query($db,"SELECT * FROM hostel_owner WHERE owner_id= $user_id");
if ($user->num_rows > 0) {
    // output data of each row
    while($row = $user->fetch_assoc()) {
        
        $user_id = $row["owner_id"]; 
        $First_name = $row["First_name"];
        $Last_name = $row["Last_name"];
        $UserName = $row["UserName"];
        $email  = $row["email"];
        $phone_number  = $row["phone_number"];
        $password = $row['password'];
    }
}

if(isset($_POST['update_owner'])){
    $user_id = mysqli_real_escape_string($db,$_POST['user_id']);
    $firstName = mysqli_real_escape_string($db,$_POST['first_name']);
    $lastName = mysqli_real_escape_string($db,$_POST['last_name']);
    $userName = mysqli_real_escape_string($db,$_POST['user_name']);
    $phoneNumber = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    //$country = mysqli_real_escape_string($db,$_POST['country']);
   

        $query = "UPDATE `hostel_owner` SET `First_name`='$firstName',`Last_name`='$lastName',`UserName`='$userName',
        `email`='$email',`phone_number`='$phoneNumber' WHERE `owner_id` = '$user_id';";
        mysqli_query($db,$query);
        header('location:owners.php');
        
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
        <title>Update Owner Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="css/sign_up.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
        <div id="title">
            <span class="logo"><a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a></span>
            <br><h1>Recommended hostels</h1><br>
        </div>
        </header>
        <form action="Edit_owner.php" method="post">
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>Update details</h3></div>
                  <div class="panel-body">
                    <br><br>
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" placeholder="enter your first  name" required><br><br>
                    <label for="first name">First Name: </label>
                    <input type="text" name="first_name" value="<?php echo $First_name ?>" placeholder="enter your first  name" required><br><br>
                    <label for="last name">Last Name: </label>
                    <input type="text" name="last_name" value="<?php echo $Last_name ?>" placeholder="enter your last name"required><br><br>
                    <label for="last name">user Name: </label>
                    <input type="text" name="user_name" value="<?php echo $UserName ?>" placeholder="enter your last name"required><br><br>
                    <label for="phone">Phone number </label>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"placeholder="073-2345-678" value="<?php echo $phone_number ?>" required><br><br>
                    <label for="email">Email address: </label>
                    <input type="email" name="email" placeholder="example@gmail.com" value="<?php echo $email ?>" required><br><br>
                    <!--<label for="Country">Country of Origin: </label>
                    <select  name="country">
                        <option >Angola</option>
                        <option>Rwanda</option>
                        <option>Burundi</option>
                        <option>Cameroon</option>
                        <option>Congo Brazaville</option>
                        <option>Democratic Republic of congo</option>
                        <option>Ethiopia</option>
                        <option>China</option>
                        <option>France</option>
                        <option>Egypt</option>
                        <option>Uganda</option>
                        <option>Tunisia</option>
                        <option>Togo</option>
                        <option>Ivory coast</option>
                        <option>Nigeria</option>
                        <option>Saudi Arabia</option>
                        <option>Somalia</option>
                        <option>Zambie</option>
                        <option>Zimbabwe</option>
                        <option>Mozambique</option>
                        <option>Malawi</option>
                        <option>Bostwana</option>
                        <option>Liberia</option>
                        <option>South Africa</option>
                        <option>South sudan</option>
                        <option>Japan</option>
                        <option>Tanzania</option>
                        <option>Burundi</option>
                        <option>Spain</option>
                    </select><br><br>
                    <label for="password">Password: </label>
                    <input type="password"id="password" name="password"  placeholder="enter the password" required><br><br>
                    <input type="checkbox" id="show_pass" onclick="myFunction()">
                    <br><br>
                    <script>
                        function myFunction() {
                            var password = document.getElementById("password");
                            if (password.type === "password") {
                                password.type = "text";
                            } else {
                                password.type = "password";
                            }
                        }
                        </script>
                    <label for="confirm">Confirm password </label>
                    <input type="password" id="confirm" name="confirm"  placeholder="confirm password"><br><br>-->
                    <button class="btn btn-primary" name="update_owner">update</button>
                    </div>
                </div>
            </div>
    </form>
     
     
    </body>
</html>