<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:login_page.php');
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Home way from Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/Style1.css" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                            <li><a  href="users.php">List users</a></li>
                            <li><a  href="unsuspend.php">suspended</a></li>
                            <li><a  href="display_bookings.php">View Bookings</a></li>
                            <li><a  href="view_message.php">View Messages</a></li>
                            <li><a href="owners.php">List Owners</a></li>
                            <li><a href="owner.php"> Add owner </a></li>
                            <li><a href="server_side.php?logout=logout">Log out</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Hostel Name</th>
                <th scope="col">Profile Image</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Physical Address</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //connect ot the database
                    $db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
                    $hostel = mysqli_query($db,"SELECT * FROM hostel WHERE suspend = 1");
                    if ($hostel->num_rows > 0) {
                        // output data of each row
                        while($row = $hostel->fetch_assoc()) {
                            echo '<tr>';
                                echo '<th scope="row">'.$row["hostel_id"].'</td>';
                                echo '<td scope="row">'.$row["hostel_name"].'</td>';
                                echo '<td scope="row"><img src="'.$row["profile_image"].'" class="rounded-circle" alt="Profile Image" height="70px;" width="70px"></td>';
                                echo '<td scope="row">'.$row["Price"].'</td>';
                                echo '<td scope="row">'.$row["desciption"].'</td>';
                                echo '<td scope="row">'.$row["physical_address"].'</td>';
                                echo '<td scope="row"><a href="unsuspend_server.php?hostel_id='.$row["hostel_id"].'" class="btn btn-danger">unsuspend Hostel</a></td>';
                                echo '<td scope="row"><a href="delete.php?hostel_id='.$row["hostel_id"].'" class="btn btn-danger">Delete</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "0 results";
                    }



                    ?>
            </tbody>
            </table>
    </body>
</html>