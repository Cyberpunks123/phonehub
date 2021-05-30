<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>
<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>User Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="mystyle.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>



    <div class="justprofile">
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <?php  
                            

                                $arr = DisplayEachUser($conn, $_SESSION['USER']);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>


                    <h3>Hello! <br> <?php echo $val['first_name']?> </h3>

                    <?php
                                                                 } 
                                } 
                             ?>
                </div>

                <ul class="list-unstyled components">
                    <p>User Page</p>
                    <!--
                    <li class="active boot">
                        <a href="" data-toggle="collapse" aria-expanded="false">Orders</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Processed Order</a></li>
                            <li><a href="#">Recieved</a></li>
                        </ul>
                    </li>
-->

                    <li class="boot ">
                        <a href="userproff.php">Overview</a>
                    </li>
                    <li class="boot <?php if(isset($_GET['order']))echo 'active';?>">
                        <a href="userproff.php?order">Orders</a>
                    </li>

                    <li class="boot <?php if(isset($_GET['posted']))echo 'active';?>">
                        <a href="userproff.php?posted">Posted items</a>
                    </li>

                    <li class="boot <?php if(isset($_GET['sales']))echo 'active';?>">
                        <a href="userproff.php?sales">Sales Track</a>
                    </li>

                    <li class="boot <?php if(isset($_GET['disuser']))echo 'active';?>">
                        <a href="userproff.php?disuser=<?php echo $_SESSION['USER'];?>">About</a>
                    </li>

                    <!--
                                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
