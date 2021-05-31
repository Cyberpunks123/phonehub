<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Single Product - Phonehub</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <?php
    $page = 'singleproduct'; include 'header.php';
    ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="singleproduct.php" method="GET">
                            <input id="searchbar" name="searchkey" type="text" placeholder="Search..">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <!--                    ----------------------------------------------->

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <div class="scrollable">


                                <?php 
                       $searchkey="";
                    if (isset($_GET['searchkey'])){
                 $searchkey=htmlentities($_GET['searchkey']);     
                      
                      $arr = searching($conn, $searchkey);                         
                           
                  if(!empty($arr)){
    
      foreach($arr as $key => $val){  ?>


                                <div class="col-md-12 col-sm-12">
                                    <div class="single-shop-product">
                                        <div class="product-single">
                                            <img src="img/<?php echo $val['item_image'];?>" class="recent-thumb" alt="">
                                        </div>
                                        <h2><a href="singleproduct.php?disitem=<?php echo $val['item_id'];?>"> <?php echo $val['item_name'] ; ?> </a></h2>
                                        <div class="product-carousel-price">
                                            <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                                <?php echo number_format($val['item_price']) ?>
                                            </ins>
                                        </div>

                                    </div>
                                </div>

                                <?php
   }
   }
             else{?>
                                <h2><span class="glyphicon glyphicon-warning-sign"></span> Record not found</h2>
                                <?php     }
   }
             else if (!isset($_GET['item_code'])){
                $itemslist = allitemList($conn,'A');
                foreach($itemslist as $key => $item_code){ ?>
                                <div class="col-md-12 col-sm-12">
                                    <div class="single-shop-product">
                                        <div class="product-single">
                                            <img src="img/<?php echo $item_code['item_image'];?>" class="recent-thumb" alt="">
                                        </div>
                                        <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_id'];?>"> <?php echo $item_code['item_name'] ; ?> </a></h2>
                                        <div class="product-carousel-price">
                                            <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                                <?php echo number_format($item_code['item_price']) ?>
                                            </ins>
                                        </div>

                                    </div>
                                </div>

                                <?php }
                }
   ?>
                            </div>
                        </div>
                    </div>










                </div>
                <!-- end of the side-bar -->


                <!-- ------------------------content area------------------------------------------------ -->

                <div class="col-md-8 col-sm-8">
                    <div class="product-content-right">
                        <div class="row">

                            <?php $disitem="";
                            if (isset($_GET['disitem'])){
                                $disitem=htmlentities($_GET['disitem']);     
                                $arr = DisplayEachItem($conn, $disitem);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>



                            <div class="product-images">
                                <div class="product-main-img" align="center">
                                    <img src="img/<?php echo $val['item_image'];?>" alt="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="product-inner">


                                    <h2 class="product-name"> <?php echo $val['item_name'] ; ?> </h2>

                                    <div class="product-inner-price">
                                        <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                            <?php echo number_format($val['item_price']) ?>
                                        </ins>
                                    </div>


                                    <?php if(isset($_SESSION['USER'])){ ?>
                                    <div class="product-option-shop">


                                        <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            </div>
                                            <input type="hidden" name="itemIds" value="">
                                            <input type="hidden" name="itemId" value="<?php echo $val['item_id']?>">
                                            <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                            <input type="hidden" name="itemName" value="<?php echo $val['item_name']?>">
                                            <input type="hidden" name="itemPrice" value="<?php echo $val['item_price']?>">
                                            <input type="hidden" name="itemCode" value="<?php echo $val['item_code']?>">
                                            <input type="hidden" name="itemImg" value="<?php echo $val['item_image']?>">


                                            <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                                        </form>



                                    </div>

                                    <?php    }else{?>
                                    <div class="product-option-shop">
                                        <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                                    </div>

                                    <?php }

                    ?>

                                    <div class="product-inner-category">
                                        <p>Category: <a href="shop.php?brandname=<?php echo $val['cat_id'];?>"><?php echo $val['cat_desc'];?></a>
                                        </p>
                                    </div>




                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="product-inner">
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>

                                                <p> <?php echo $val['item_desc'];?> </p>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>

                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>



                            <?php  }
                                                }
                                                } 
                      
                            
                             $shpit="";
                         if (isset($_GET['shpit'])){
                                $shpit=htmlentities($_GET['shpit']);     
                                $arr = EachofShopItems($conn, $shpit);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>



                            <div class="product-images">
                                <div class="product-main-img" align="center">
                                    <img src="img/<?php echo $val['supp_item_image'];?>" alt="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">


                                    <h2 class="product-name"> <?php echo $val['supp_item_name'] ; ?> </h2>

                                    <div class="product-inner-price">
                                        <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                            <?php echo number_format($val['supp_item_price']) ?>
                                        </ins>
                                    </div>


                                    <?php if(isset($_SESSION['USER'])){ ?>
                                    <div class="product-option-shop">


                                        <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            </div>
                                            <input type="hidden" name="itemId" value="">
                                            <input type="hidden" name="itemIds" value="<?php echo $val['supp_item_id']?>">
                                            <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                            <input type="hidden" name="itemName" value="<?php echo $val['supp_item_name']?>">
                                            <input type="hidden" name="itemPrice" value="<?php echo $val['supp_item_price']?>">
                                            <input type="hidden" name="itemCode" value="<?php echo $val['supp_item_code']?>">
                                            <input type="hidden" name="itemImg" value="<?php echo $val['supp_item_image']?>">


                                            <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                                        </form>



                                    </div>

                                    <?php    }else{?>
                                    <div class="product-option-shop">
                                        <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                                    </div>

                                    <?php }

                    ?>

                                    <div class="product-inner-category">
                                        <p>Category: <a href="shop.php?brandname=<?php echo $val['cat_id'];?>"><?php echo $val['cat_desc'];?></a>

                                            <br>
                                            Shop: <a href="shop.php?shop_id=<?php echo $val['supp_id'] ; ?>"><?php echo $val['supp_name'];?></a>
                                        </p>
                                    </div>




                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>

                                                <p> <?php echo $val['supp_item_desc'];?> </p>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>

                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>



                            <?php  }
                                                }
                                                }
