<?php

session_start();
//if not login you cannot book
if(!isset($_SESSION['user_name'])){
    header('location:login_page.php');
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//connect ot the database
$db = mysqli_connect('localhost','root','','is_project') or die("Did not connect to the database");

$uname = $_SESSION['user_name'];
if(isset($_GET['hostel_id'])){
$hostel_id = $_GET['hostel_id'];
}

$User_details = mysqli_query($db,"SELECT * FROM international_student  WHERE UserName = '$uname' LIMIT 1");
$user = mysqli_fetch_assoc($User_details);

$_SESSION['user_id'] = $user['id'];
$email = $user['email'];

$adminEmail = 'innocentbaluge2@gmail.com';

$user_id = $_SESSION['user_id'];

if(isset($_POST['Booking'])){
    $arrival_date = mysqli_real_escape_string($db,$_POST['arrival_date']);
    $hostel_id = mysqli_real_escape_string($db,$_POST['hostel_id']);
    $room = mysqli_real_escape_string($db,$_POST['room']);
    $meal = mysqli_real_escape_string($db,$_POST['meal']);

    $query = "INSERT INTO `bookings`( `hostel_id`, `student_id`, Prefered_room ,Prefered_meal,`arrival_date`) VALUES ('$hostel_id','$user_id','$room','$meal','$arrival_date')"
    or die("Error!".mysqli_error($db));
    mysqli_query($db,$query);
    
    $subject = "Hostel Bookings";
    $body = "The Booking has been received successfully."."<br>" ."You booked "."$room"."in the hostel number $hostel_id."."<br>" ."The meal that will probably be served to you the most 
    is $meal.";

    echo $query;
//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kiplelisaac@gmail.com';                 // SMTP username
    $mail->Password = 'Chepkurui1998';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true
)
);                                    // TCP port to connect to


    $message1 = $body . "<br>"."As we expect you on $arrival_date ,Please get in touch with the admin on the email bellow."."<br>" ."Welcome to Strathmore University.". "<br>" . $adminEmail;
 
 

    //Recipients
    $mail->setFrom($email);
    $mail->addAddress($email);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message1;
    $mail->AltBody = $message1;

    $mail->send();
    header("location: index.php");
    echo 'Message has been sent';
    
}
catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

}

}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Booking page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="css/sign_up.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
        <div id="title">
            <span class="logo"><a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a></span>
            <br><h1>Booking</h1><br>
        </div>
        </header>
        <form action="booking.php" method="post">
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>Booking</h3></div>
                  <div class="panel-body">
                    <br><br>
                    <label for="Arrival Date">Arrival Date</label>
                    <input type="date" name="arrival_date"required><br><br>
                    <label for="room">Prefered room:</label>
                   <select name="room">
                     <option>Single room</option>
                     <option>Self-contained</option>
                     <option>2 sharing</option>
                     <option>3 sharing</option>
                     <option>4 sharing</option>
                    </select>
                    <BR><BR>
                    <label for="meal">Pefered meal</label>
                    <input type="text" name="meal"required><br><br>
                    <input type="hidden" name="hostel_id" value="<?php echo $hostel_id?>"required><br><br>
                    <button class="btn btn-primary" name="Booking">Book</button>
                    </div>
                </div>
            </div>
    </form>
     
     
    </body>
</html>