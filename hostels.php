<?php
//connect ot the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>hostels</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/hostels.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header>
        <div id="title">
            <span class="logo"><a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a></span>
            <br><h1>Recommended hostels</h1><br>
        </div>
         </header>
         <div class="container">
            <div class="row">
                
                <?php
                    $result = mysqli_query($db,"SELECT * FROM hostel WHERE suspend = 0");

                    if ($result->num_rows > 0) {
                        // output data of each row
                        $count = 1;
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="w3-card-4" style="width:50%">
                                    <img src='.$row["profile_image"].' alt="Hostels" style="width:95%;height:60%">
                                    <div class="w3-container w3-center">
                                        <h2>'.$row["hostel_name"].'</h2>
                                        <h3>'.$row["desciption"]."<br>Located in:".$row["physical_address"].'</h3>
                                        <h4>'.$row["Number_of_People"].'  People to accomodate</h4>
                                        <h4>The price is: '.$row["Price"].'Ksh</h4>
                                        <a href="booking.php?hostel_id='.$row["hostel_id"].'"><button class="btn btn-primary">Book</button></a>
                                        <br>
                                        <br>
                                    </div>
                                </div>';
                            if($count%3 == 0) {
                                echo '</div><div class="row">';
                            }
                            $count++;
                        }
                    } else {
                        echo "<h3>0 Hostels Uploaded</h3>";
                    }
                ?>
            </div>
         </div>
         
    </body>
</html>
