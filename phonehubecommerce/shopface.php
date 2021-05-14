<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>
<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">-->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>-->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->


</head>

<body>

    <div id="grad1"></div>


    <?php
  
    if(isset($_GET['recordman'])){
        if($_GET['recordman'] !== false)
        {?>


    <div class="mainmenu-area shopface">
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
                        <li><a href="" data-toggle="modal" data-target="#basicModal">
                                <span class="glyphicon glyphicon-plus-sign"></span> Add Item</a>
                        </li>
                        <li><a href="shopface.php?default"> <span class="glyphicon glyphicon-user"></span> Profile</a></li>

                    </ul>
                </div>
            </div>
        </div>

    </div>

    <!--           ---------------------------------------------------------------->

    <div class="profile-acc">
        <div class="container-fluid">
            <div class="main-body">
                <div class="shpfacecontent">
                    <div class="title-table">


                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">

                            <div class="card h-100">
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
                                
                                

                                  $item_list = AllitemsPerSupplier($conn, $_SESSION['SUPID']);
                                  foreach($item_list as $key => $value){ ?>

                                            <tr>
                                                <td><img src="img/<?php echo $value['supp_item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                                <td><?php echo $value['supp_item_name']?></td>
                                                <td><?php echo $value['cat_desc']?></td>
                                                <td><?php echo $value['supp_item_code']?></td>
                                                <td><?php echo $value['supp_item_price']?></td>
                                                <td><?php echo $value['supp_item_desc']?></td>
                                                <td><?php echo $value['supp_item_stat']?></td>
                                                <td>
                                                    <form action="includes/deleteshopitem.inc.php" method="POST">
                                                        <input type="hidden" name="delsupitem" value="<?php echo $value['supp_item_id']?>">

                                                        <button type="submit" name="subdelete" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                                    </form>

                                                </td>
                                            </tr>

                                            <?php }
                                 
                                 
                                 ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php }
        else{
            echo " ";
        }
    }
    
    ?>


    <?php
                      $disshop="";
                            if (isset($_GET['disshop'])){
                                $disshop=htmlentities($_GET['disshop']);     
                                $arr = DisplayEachShop($conn, $disshop);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>
    <div class="mainmenu-area shopface">
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
                        <li><a href="" data-toggle="modal" data-target="#basicModal">
                                <span class="glyphicon glyphicon-plus-sign"></span> Add Item</a>
                        </li>
                        <li><a href="includes/logout.inc.php"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>

                    </ul>
                </div>
            </div>
        </div>

    </div>


    <div class="profile-acc">
        <div class="container-fluid">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-1 col-xs-6">
                                    <div class="editProff">
                                        <div class="editProff">
                                            <a href="" data-toggle="modal" data-target="#editallprofile"> <i class="fa fa-plus" style="font-size:24px"></i> </a>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-9 col-xs-6">
                                    <div class="photouser d-flex flex-column align-items-center text-center">



                                        <?php if (!empty($val['supp_image'])) {?>

                                        <img src="img/<?php echo $val['supp_image']?>" alt="Admin" class="rounded-circle">

                                        <?php }

                            else {?>
                                        <img src="img/useravatar.png" alt="Admin" class="edit-your-photo">
                                        <?php

                                  }  
                                                                } ?>
                                    </div>
                                </div>

                                <div class="col-md-1 col-xs-6">
                                    <div class="editpics">
                                        <a href="" data-toggle="modal" data-target="#editpicModal"> <i class="fa fa-camera" style="font-size:24px"></i> </a>
                                    </div>


                                </div>



                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <div class="row text-center collapsible">

                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0"><span class="glyphicon glyphicon-home"></span> Shop Name</h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <span><?php echo $val['supp_name'];?></span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0"><span class="glyphicon glyphicon-user"></span> Shop's Username </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="text-secondary mb-1"><?php echo $val['supp_username']?></p>
                                    </div>
                                </div>


                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0"> <span class="glyphicon glyphicon-map-marker"></span> Address </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p><span> <?php echo $val['supp_mun']?></span>, <span> <?php echo $val['supp_prov']?> </span></p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0"><span class="glyphicon glyphicon-lock"></span> Password </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="pwd"><?php echo $val['supp_pass']?> </p>
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0"><span class="glyphicon glyphicon-user"></span> Status </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="usrstat"><?php echo $val['supp_stat']?> </p>
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>

                    </div>
                    <!--------------------------------------- details of the shop--------------------------------------->
                    <div class="col-md-9">
                        <div class="shpfacecontent">
                            <div class="title-table">
                            </div>

                            <div class="row gutters-sm">
                                <div class="col-sm-12 mb-3">

                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="scrollable-usertable">
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
                                } if (isset($_GET['disshop'])){
                                  $SUPPLIER=htmlentities($_GET['disshop']);    

                                  $item_list = AllitemsPerSupplier($conn,$SUPPLIER);
                                  foreach($item_list as $key => $value){ ?>

                                                        <tr>
                                                            <td><img src="img/<?php echo $value['supp_item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                                            <td><?php echo $value['supp_item_name']?></td>
                                                            <td><?php echo $value['cat_desc']?></td>
                                                            <td><?php echo $value['supp_item_code']?></td>
                                                            <td><?php echo $value['supp_item_price']?></td>
                                                            <td><?php echo $value['supp_item_desc']?></td>
                                                            <td><?php echo $value['supp_item_stat']?></td>
                                                            <td>

                                                                <form action="includes/deleteshopitem.inc.php" method="POST">
                                                                    <input type="hidden" name="delsupitem" value="<?php echo $value['supp_item_id']?>">

                                                                    <button type="submit" name="subdelete" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                                                </form>




                                                            </td>
                                                        </tr>
                                                        <?php }?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------------------------------------------------------------->







            <?php      } 
                              }
           
            else if (isset($_GET['default'])) {
                
                        $arr = DisplayEachShop($conn, $_SESSION['SUPID']);                         
                        
                if(!empty($arr)){
                        foreach($arr as $key => $val){  ?>

            <div class="mainmenu-area shopface">
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
                                <li><a href="" data-toggle="modal" data-target="#basicModal">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Add Item</a>
                                </li>
                                <li><a href="includes/logout.inc.php"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="profile-acc">
                <div class="container-fluid">
                    <div class="main-body">


                        <div class="row gutters-sm">
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="col-md-1 col-xs-6">
                                            <div class="editProff">
                                                <a href="" data-toggle="modal" data-target="#editallprofile"> <i class="fa fa-plus" style="font-size:24px"></i> </a>
                                            </div>
                                        </div>

                                        <div class="col-md-9 col-xs-6">
                                            <div class="photouser d-flex flex-column align-items-center text-center">



                                                <?php if (!empty($val['supp_image'])) {?>

                                                <img src="img/<?php echo $val['supp_image']?>" alt="Admin" class="rounded-circle">

                                                <?php }

                            else {?>
                                                <img src="img/useravatar.png" alt="Admin" class="edit-your-photo">
                                                <?php

                                  }  
                                                                 ?>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-xs-6">
                                            <div class="editpics">
                                                <a href="" data-toggle="modal" data-target="#editpicModal"> <i class="fa fa-camera" style="font-size:24px"></i> </a>
                                            </div>
                                        </div>



                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <div class="mt-3">
                                                <div class="row text-center collapsible">

                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="mb-0"><span class="glyphicon glyphicon-home"></span> Shop Name</h5>
                                            </div>
                                            <div class="col-sm-7 text-secondary">
                                                <span><?php echo $val['supp_name'];?></span>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="mb-0"><span class="glyphicon glyphicon-user"></span> Shop's Username </h5>
                                            </div>
                                            <div class="col-sm-7 text-secondary">
                                                <p class="text-secondary mb-1"><?php echo $val['supp_username']?></p>
                                            </div>
                                        </div>


                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="mb-0"> <span class="glyphicon glyphicon-map-marker"></span> Address </h5>
                                            </div>
                                            <div class="col-sm-7 text-secondary">
                                                <p><span> <?php echo $val['supp_mun']?></span>, <span> <?php echo $val['supp_prov']?> </span></p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="mb-0"><span class="glyphicon glyphicon-lock"></span> Password </h5>
                                            </div>
                                            <div class="col-sm-7 text-secondary">
                                                <p class="pwd"><?php echo $val['supp_pass']?> </p>
                                            </div>
                                        </div>
                                        <hr>


                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="mb-0"><span class="glyphicon glyphicon-user"></span> Status </h5>
                                            </div>
                                            <div class="col-sm-7 text-secondary">
                                                <p class="usrstat"><?php echo $val['supp_stat']?> </p>
                                            </div>
                                        </div>
                                        <hr>

                                    </div>
                                </div>

                            </div>

                            <!-----------------------------shop items----------------------------------------->
                            <div class="col-md-9">
                                <div class="shpfacecontent">
                                    <div class="title-table">
                                    </div>

                                    <div class="row gutters-sm">
                                        <div class="col-sm-12 mb-3">

                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="scrollable-usertable">
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
                                 if (isset($_GET['default'])){
                                  

                                  $item_list = AllitemsPerSupplier($conn, $_SESSION['SUPID']);
                                  foreach($item_list as $key => $value){ ?>

                                                                <tr>
                                                                    <td><img src="img/<?php echo $value['supp_item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                                                    <td><?php echo $value['supp_item_name']?></td>
                                                                    <td><?php echo $value['cat_desc']?></td>
                                                                    <td><?php echo $value['supp_item_code']?></td>
                                                                    <td><?php echo $value['supp_item_price']?></td>
                                                                    <td><?php echo $value['supp_item_desc']?></td>
                                                                    <td><?php echo $value['supp_item_stat']?></td>
                                                                    <td>
                                                                        <form action="includes/deleteshopitem.inc.php" method="POST">
                                                                            <input type="hidden" name="delsupitem" value="<?php echo $value['supp_item_id']?>">

                                                                            <button type="submit" name="subdelete" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                                                        </form>

                                                                    </td>
                                                                </tr>

                                                                <?php 
                                                                       } 
                                                                       } 
                                                                
                                                                
                                                                ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    
        else if (isset($_GET[''])){ ?>
        <div class="mainmenu-area shopface">
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
                            <li><a href="" data-toggle="modal" data-target="#basicModal">
                                    <span class="glyphicon glyphicon-plus-sign"></span> Add Item</a>
                            </li>
                            <li><a href="shopface.php?default"> <span class="glyphicon glyphicon-log-out"></span> Profile</a></li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!--               ---------------------------------end top-------------------------   -->

        <?php    }
                                                     
            ?>

    </div>



    <!--------------------------------------------------------------->

    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/suppaddnewitem.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title" id="myModalLabel">Add New Items</h4>

                    </div>

                    <div class="modal-body">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemName">Item Name</label>
                                <input class="form-control" type="text" name="suppadditemname" placeholder="Name of Item.." required pattern="[A-Za-z 0-9]+">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="iemPrice">Price</label>
                                <input class="form-control" type="text" name="suppadditemprice" placeholder="Input item price.." required pattern="[0-9]+">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="iemPrice">Itemcode</label>
                                <input class="form-control" type="text" name="suppadditemcode" placeholder="Input item code.." required pattern="[0-9]+">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Item image</label>
                                <input class="form-control" type="file" name="suppadditemimage" accept="image/x-png,image/image/jpeg">
                            </div>
                        </div>

                        <input type="hidden" name="suppadditemSid" value="<?php echo $_SESSION['SUPID']?>">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="itemCat">Category</label>
                                <select name="suppadditemcategory" class="selectadditem" required>
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
                            <textarea id="subject" name="suppadditemdesc" placeholder="Write description of the item.." style="height:200px" required></textarea>
                        </div>




                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="suppaddnewItem" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------->

    <div class="modal fade" id="editpicModal" tabindex="-1" role="dialog" aria-labelledby="editpicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/updatesProfileImg.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title" id="myModalLabel">Edit Image</h4>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Choose your profile image</label>
                            <input class="form-control" type="file" name="suppadditemimage" accept="image/x-png,image/image/jpeg">
                        </div>

                        <input type="hidden" name="suppadditemSid" value="<?php echo $_SESSION['SUPID']?>">

                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="updateprfleImg" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--    --------------------------------------------------------------->

    <div class="modal fade" id="editallprofile" tabindex="-1" role="dialog" aria-labelledby="editallprofile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="includes/suppUpdateAll.inc.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title" id="myModalLabel"> Edit Shop's Profile Details</h4>

                    </div>

                    <div class="modal-body">


                        <div class="form-group">
                            <label for="itemName">Shop Name</label>
                            <input class="form-control" type="text" name="suppsUpName" placeholder="Enter New Shop Name" required pattern="[A-Za-z 0-9]+">
                        </div>



                        <div class="form-group">
                            <label for="itemName">Shop Municipality</label>
                            <input class="form-control" type="text" name="suppsUpMun" placeholder="Enter New Shop Municipality" required pattern="[A-Za-z0-9'\.\-\s\,]">
                        </div>



                        <div class="form-group">
                            <label for="itemName">Shop Province</label>
                            <input class="form-control" type="text" name="suppsUpProv" placeholder="Enter New Shop Province" required pattern="[A-Za-z0-9'\.\-\s\,]">
                        </div>

                        <div class="form-group">
                            <label for="itemName">Change Pass</label>
                            <input class="form-control" type="password" name="suppsUpPass" placeholder="Enter New Password" required pattern="[A-Za-z 0-9]+">
                        </div>


                        <input type="hidden" name="suppSess" value="<?php echo $_SESSION['SUPID']?>">




                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="updateAllProfD" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>





    <?php include 'footer.php'?>


    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!--   para lang makita ko kung ano na piga edit sa css-->
    <style>
        <?php include "style.css"?>

    </style>
</body>

</html>
