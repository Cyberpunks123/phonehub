<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">-->

    <!-- jQuery library -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

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

    <?php include 'header.php'?>
    <div class="profile-acc">
        <div class="container-fluid">
            <div class="main-body">

                <!-- Breadcrumb -->

                <!-- /Breadcrumb -->

                <div class="row gutters-sm">


                    <?php
                      $disuser="";
                            if (isset($_GET['disuser'])){
                                $disuser=htmlentities($_GET['disuser']);     
                                $arr = DisplayEachUser($conn, $disuser);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>

                    <div class="col-md-3 mb-3">
                        <div class="card">

                            <div class="card-body">

                                <div class="col-md-1 col-xs-6">
                                    <div class="editProff">
                                        <div class="editProff">
                                            <a href="" data-toggle="modal" data-target="#editallUsrprofile"> <i class="fa fa-plus" style="font-size:24px"></i> </a>
                                        </div>
                                    </div>


                                </div>


                                <div class="col-md-9 col-xs-6">
                                    <div class="photouser d-flex flex-column align-items-center text-center">


                                        <?php if (!empty($val['user_image'])) {?>

                                        <img src="img/<?php echo $val['user_image']?>" alt="Admin" class="rounded-circle">

                                        <?php }

                            else {?>
                                        <img src="img/useravatar.png" alt="Admin" class="edit-your-photo">
                                        <?php

                          }  
                                                                 }
                                
                                }?>


                                    </div>
                                </div>

                                <div class="col-md-1 col-xs-6">
                                    <div class="editpics">
                                        <a href="" data-toggle="modal" data-target="#editpicUserModal"> <i class="fa fa-camera" style="font-size:24px"></i> </a>
                                    </div>


                                </div>

                            </div>
                        </div>


                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <button class="btn btn-primary">Ordered Items</button>
                                        <button class="btn btn-primary">Posted Items</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">Full Name</h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <span><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">Username </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="text-secondary mb-1"><?php echo $val['user_name']?></p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">Gender </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="gender"> <i class="fa fa-male"></i> <?php echo $val['user_gender']?> </p>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">Address </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p><span> <?php echo $val['user_address']?></span> ,<span> <?php echo $val['user_muni']?></span>, <span> <?php echo $val['user_prov']?> </span></p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">Password </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="pwd"> <i class="fa fa-lock"></i> <?php echo $val['user_pass']?> </p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">Status </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="usrstat"> <i class="fa fa-male"></i> <?php echo $val['user_stat']?> </p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="mb-0">User Type </h5>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <p class="usrtype"> <i class="fa fa-male"></i> <?php echo $val['user_type']?> </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>




                    <!--    ------------------------------------------------------------------               -->

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
                                 if (isset($_GET['disuser'])){
                                  $SUPPLIER=htmlentities($_GET['disuser']);    

                                  $item_list = DisplayEachItemPerUser($conn,$SUPPLIER);
                                  foreach($item_list as $key => $value){ ?>

                                                        <tr>
                                                            <td><img src="img/<?php echo $value['item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                                            <td><?php echo $value['item_name']?></td>
                                                            <td><?php echo $value['cat_desc']?></td>
                                                            <td><?php echo $value['item_code']?></td>
                                                            <td><?php echo $value['item_price']?></td>
                                                            <td><?php echo $value['item_desc']?></td>
                                                            <td><?php echo $value['item_stat']?></td>
                                                            <td>

                                                                <form action="includes/deleteUsrPstItms.inc.php" method="POST">
                                                                    <input type="hidden" name="delUseritem" value="<?php echo $value['item_id']?>">

                                                                    <button type="submit" name="usrdeleteIt" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                                                </form>




                                                            </td>
                                                        </tr>
                                                        <?php } }?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>








                                    <?php  }

                      
                        else if (isset($_GET['default'])){
                                
                                $arr = DisplayEachUser($conn, $_SESSION['USER']);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>

                                    <div class="col-md-3 mb-3">
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="col-md-1 col-xs-6">
                                                    <div class="editProff">
                                                        <div class="editProff">
                                                            <a href="" data-toggle="modal" data-target="#editallUsrprofile"> <i class="fa fa-plus" style="font-size:24px"></i> </a>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="col-md-9 col-xs-6">
                                                    <div class="photouser d-flex flex-column align-items-center text-center">


                                                        <?php if (!empty($val['user_image'])) {?>

                                                        <img src="img/<?php echo $val['user_image']?>" alt="Admin" class="rounded-circle">

                                                        <?php }

                            else {?>
                                                        <img src="img/useravatar.png" alt="Admin" class="edit-your-photo">
                                                        <?php

                          }  
                                                                 }
                                
                                }?>


                                                    </div>
                                                </div>

                                                <div class="col-md-1 col-xs-6">
                                                    <div class="editpics">
                                                        <a href="" data-toggle="modal" data-target="#editpicUserModal"> <i class="fa fa-camera" style="font-size:24px"></i> </a>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>


                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <div class="mt-3">
                                                        <button class="btn btn-primary">Ordered Items</button>
                                                        <button class="btn btn-primary">Posted Items</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">Full Name</h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <span><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">Username </h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <p class="text-secondary mb-1"><?php echo $val['user_name']?></p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">Gender </h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <p class="gender"> <i class="fa fa-male"></i> <?php echo $val['user_gender']?> </p>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">Address </h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <p><span> <?php echo $val['user_address']?></span> ,<span> <?php echo $val['user_muni']?></span>, <span> <?php echo $val['user_prov']?> </span></p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">Password </h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <p class="pwd"> <i class="fa fa-lock"></i> <?php echo $val['user_pass']?> </p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">Status </h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <p class="usrstat"> <i class="fa fa-male"></i> <?php echo $val['user_stat']?> </p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h5 class="mb-0">User Type </h5>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <p class="usrtype"> <i class="fa fa-male"></i> <?php echo $val['user_type']?> </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>




                                    <!--    ------------------------------------------------------------------               -->

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
                                 if (isset($_GET['disuser'])){
                                  $SUPPLIER=htmlentities($_GET['disuser']);    

                                  $item_list = DisplayEachItemPerUser($conn,$SUPPLIER);
                                  foreach($item_list as $key => $value){ ?>

                                                                        <tr>
                                                                            <td><img src="img/<?php echo $value['item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                                                            <td><?php echo $value['item_name']?></td>
                                                                            <td><?php echo $value['cat_desc']?></td>
                                                                            <td><?php echo $value['item_code']?></td>
                                                                            <td><?php echo $value['item_price']?></td>
                                                                            <td><?php echo $value['item_desc']?></td>
                                                                            <td><?php echo $value['item_stat']?></td>
                                                                            <td>

                                                                                <form action="includes/deleteUsrPstItms.inc.php" method="POST">
                                                                                    <input type="hidden" name="delUseritem" value="<?php echo $value['item_id']?>">

                                                                                    <button type="submit" name="usrdeleteIt" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                                                                </form>




                                                                            </td>
                                                                        </tr>
                                                                        <?php } }?>


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>








                                                    <?php  }


                                  

                                     
                   else if(isset($_GET['record'])){
                        if(isset($_GET['record']) !== false){?>

                                                    <div class="profile-acc">
                                                        <div class="container">
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
                            
                                                                                              $item_list = DisplayEachItemPerUser($conn, $_SESSION['USER']);
                                                                                              foreach($item_list as $key => $value){ ?>

                                                                                            <tr>
                                                                                                <td><img src="img/<?php echo $value['item_image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                                                                                <td><?php echo $value['item_name']?></td>
                                                                                                <td><?php echo $value['cat_desc']?></td>
                                                                                                <td><?php echo $value['item_code']?></td>
                                                                                                <td><?php echo $value['item_price']?></td>
                                                                                                <td><?php echo $value['item_desc']?></td>
                                                                                                <td><?php echo $value['item_stat']?></td>
                                                                                                <td>
                                                                                                    <form action="includes/deleteUsrPstItms.inc.php" method="POST">
                                                                                                        <input type="hidden" name="delUseritem" value="<?php echo $value['item_id']?>">

                                                                                                        <button type="submit" name="usrdeleteIt" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
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


                                                    <!------------------------------------------------------------------------------to see my footer at place                               -->


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--    -----------------------------modals ------------------------------------------>

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
                                                <input class="form-control" type="text" name="usrUpFName" placeholder="Enter your new name" required pattern="[A-Za-z]+">
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="itemName"> Last Name</label>
                                                <input class="form-control" type="text" name="usrUpLName" placeholder="Enter your new last name" required pattern="[A-Za-z]+">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="itemName"> Address</label>
                                            <input class="form-control" type="text" name="usrUpAdd" placeholder="Enter your new address" required pattern="[A-Za-z0-9'\.\-\s\,]">
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="itemName">Municipality</label>
                                                <input class="form-control" type="text" name="usrUpMun" placeholder="Enter your new municipality" required pattern="[A-Za-z0-9'\.\-\s\,]">
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="itemName">Province</label>
                                                <input class="form-control" type="text" name="usrUpProv" placeholder="Enter your new province" required pattern="[A-Za-z0-9'\.\-\s\,]">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="itemName">Change Pass</label>
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

                    <!--------------------------------------------------------------------->

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
                </div>
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
</body>

</html>
