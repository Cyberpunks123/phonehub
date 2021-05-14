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
      include 'header.php';
    ?>

    <!-------------------------------------- para lang alam ko ------------------------------------------------ -->

    <?php
                if (isset($_GET['error'])) {

                    if ($_GET['error'] == "loggedempty") {
                        echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Please input all of the fields!</strong> 
                                    </div>';
                                }

                    else if ($_GET['error'] == "loggedinvaname") {
                        echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Username!</strong> 
                                    </div>'; 
                                }

                    else if ($_GET['error'] == "loggedinvapassw") {
                        echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Password!</strong> 
                                    </div>';
                                }

                    else if ($_GET['error'] == "Usernotfound") {
                        echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>User not found!</strong> 
                                    </div>';
                                }
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
                        <form action="includes/shoplogin.inc.php" method="POST">
                            <div class="form-group">
                                <label>Shop's Username:</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" name="shoplogin" class="btn btn-primary">Log in</button>

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
      include 'footer.php';
    ?>

</body>

</html>
