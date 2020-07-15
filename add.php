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
    
<?php include('admin_server.php')?>
        <title>Add hostel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="css/Style1.css" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            <div class="container">
                <div class="row">
                    <a href="admin.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a>
                    <nav>
                        <ul>
                        <li><a href="admin.php">List hostels</a></li>
                            <li><a href="add.php">Add Hostels</a></li>
                            <li><a href="owners.php">List Owners</a></li>
                            <li><a href="owner.php"> Add owner </a></li>
                            <li><a  href="users.php">List students</a></li>
                            <li><a  href="unsuspend.php">suspended</a></li>
                            <li><a  href="display_bookings.php">View Bookings</a></li>
                            <li><a  href="view_message.php">View Messages</a></li>
                            <li><a href="server_side.php?logout=logout">Log out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
            <form action="add.php" method="post" enctype="multipart/form-data">
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Hostel Form</h3></div>
                        <div class="panel-body">
                            <br><br>
                            <?php include('errors_count.php')?>
                            <label for="name">Hostel Name: </label>
                            <input type="text" name="name" required><br><br>
                            <label for="Image">Profile: </label>
                            <input type="file" name="Image" required><br><br>
                            <label for="price">Price: </label>
                            <input type="text" name="price" required><br><br>
                            <label for="description">Description: </label>
                            <textarea name="description"col="5" rows="9"></textarea><br><br>
                            <label for="address">Physical Address: </label>
                            <input type="text" name="address" required><br><br>
                            <label for="rooms">Number of people: </label>
                            <input type="text" name="rooms" required><br><br>
                            <label for="owner">Owner: </label>
                            <input type="text" name="owner" required><br><br>
                            <button class="btn btn-primary" name="addHostel">Add</button>

                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>