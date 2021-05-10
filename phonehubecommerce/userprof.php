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
            <div class="col-md-3 mb-3">
              <div class="card">
                <div class="card-body">
                 
                 <div class="col-md-10 col-xs-6">
                           <div class="photouser d-flex flex-column align-items-center text-center">
                   
                      <?php
                      $disuser="";
                            if (isset($_GET['disuser'])){
                                $disuser=htmlentities($_GET['disuser']);     
                                $arr = DisplayEachUser($conn, $disuser);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>
                                    
                      <?php if (!empty($val['user_image'])) {?>

                    <img src="img/<?php echo $val['user_image']?>" alt="Admin" class="rounded-circle">
                    
                     <?php }

                            else {?>
                                <img src="img/useravatar.png" alt="Admin" class="edit-your-photo">
                            <?php

                          }  }
                                } }?>

                  </div>
                 </div>
        
                   <div class="col-md-1 col-xs-6">
                    <div class="editpics">
                         <i class="fa fa-camera" style="font-size:24px"></i>
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
            
            
            <div class="col-md-9">
            
              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                 <div class="title-table">
                     <h2>Items Posted / Ordered items ......</h2>
                 </div>
                  <div class="card h-100">
                   
<!--    ------------------------------------------------------------------               -->
                   
                    <div class="card-body">
                    <div class="scrollable-usertable">
                    <table class="table table-striped showtable" style="width:100%">
							<thead>
								<tr>
									<th>Image</th>
									<th>Item Name</th>
									<th>Category</th>
									<th>Item Code</th>
									<th>Price</th>
									<th>Description</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Garrett Winters</td>
									<td>Good Guys</td>
									<td>garrett@winters.com</td>
									<td>Good Guys</td>
									<td>garrett@winters.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Ashton Cox</td>
									<td>Levitz Furniture</td>
									<td>ashton@cox.com</td>
									<td>Levitz Furniture</td>
									<td>ashton@cox.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Sonya Frost</td>
									<td>Child World</td>
									<td>sonya@frost.com</td>
									<td>Child World</td>
									<td>sonya@frost.com</td>
									<td><span class="badge bg-danger">Deleted</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Jena Gaines</td>
									<td>Helping Hand</td>
									<td>jena@gaines.com</td>
									<td>Helping Hand</td>
									<td>jena@gaines.com</td>
									<td><span class="badge bg-warning">Inactive</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Charde Marshall</td>
									<td>Price Savers</td>
									<td>charde@marshall.com</td>
									<td>Price Savers</td>
									<td>charde@marshall.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								
							</tbody>
						</table>
                        </div>
                        </div>
                        
<!--    ------------------------------------------------------------                -->
                    
                    
                    </div>
                    
                    
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