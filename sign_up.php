<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include('server_side.php') ?>
        <title>Sign_up page</title>
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
        <form action="sign_up.php" method="post">
            <br><br>
            <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>Sign up</h3></div>
                  <div class="panel-body">
                    <br><br>
                    <?php include('errors_count.php') ?>
                    <label for="first name">First Name: </label>
                    <input type="text" name="first_name" placeholder="enter your first  name" required><br><br>
                    <label for="last name">Last Name: </label>
                    <input type="text" name="last_name" placeholder="enter your last name"required><br><br>
                    <label for="last name">user Name: </label>
                    <input type="text" name="user_name" placeholder="enter your last name"required><br><br>
                    <label for="phone">Phone number </label>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"placeholder="073-2345-678" required><br><br>
                    <label for="email">Email address: </label>
                    <input type="email" name="email" placeholder="example@gmail.com" required><br><br>
                    <label for="Country">Country of Origin: </label>
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
                    <input type="password"id="password" name="password" placeholder="enter the password" required><br><br>
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
                    <input type="password" id="confirm" name="confirm" placeholder="confirm password"><br><br>
                    <button class="btn btn-primary" name="Register">Register</button>
                    <p>Already have an account?<a href="login_page.php">Sign in</a></p>
                    </div>
                </div>
            </div>
    </form>
     
     
    </body>
</html>