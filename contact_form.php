
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include('contact.php')?>
        <title>Contact form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
       
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
             header{
                background-color: skyblue; 
                line-height: 80px;
                margin-left: 350px;
                margin-right: 300px;
            }
            
            .logo
            {
                /*position:absolute;
                left: 100px;*/
                margin-left:140px;
            }

        </style>
    </head>
    <body>
    <header >
            <div class="container">
                <div class="row">
                    <a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo" >  </a>
        <h2 style="text-align:center;">Contact form</h2>
    </header>
            <form action="contact_form.php" method="post" >
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Send us your message</h3></div>
                        <div class="panel-body">
                            <br><br>
                            <?php include('errors_count.php') ?>
                            <label for="name">Subject: </label>
                            <input type="text" name="subject" required><br><br>
                            <label for="email">email: </label>
                            <input type="text" name="email" required><br><br>
                            <label for="message">Message: </label>
                            <textarea name="message"col="5" rows="9"></textarea><br><br>
                            <button class="btn btn-primary" name="send">Send</button>

                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>