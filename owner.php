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
        <title>add owner</title>
<?php include('admin_server.php')?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="css/sign_up.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
        <div id="title">
            <span class="logo"><a href="admin.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a></span>
            <br><h1>Administrator panel</h1><br>
        </div>
        </header>
        <form action="owner.php" method="post">
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>Add owner</h3></div>
                  <div class="panel-body">
                    <br><br>
                <?php include('errors_count.php')?>
                    <label for="first name">First Name: </label>
                    <input type="text" name="first_name" required><br><br>
                    <label for="last name">Last Name: </label>
                    <input type="text" name="last_name" required><br><br>
                    <label for="last name">user Name: </label>
                    <input type="text" name="user_name"required><br><br>
                    <label for="phone">Phone number </label>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"placeholder="073-2345-678"required><br><br>
                    <label for="email">Email address: </label>
                    <input type="email" name="email" required><br><br>
                    <label for="password">Password: </label>
                    <input type="password"id="password" name="password" required><br><br>
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
                    <input type="password" id="confirm" name="confirm"><br><br>
                    <button class="btn btn-primary" name="add_owner">Add  hostel owner</button>
                    </div>
                </div>
            </div>
    </form>
     
     
    </body>
</html>