
<?php
//if you do not login,you cannot acces this page
session_start();

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

        <!-- jQuery library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- Latest compiled JavaScript -->
        <script src="js/Slider.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a>

                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="hostels.php">Hostels</a></li>
                            <li><a  href="#social" id="about">About the System</a></li>
                            <li><a href="contact_form.php">Contact </a></li>
                            <?php if(!isset($_SESSION['user_name'])){
                            echo '<li><a href="login_page.php">Log in</a></li>';
    
                            } else {
                            echo '<li><a href="server_side.php?logout=logout">LogOut</a></li>';
                            $db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");
                            $hostel = mysqli_query($db,"SELECT * FROM international_student where UserName='$_SESSION[user_name]'");
                            if ($hostel->num_rows >0) {
                              $row = $hostel->fetch_assoc();
                            echo '<td scope="row"><a href="self_edit.php?user_id='.$row["id"].'" class="btn btn-success">Edit Profile</a></td>';
                            }
                          }
                          
                          ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="w3-container">
            <h1>Recommended hostels</h1>

            <?php if(isset($_SESSION['user_name'])) :?>
                  <p style="font-size:16px;border:1px solid:#a9442;
    background-color: coral;border-radius:5px;text-align:center;margin-left:500px;margin-right:500px;margin-top:50px;margin-bottom:1px;"><?php echo"<strong>".$_SESSION['user_name']."\t\t\tYou are very welcome"."</strong>"?></p>
                  
                  <?php endif ?>
            <p></p>
          </div>
          
          <div class="container">
            <br>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
              
              </ol>
          
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
          
                <div class="item active">
                  <img src="images/wka.jpg" alt="kafoca1" width="460" height="345">
                  <div class="carousel-caption">
                    <h3>Kafoca</h3>
                    <p id=kafoca>A convient place for both girls and boys</p>
                  </div>
                </div>
          
                <div class="item">
                   <img src="images/quetu.jpg" alt="quetu" width="460" height="345">
                  <div class="carousel-caption">
                    <h3>Quetu</h3>
                    <p id="quetu">A conducive atmosphere for Students</p>
                  </div>
                </div>
              
                <div class="item">
                   <img src="images/Home.jpg" alt="Shalom" width="460" height="345">
                  <div class="carousel-caption">
                    <h3>Shalom</h3>
                    <p>A unique experience for Students</p>
                  </div>
                </div>
          
                <div class="item">
                  <img src="images/Host.jpg" alt="Bimos" width="460" height="345">
                  <div class="carousel-caption">
                    <h3>Bimos</h3>
                    <p id="Bimos">A beautiful place in Madaraka</p>
                  </div>
                </div>
                <div class="item">
                  <img src="images/kafoca2.jpg" alt="Kwetu" width="460" height="345">
                  <div class="carousel-caption">
                    <h3>Kwetu</h3>
                    <p id="Kwetu">A peaceful place in Madaraka</p>
                  </div>
                </div>
                <div class="item">
                  <img src="images/amazingi.jpg" alt="Rafiki" width="460" height="345">
                  <div class="carousel-caption">
                    <h3>Rafiki</h3>
                    <p id="Rafiki">A wonderfull place in Madaraka</p>
                  </div>
                </div>
            
              </div>
          
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        <p class="comment">There are many privately owned facilities around the University.<br> This website will assist  international Students to find a hostel by being
          provided with information on the different hostel facility.<br>
          It is recommended, that students should try to obtain a place in one of them; they should avoid staying
              in a hotel. <br>Hotels in Nairobi are very expensive and the atmosphere there may not be conducive for study.</p>
              <h2></h2>
              <p></p> 
              <p></p>
            <div id="dan">
              <img id="myImg" src="images/Host.jpg" alt="You will get an unforgettable experience" style="width:100%;max-width:270px">
              <img id="myImg" src="images/Amazing.jpg" alt="You will get an unforgettable experience" style="width:100%;max-width:270px">
              <img id="myImg" src="images/hostels2.jpg" alt="You will get an unforgettable experience" style="width:100%;max-width:270px">
              <img id="myImg" src="images/wka.jpg" alt="You will get an unforgettable experience" style="width:100%;max-width:270px">
              <script src="js/Image.js>"></script>
            </div>
              <!-- The Modal -->
            <div id="myModal" class="modal">
              <span class="close">&times;</span>
               <img class="modal-content" id="img01">
               <div id="caption"></div>
            </div>
              <header class="about_the_site">
                <div class="about_the_system">
                  <h2 class="the_system">About this System</h2>
                  <script src="js/Slider.js"></script>
                </div>
                
              </header>
              <p id="about_comment">This System helps Students, who come from all over the world to Study in Strathmore University,to easily find an accommodation.<br>
                The two first days  are free of charge if the booking was done on the System and the student will have the privilege,if possible, of getting
                 the food <br><span class="from">from his own country prepared for him .The idea was developped by <a href="https://twitter.com/BalugeInnocent">Innocent Baluge.</a>
                The inspiration comes from the fact that he is an international Student and he had difficulties of finding an Accomodation the first day
              he arrived in Nairobi.
            That is why the system tends to help Students,especially international Students, who do not have any relative in Nairobi.
              <br>The website will basically help Students,particularly international Students,to book a hostel of their choice
            before they arrive in Nairobi </span>
              </p>
          <footer>
            <div class="footer">
              <p class="Links">Links related to Students</p>
              <ul>
                <li><a href="https://www.strathmore.edu/student-life">Students Life</a></li>
                <li><a href="http://www.studentaffairs.strathmore.edu/">Dean of Students</a></li>
                <li><a href="https://www.strathmore.edu/admissions/#international-students">International Students</a></li>
               
              </ul>
             <p class="strathmore_footer"><a href="https://www.strathmore.edu" class=" strathmore_link">Strathmore University</p></a>
             <div id="social">
              <a href="https://twitter.com/StrathU"><img src="images/twittericon.png" width="30" height="30" alt="Twiter" class="Twiter"/></a>
             <a href="https://www.facebook.com/StrathmoreUniversity"><img src="images/fbicon.png" width="30" height="30" alt="facebook" class="facebook"/></a>
             <a href="https://www.instagram.com/strathmore.university/"><img src="images/instagram.png" width="30" height="30" alt="instagram" class="instagram"/></a>
            </div>
             
             
             
              <p>Copyright © 2019.Innocent Baluge.All rights reserved</p>
            </div>
          </footer>
    </body>
</html>