-->
                </ul>
            </nav>



            <!--    ---------------------------------------------------        -->



            <div class="container">


                <!-- Page Content Holder -->
                <div id="content">



                    <nav class="navbar navbar-default">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Resize</span>
                            </button>


                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="" data-toggle="modal" data-target="#editallUsrprofile"><span class="glyphicon glyphicon-user"></span> Edit Profile</a></li>

                                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="product-count-user"> <?php echo getCartCount($conn,$_SESSION['USER']);?>
                                        </span> Cart</a></li>


                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                                <li><a href="#" class="collapsible" data-toggle="modal" data-target="#basicModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Items</a></li>
                                <li><a href="#addNwcat" data-toggle="modal" data-target="#addNwcat"><span class="glyphicon glyphicon-phone"></span> Add Category</a></li>
                            </ul>
                        </div>

                    </nav>


                    <?php 
                    $disuser="";
                            if (isset($_GET['disuser'])){
                                $disuser=htmlentities($_GET['disuser']);     
                                $arr = DisplayEachUser($conn, $disuser);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>

                    <div class="section about-section" id="about">
                        <div class="container-fluid">
                            <div class="row align-items-center flex-row-reverse">

                                <div class="col-lg-1 col-xs-6">
                                    <div class="editpics">
                                        <a href="" data-toggle="modal" data-target="#editpicUserModal"> <i class="fa fa-camera" style="font-size:30px"></i> </a>
                                    </div>


                                </div>
                                <div class="col-lg-5">
                                    <div class="about-avatar">

                                        <?php if (!empty($val['user_image'])) {?>

                                        <img src="img/<?php echo $val['user_image']?>" alt="Admin" class="rounded-circle">

                                        <?php }

                            else {?>
                                        <img src="img/useravatar.png" alt="Admin" class="edit-your-photo">
                                        <?php

                          } ?>




                                    </div>

                                </div>


                                <div class="col-lg-6">
                                    <div class="about-text go-to">
                                        <h3 class="dark-color"><?php echo $val['first_name']?><span></span> <?php echo $val['last_name']?></h3>

                                        <div class="row about-list">
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <label>Username</label>
                                                    <p><?php echo $val['user_name']?></p>
                                                </div>

                                                <div class="media">
                                                    <label>Gender</label>
                                                    <p> <?php echo $val['user_gender']?></p>
                                                </div>
                                                <div class="media">
                                                    <label>Status</label>
                                                    <p> <?php echo $val['user_stat']?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <label>Residence</label>
                                                    <p><?php echo $val['user_address']?></p>
                                                </div>
                                                <div class="media">
                                                    <label>Password</label>
                                                    <p> <?php echo $val['user_pass']?></p>
                                                </div>
                                                <div class="media">
                                                    <label>User type</label>
                                                    <p> <?php echo $val['user_type']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <?php     
                                                                 }
                                                                 }
                                                                 }
                                                                 
                
                else if(isset($_GET['order'])){ ?>

                    <div class="section about-section" id="about">
                        <div class="container-fluid">
                            <div class="row align-items-center flex-row-reverse">



                                <div class="eachcard">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="title">
                                                <h3>Pending Orders</h3>
                                            </div>

                                            <div class="row">

                                                <?php  $cartlist = displayCartByUser($conn, $_SESSION['USER']);
                                               if(!empty($cartlist)) {
                                          foreach($cartlist as $key => $item_code){
                                    ?>
                                                <div class="col-sm-2 cardeach" style="width: 200px">
                                                    <div class="card">
                                                        <div class="imgpos">
                                                            <img src="img/<?php echo $item_code['order_item_image']?>">
                                                        </div>

                                                        <p><?php echo $item_code['order_item_name']?></p>
                                                        <p class="price"><?php echo "Php." . number_format($item_code['order_item_price'])?></p>

                                                        <a href="cart.php"><button>See Details</button></a>

                                                    </div>


                                                </div>
                                                <?php    } }
                                               else{ ?>
                                                <p class="text-center">Empty Orders</p>
                                                <?php   }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="eachcard">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="title">
                                                <h3>Processed Orders</h3>
                                            </div>

                                            <div class="row">

                                                <?php  $cartlist = displayCartByUserOP($conn, $_SESSION['USER']);
                                               if(!empty($cartlist)) {
                                          foreach($cartlist as $key => $item_code){
                                    ?>
                                                <div class="col-sm-2 cardeach" style="width: 200px">
                                                    <div class="card">
                                                        <div class="imgpos">
                                                            <img src="img/<?php echo $item_code['order_item_image']?>">
                                                        </div>

                                                        <p><?php echo $item_code['order_item_name']?></p>
                                                        <p class="price"><?php echo "Php." . number_format($item_code['order_item_price'])?></p>

                                                        <form action="includes/updateReciveIt.inc.php" method="POST">
                                                            <input type="hidden" name="recStat" value="<?php echo $item_code['order_status']?>">
                                                            <input type="hidden" name="recSess" value="<?php echo $_SESSION['USER']?>">
                                                            <input type="hidden" name="recID" value="<?php echo $item_code['order_id']?>">


                                                            <a><button type="submit" name="recievecart">Recieved</button></a>

                                                        </form>
                                                    </div>


                                                </div>
                                                <?php    } }
                                               else{ ?>
                                                <p class="text-center">Empty Orders</p>
                                                <?php   }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="eachcard">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="title">
                                                <h3>Delivered Orders</h3>
                                            </div>

                                            <div class="row">

                                                <?php  $cartlist = displayCartByUserDEL($conn, $_SESSION['USER']);
                                               if(!empty($cartlist)) {
                                          foreach($cartlist as $key => $item_code){
                                    ?>
                                                <div class="col-sm-2 cardeach" style="width: 200px">
                                                    <div class="card">
                                                        <div class="imgpos">
                                                            <img src="img/<?php echo $item_code['order_item_image']?>">
                                                        </div>

                                                        <p><?php echo $item_code['order_item_name']?></p>
                                                        <p class="price"><?php echo "Php." . number_format($item_code['order_item_price'])?></p>



                                                        <form action="includes/deleteDelivrIt.inc.php" method="POST">
                                                            <input type="hidden" name="deliverDEL" value="<?php echo $item_code['order_id']?>">

                                                            <a href=""><button type="submit" name="deleteDel"> <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button></a>


                                                        </form>

                                                    </div>


                                                </div>
                                                <?php    } }
                                               else{ ?>
                                                <p class="text-center">Empty Orders</p>
                                                <?php   }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




                <?php    }
                
                else if(isset($_GET['posted'])){ ?>

                <div class="col-md-12 mb-3">


                    <div class="card-body">

                        <table class="table table-striped showtable text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Item Code</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                 if (isset($_GET['posted'])){
                                 

                                  $item_list = DisplayEachItemPerUser($conn, $_SESSION['USER']);
                                     if(!empty($item_list)) {
                                  foreach($item_list as $key => $value){ ?>

                                <tr>
                                    <td><img src="img/<?php echo $value['item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td><?php echo $value['item_name']?></td>
                                    <td><?php echo $value['cat_desc']?></td>
                                    <td><?php echo $value['item_code']?></td>
                                    <td><?php echo "Php. " . number_format($value['item_price'])?></td>
                                    <td><?php echo $value['item_desc']?></td>
                                    <td><?php echo $value['item_stat']?></td>
                                    <td>

                                        <form action="includes/deleteUsrPstItms.inc.php" method="POST">
                                            <input type="hidden" name="delUseritem" value="<?php echo $value['item_id']?>">

                                            <button type="submit" name="usrdeleteIt" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                        </form>




                                    </td>
                                </tr>


                                <?php } } 
                                else{ ?>
                                <p class="text-center">No Posted Items</p>

                                <?php    } }
                                
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>


                <?php    }
                else if(isset($_GET['sales'])){ ?>


                <div class="col-md-12 mb-3">


                    <div class="card-body">

                        <table class="table table-striped text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Order Date</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Net Amount</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                 if (isset($_GET['sales'])){
                                 

                                    $saleslist = salestrack($conn, $_SESSION['USER']);
                                     if(!empty($saleslist)){
                    foreach($saleslist as $key => $salestr){ ?>

                                <tr>

                                    <td><?php echo $salestr['item_name']?></td>
                                    <td><?php echo $salestr['order_date']?></td>
                                    <td><?php echo "Php. " . number_format($salestr['order_item_price'])?></td>
                                    <td><?php echo $salestr['order_qty']?></td>
                                    <td><?php echo "Php. " . number_format ($salestr['sales_track'])?></td>
                                </tr>


                                <?php } }
                                else {?>
                                <p class="text-center"> No Records</p>

                                <?php } }?>


                            </tbody>
                        </table>
                    </div>
                </div>


                <?php  } 
                
                
                else{  ?>
                <div class="container-fluid ovrview">

                    <?php
                    if(isset($_GET['error']) == "taken") { ?>
                    <div class="alert alert-danger alert-dismissible fade in text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong class="alert-text-danger"> Already In the Database</strong>
                    </div>
                    <?php  } 
                    else if (isset($_GET['add']) == "taken") { ?>
                    <div class="alert alert-success alert-dismissible fade in text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong class="alert-text-success"> Successful!</strong>
                </div>

                <?php   }
                   
                    
                    else{
                        echo " ";
                    }
                    ?>

                <div class="col-md-4">
                    <div class="eachbox">
                        <div class="title">
                            <h3>Pending Orders</h3>
                            <p class="pos" style="color: red"><?php echo getCartCount($conn,$_SESSION['USER']);?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">
                    <div class="eachbox">
                        <div class="title">
                            <h4>Processed Orders</h4>
                            <p class="pos" style="color: blue"><?php echo getProcess($conn,$_SESSION['USER']);?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">
                    <div class="eachbox">
                        <div class="title">
                            <h3>Delivered Orders</h3>
                            <p class="pos" style="color: green"><?php echo getOrdrd($conn,$_SESSION['USER']);?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">
                    <div class="eachbox">
                        <div class="title">
                            <h3>Posted Items</h3>
                            <p class="pos" style="color: orange"><?php echo getPostPerUser($conn,$_SESSION['USER']);?></p>
                        </div>

                    </div>

                </div>  
                   
                <div class="col-md-4">
                    <div class="eachbox">
                        <div class="title">
                            <h3>Sales Count</h3>
                            <p class="pos" style="color: violet"><?php echo getSalesUserCount($conn,$_SESSION['USER']);?></p>
                        </div>

                    </div>

                </div>



            </div>

            <?php    }  
                
                
                
                
                
                ?>






        </div>
    </div>
    </div>

    <!--    ----------------------------------------------------------->

    <div class="modal fade" id="editallUsrprofile" tabindex="-1" role="dialog" aria-labelledby="editallUsrprofile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/usrUpdateAll.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title" id="myModalLabel"> Edit Profile Details</h4>

                    </div>

                    <div class="modal-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName"> First Name</label>
                                <input class="form-control" type="text" name="usrUpFName" placeholder="Enter your new name" required pattern="[A-Z a-z]+">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName"> Last Name</label>
                                <input class="form-control" type="text" name="usrUpLName" placeholder="Enter your new last name" required pattern="[A-Z a-z]+">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="itemName"> Address</label>
                            <input class="form-control" type="text" name="usrUpAdd" placeholder="Enter your new address" required pattern="[A-Za-z0-9'\.\-\s\,]">
                        </div> 
                           
                        <div class="form-group">
                                <label> User type:</label>
                                <select name="usertype">
                                    <option value="">Choose below</option>
                                    <option value="USER" required>USER</option>
                                    <option value="SELLER" required>SELLER</option>
                                    <option value="SELLER/USER" required>SELLER/USER</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="itemName">Change Password</label>
                            <input class="form-control" type="password" name="usrUpPass" placeholder="Enter new password" required pattern="[A-Za-z 0-9]+">
                        </div>


                        <input type="hidden" name="usrSess" value="<?php echo $_SESSION['USER']?>">




                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="updateAllProfDU" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--    --------------------------------------------------------------------------------->

    <div class="modal fade" id="editpicUserModal" tabindex="-1" role="dialog" aria-labelledby="editpicUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/updatesUsrProfImg.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title" id="myModalLabel">Edit Image</h4>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Choose your profile image</label>
                            <input class="form-control" type="file" name="userdditemimage" accept="image/x-png,image/image/jpeg">
                        </div>

                        <input type="hidden" name="useradditemSid" value="<?php echo $_SESSION['USER']?>">

                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="updateUsrprfleImg" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--    --------------------------------------------------------------------------->

    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/addnewitem.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add New Items</h4>

                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="itemName">Item Name</label>
                            <input class="form-control" type="text" name="additemname" placeholder="Name of Item.." required pattern="[A-Za-z 0-9]+">
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

    <!--    ---------------------------------------------------------------->
    <div class="modal fade" id="addNwcat" tabindex="-1" role="dialog" aria-labelledby="addNwcat" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/addnewcatUsr.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title" id="myModalLabel">Add New Category</h4>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Category</label>
                            <input class="form-control" type="text" name="userAddCat" required pattern="[A-Z a-z]+">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="AddNewCat" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>





    <?php include 'footer.php';?>

    <style>
        <?php include 'mystyle.css'?>

    </style>


    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

    </script>
</body>

</html>
