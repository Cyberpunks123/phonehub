<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in - Phonehub</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <?php 
      include 'header.html';
    ?>

    <!-------------------------------------- para lang alam ko ------------------------------------------------ -->

    <?php
                if (isset($_GET['error'])) {

                    if ($_GET['error'] == "loggedempty") {
                        echo "<p class='error'>Please input all of the fields</p>";}

                    else if ($_GET['error'] == "loggedinvaname") {
                        echo "<p class='error'>Input a valid Username</p>"; }

                    else if ($_GET['error'] == "loggedinvapassw") {
                        echo "<p class='error'>Input a valid Password</p>"; }

                    else if ($_GET['error'] == "Usernotfound") {
                        echo "<p class='error'>User not Found</p>"; }
                }

                    else if (isset($_GET['login']) == "success") {
                        echo "<p class='login'>Log In Successful</p>";
                } 
                    else if (isset($_GET['signin']) == "success") {
                        echo "<p class='signin'>Sign In Successful</p>";
                }


                    else {
                    echo " ";
                }      
    ?>


    <div class="account-page">
        <div class="row">
            <div class="container">
                <div class="col-md-6">
                    <img src="img/loginlogo.jpg" width="100%">
                </div>

                <div class="col-md-6">
                    <div class="logincon">
                        <form action="includes/login.php" method="POST">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" name="login" class="btn btn-primary">Log in</button>

                            <p><a href="">Forgot password?</a></p>
                            <p><a href="">Do you want to sell online? Click here !</a></p>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-------------------------------------- para lang alam ko ------------------------------------------------ -->


    <?php 
      include 'footer.html';
    ?>

</body>

</html>
