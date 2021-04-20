<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in - Phonehub</title>

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
                               
                        if ($_GET['error'] == "emptyFields") {
                             echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Please input all of the fields!</strong> 
                                    </div>';
                                    }
                    
                                else if ($_GET['error'] == "invaUname") {
                                       echo  ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Username!</strong> 
                                    </div>';          
                                   }

                                 else if ($_GET['error']  == "invaFName") {
                                       echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Firstname!</strong> 
                                    </div>';          
                                   }
                                    
                                  else if ($_GET['error']  == "invaLName") {
                                       echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Lastname!</strong> 
                                    </div>';          
                                   }

                                 else if ($_GET['error']  == "invaAddress") {
                                       echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Address!</strong> 
                                    </div>';          
                                   } 

                                 else if ($_GET['error']  == "invaPass") {
                                       echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Input a valid Password!</strong> 
                                    </div>';          
                                   } 
                                
                                else if ($_GET['error']  == "usernametaken") {
                                       echo ' <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Username already taken!</strong> 
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
                <div class="col-sm-7">
                    <img src="img/loginpic.jpg" width="100%">
                </div>

                <div class="col-sm-5">
                    <div class="signincon">
                        <form action="includes/signin.inc.php" method="POST">
                            <div class="form-group">
                                <label>Firstname:</label>
                                <input type="text" name="firstname" class="form-control" id="size">
                            </div>

                            <div class="form-group">
                                <label>Lastname:</label>
                                <input type="text" name="lastname" class="form-control" id="size">
                            </div>

                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" class="form-control" id="size">
                            </div>

                            <div class="form-group">
                                <label> Street / Purok / Zone</label>
                                <input type="text" class="form-control" name="useraddress" id="size">
                            </div>

                            <div class="form-group">
                                <label> Municipality:</label>
                                <select name="usermuni">
                                    <option value="">Choose your Municipality</option>
                                    <option value="LI" required>Ligao</option>
                                    <option value="GU" required>Guinobatan</option>
                                    <option value="PO" required>Polangui</option>
                                    <option value="OA" required>Oas</option>
                                    <option value="CA" required>Camalig</option>
                                    <option value="DA" required>Daraga</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Province:</label>
                                <select name="userprov">
                                    <option value="">Choose your Province</option>
                                    <option value="AL" required>Albay</option>
                                    <option value="CA" required>Camarines Sur</option>
                                    <option value="CS" required>Camarines Sur</option>
                                    <option value="CT" required>Catanduanes</option>
                                    <option value="MA" required>Masbate</option>
                                    <option value="SS" required>Sorsogon</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Gender:</label>
                                <select name="usergender">
                                    <option value="">Choose your gender</option>
                                    <option value="M" required>Male</option>
                                    <option value="F" required>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Password:</label>
                                <input type="password" name="password" class="form-control" name="address" id="size">
                            </div>
                            <!-- <div class="form-group">
                                <label> Re-enter password:</label>
                                <input type="password" class="form-control" name="address" id="size">
                            </div> -->
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
