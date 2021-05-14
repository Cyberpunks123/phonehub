<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

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





<body>

    <div class="topnav" id="myTopnav">
        <div class="container-fluid">
            <div class="col-md-6 col-xs-4">
                <?php if (isset($_SESSION['USER'])) {
                     $row['user_id'] = $_SESSION['USER'];?>


                <a href="#" class="collapsible" data-toggle="modal" data-target="#CreateShop"><span class="glyphicon glyphicon-home"></span> Create Shop</a>
                <a href="#" class="collapsible" data-toggle="modal" data-target="#basicModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Items</a>
                
                
                
                
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/addnewitem.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add New Items</h4>

                    </div>
                    <div class="modal-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName">Item Name</label>
                                <input class="form-control" type="text" name="additemname" placeholder="Name of Item.." required pattern="[A-Za-z 0-9]+">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="iemPrice">Price</label>
                                <input class="form-control" type="text" name="additemprice" placeholder="Input item price.." required pattern="[0-9]+">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="iemPrice">Itemcode</label>
                                <input class="form-control" type="text" name="additemcode" placeholder="Input item code.." required pattern="[0-9]+">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Item image</label>
                                <input class="form-control" type="file" name="additemimage" required accept="image/x-png,image/image/jpeg">
                            </div>
                        </div>

                        <input type="hidden" name="additemsUid" value="<?php echo $_SESSION['USER']?>">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemCat">Category</label>
                                <select name="additemcategory" class="selectadditem" required>
                                    <?php 
                  $catList = getCategory($conn);
                  foreach($catList as $key => $value){ ?>
                                    <option value="<?php echo $value['cat_id'];?>"> <?php echo $value['cat_desc'];?></option>
                                    <?php } 
                  ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="subject">Description</label>
                            <textarea id="subject" name="additemdesc" placeholder="Write description of the item.." style="height:200px" required></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="addnewItem" value="Submit">
                    </div>

                </form>

            </div>

        </div>
    </div>

                
                
                
                


                <?php    }
                        else{?>
                <a href="shopaccnt.php"><span class="glyphicon glyphicon-log-in"></span> Log in to Store</a>
                <?php }?>

            </div>


            <div class="col-md-6 col-xs-6">
                <div class="search-container">
                    <?php
                    if (isset($_SESSION['USER'])) {
                     $row['user_id'] = $_SESSION['USER'];?>
                    <a href="userprof.php?disuser=<?php echo $row['user_id'];?>"><i class="fa fa-user"></i> My Account</a>

                    <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a>
                    <a href="checkout.php"><span class="glyphicon glyphicon-list-alt"></span> Checkout</a>
                    <a href="includes/logout.inc.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
                    <form action="shop.php" method="GET">
                        <input id="searchbar" name="searchkeys" type="text" placeholder="Search..">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>


                    <?php    }


                    else if (!isset($_SESSION['USER'])) {?>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <a href="accnt.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a>

                        <a href="signup.php"><span class="glyphicon glyphicon-edit"></span> Sign up</a>

                        <form action="shop.php" method="GET">
                            <input id="searchbar" name="searchkeys" type="text" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>

                    <?php }
                    
                ?>


                </div>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!-- End header area  -->






    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php"><img src="img/logo.jpg" width="40%" height="40%"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if ($page == 'index')echo 'active';?>"><a href="index.php">Home</a></li>
                        <li class="<?php if ($page == 'shop')echo 'active';?>"><a href="shop.php">Item page</a></li>
                        <li class="<?php if ($page == 'singleproduct')echo 'active';?>"><a href="singleproduct.php">Single product</a></li>
                        <li class="<?php if ($page == 'cart')echo 'active';?>"><a href="cart.php">Cart</a></li>
                        <li class="<?php if ($page == 'checkout')echo 'active';?>"><a href="checkout.php">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <!-- End mainmenu area -->


    <!--    ------------------- modals--------------------------------------->


    <div class="modal fade" id="CreateShop" tabindex="-1" role="dialog" aria-labelledby="CreateShop" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/addingNewShop.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Create New Shop</h4>

                    </div>
                    <div class="modal-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName">Shop Name</label>
                                <input class="form-control" type="text" name="suppsUpName" placeholder="Enter New Shop Name" required pattern="[A-Za-z 0-9]+">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName">Shop Username</label>
                                <input class="form-control" type="text" name="suppsUpUsrName" placeholder="Enter New Shop Name" required pattern="[A-Za-z @ 0-9]+">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName">Shop Municipality</label>
                                <input class="form-control" type="text" name="suppsUpMun" placeholder="Enter New Shop Municipality" required pattern="[A-Za-z ,- 0-9]+">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName">Shop Province</label>
                                <input class="form-control" type="text" name="suppsUpProv" placeholder="Enter New Shop Province" required pattern="[A-Za-z ,- 0-9]+">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="itemName">Enter Password</label>
                            <input class="form-control" type="password" name="suppsUpPass" placeholder="Enter New Password" required pattern="[A-Za-z 0-9]+">
                        </div>


                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="createNwShop" value="Submit">
                    </div>

                </form>

            </div>

        </div>
    </div>


    <!--   para lang makita ko kung ano na piga edit sa css-->
    <style>
        <?php include "style.css"?>
    </style>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>



    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</body>

</html>