//                            -------------------------------------------- elsse part
                                else{ 
                                
                                 $disitem="X";
                            if (!isset($_GET['disitem'])){
                                $arr = DisplayEachItem($conn, $disitem);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>

                            <div class="product-images">
                                <div class="product-main-img" align="center">
                                    <img src="img/<?php echo $val['item_image'];?>" alt="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">

                                    <h2 class="product-name"> <?php echo $val['item_name'] ; ?> </h2>

                                    <div class="product-inner-price">
                                        <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                            <?php echo number_format($val['item_price']) ?>
                                        </ins>
                                    </div>


                                    <?php if(isset($_SESSION['USER'])){ ?>
                                    <div class="product-option-shop">


                                        <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            </div>
                                            <input type="hidden" name="itemId" value="<?php echo $val['item_id']?>">
                                            <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                            <input type="hidden" name="itemName" value="<?php echo $val['item_name']?>">
                                            <input type="hidden" name="itemPrice" value="<?php echo $val['item_price']?>">
                                            <input type="hidden" name="itemCode" value="<?php echo $val['item_code']?>">
                                            <input type="hidden" name="itemImg" value="<?php echo $val['item_image']?>">


                                            <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                                        </form>



                                    </div>

                                    <?php    }else{?>
                                    <div class="product-option-shop">
                                        <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                                    </div>

                                    <?php }

                    ?>

                                    <div class="product-inner-category">
                                        <p>Category: <a href="shop.php?brandname=<?php echo $val['cat_id'];?>"><?php echo $val['cat_desc'];?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                        <div class="product-inner">
                                            <div role="tabpanel">
                                                <ul class="product-tab" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                        <h2>Product Description</h2>

                                                        <p> <?php echo $val['item_desc'];?> </p>
                                                    </div>

                                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                                        <h2>Reviews</h2>
                                                        <div class="submit-review">
                                                            <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                            <p><label for="email">Email</label> <input name="email" type="email"></p>

                                                            <div class="rating-chooser">
                                                                <p>Your rating</p>

                                                                <div class="rating-wrap-post">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                            <p><input type="submit" value="Submit"></p>
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
                                
                          }?>
                        </div>
                    </div>
                </div>

                <!-- ------------------------ end of the image part  ------------------------------------------------- -->









            </div>
        </div>
    </div>



    <?php
    include 'footer.php';
    ?>


    <!-- -------------------------------------------------------------------- -->


    <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="popupmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title" id="myModalLabel"></h4>

                </div>
                <div class="modal-body">

                    <div class="alert alert-danger">
                        <strong>Ooooppps! Invalid action.</strong> You must create an account first or log in .. <br> <br>

                        <a href="signup.php">
                            <h4>Create an account.</h4>
                        </a>

                    </div>





                </div>

                <div class="modal-footer">
                    <div class="col-md-6"></div>
                    <a href="accnt.php"> <button class='btn btn-primary btn'> Log in </button></a>
                </div>


            </div>
        </div>
    </div>







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
