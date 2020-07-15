<?php
    $db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");

    //if you do not login,you cannot acces this page
    session_start();
    if(!isset($_SESSION['user_name']) || $_SESSION['user_name']!="Admin"){
        header('location:login_page.php');
    }

    //To delete a booking
    if(isset($_GET['booking_id'])) {
        $sql = "DELETE FROM bookings WHERE booking_id = ".$_GET['booking_id'];
        mysqli_query($db, $sql);
        header('location:display_bookings.php');
    }
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Display bookings</title>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First_name Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Room</th>
                    <th scope="col">Prefered meal</th>
                    <th scope="col">Hostel Name</th>
                    <th scope="col">Arrival date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //connect ot the database
                    $query = mysqli_query($db,"SELECT bookings.booking_id,international_student.First_name,international_student.Last_name,bookings.Prefered_room,bookings.Prefered_meal,hostel.hostel_name,bookings.arrival_date
                    FROM international_student,hostel,bookings
                    WHERE international_student.id=bookings.student_id and bookings.hostel_id=hostel.hostel_id");
                    if ($query->num_rows > 0) {
                        // output data of each row
                        while($row = $query->fetch_assoc()) {
                            echo '<tr>';
                                echo '<th scope="row">'.$row["booking_id"].'</td>';
                                echo '<td scope="row">'.$row["First_name"].'</td>';
                                echo '<td scope="row">'.$row["Last_name"].'</td>';
                                echo '<td scope="row">'.$row["Prefered_room"].'</td>';
                                echo '<td scope="row">'.$row["Prefered_meal"].'</td>';
                                echo '<td scope="row">'.$row["hostel_name"].'</td>';
                                echo '<td scope="row">'.$row["arrival_date"].'</td>';

                                echo '<td scope="row"><a href="display_bookings.php?booking_id='.$row["booking_id"].'" class="btn btn-danger">Delete</a></td>';
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