<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include('server_side.php') ?>
        <title>Login page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <header>
        <div id="title">
            <span class="logo"><a href="index.php" class="logo" ><img src="images/homeway.png" height="90px" width="200px" alt="The site logo"></a></span>
            <br><br><h1>Recommended hostels</h1><br>
        </div>
     </header>
        <div class="form">
            <form action="login_page.php" method="post">
                    <br><br>
                    <div class="container">
                        <div class="panel panel-default">
                          <div class="panel-heading"><h3>Login</h3></div>
                          <div class="panel-body">
                            <?php include('errors_count.php') ?>
                            <br><br>User name:
                            <input type="text" name="user_name" placeholder="enter your user name" required><br><br>
                            Password:
                            <input type="password" name="password" placeholder="enter the password" id="pass"required> <br><br>
                            <input type="checkbox" onclick="myFunction()">Show Password
                            <br><br>
                            <script>
                        function myFunction() {
                            var password = document.getElementById("pass");
                            if (password.type === "password") {
                                password.type = "text";
                            } else {
                                password.type = "password";
                            }
                        }
                        </script>
    
                            <button class="btn btn-primary" name="Login">Log in</button> <a href="sign_up.php">I don't have an account</a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </body>
</html>
