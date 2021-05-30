<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Page - Phonehub</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $page = 'shop'; include 'header.php';
    ?>

    <?php
    if(isset($_GET['login'])){
        if($_GET['login'] !== false)
        {
        echo '<div class="alert alert-success alert-dismissible fade in text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong class="alert-text-success"> Successful!</strong>
</div>';
        }
        else{
            echo " ";
        }
    } 
    
 
    ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Item</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="sortingproduct">
        <div class="container">
            <nav class="navbar navbar-center bg-light">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#shopsort">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>


                    <div class="navbar-col-sort collapse in" id="shopsort">
                        <div class="container">
                            <ul class="nav navbar-nav">
                                <li><a href="shop.php">Items Uploaded</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" id="shopsort" data-toggle="dropdown" href="#">Brand Name
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                        $catList = getCategory($conn);
                                        foreach($catList as $key => $value){ ?>
                                        <li><a href="shop.php?brandname=<?php echo $value['cat_id'];?>"> <?php echo $value['cat_desc'];?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                                <li><a href="shop.php?supplier_id">Shop</a></li>

                            </ul>

                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </div>


    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <?php

             
                   $searchkey="";
                    if (isset($_GET['searchkeys'])){
                 $searchkey=htmlentities($_GET['searchkeys']);     
                      
                      $arr = searching($conn, $searchkey);                         
                           
                  if(!empty($arr)){
    
      foreach($arr as $key => $item_code){  ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/<?php echo $item_code['item_image']?>" alt="">
                        </div>
                        <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_id']?>"> <span class="glyphicon glyphicon-phone"></span> <?php echo $item_code['item_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                <?php echo number_format($item_code['item_price']) ?>
                            </ins>
                        </div>


                        <?php if(isset($_SESSION['USER'])){ ?>
                        <div class="product-option-shop">


                            <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <input type="hidden" name="itemId" value="<?php echo $item_code['item_id']?>">
                                <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                <input type="hidden" name="itemName" value="<?php echo $item_code['item_name']?>">
                                <input type="hidden" name="itemPrice" value="<?php echo $item_code['item_price']?>">
                                <input type="hidden" name="itemCode" value="<?php echo $item_code['item_code']?>">
                                <input type="hidden" name="itemImg" value="<?php echo $item_code['item_image']?>">


                                <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                            </form>



                        </div>

                        <?php    }else{?>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                        </div>

                        <?php }

                    ?>


                    </div>
                </div>
                <?php }
             
            }




              else{?>
                <h1><span class="glyphicon glyphicon-warning-sign"></span> Record not found</h1>
                <?php     }
           }
           
// ---------------------------------- searhing of items 


                else if(isset($_GET['brandname'])){
                  $CATEGORY=htmlentities($_GET['brandname']);    
                  
                  $item_list = getItemListperCategory($conn,$CATEGORY);
                  foreach($item_list as $key => $i){ ?>
                <div class="col-md-3 col-xs-6 col-sm-4 col-lg-3">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/<?php echo $i['item_image']?>" alt="">
                        </div>
                        <h2><a href="singleproduct.php?disitem=<?php echo $i['item_id']?>"> <span class="glyphicon glyphicon-phone"></span> <?php echo $i['item_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins> <span class="glyphicon glyphicon-ruble"></span>
                                <?php echo number_format($i['item_price'],2) ; ?>
                            </ins>
                        </div>


                        <?php if(isset($_SESSION['USER'])){ ?>
                        <div class="product-option-shop">


                            <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <input type="hidden" name="itemId" value="<?php echo $i['item_id']?>">
                                <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                <input type="hidden" name="itemName" value="<?php echo $i['item_name']?>">
                                <input type="hidden" name="itemPrice" value="<?php echo $i['item_price']?>">
                                <input type="hidden" name="itemCode" value="<?php echo $i['item_code']?>">
                                <input type="hidden" name="itemImg" value="<?php echo $i['item_image']?>">


                                <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                            </form>



                        </div>

                        <?php    }else{?>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                        </div>

                        <?php }

                    ?>


                    </div>
                </div>

                <?php }
                }  

// -------------------------------------------- display each item according to name

                else if(isset($_GET['supplier_id'])) {
                $supplist = getSuppliers($conn,'A');
                foreach($supplist as $key => $supp){ ?>
                <div class="col-md-3 col-xs-6 col-sm-4 col-lg-3">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/<?php echo $supp['supp_image']?>" alt="">
                        </div>
                        <h2><a href="shop.php?shop_id=<?php echo $supp['supp_id']; ?>"> <?php echo $supp['supp_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins> <span class="glyphicon glyphicon-map-marker"></span>
                                <?php echo $supp['supp_mun'] . ", " . $supp['supp_prov'] ; ?>
                            </ins>
                        </div>

                        <div class="product-option-shop">
                            <a href="shop.php?shop_id=<?php echo $supp['supp_id']; ?>" class="add_to_cart_button">Visit Shop</a>
                        </div>
                    </div>
                </div>
                <?php }
            }

  // --------------------------------------------- display each store 

            else if 
                (isset($_GET['shop_id'])){
                  $SUPPLIER=htmlentities($_GET['shop_id']);    
                  
                  $item_list = getItemListperSupplier($conn,$SUPPLIER);
                  foreach($item_list as $key => $i){ ?>
                <div class="col-md-3 col-xs-6 col-sm-4 col-lg-3">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/<?php echo $i['supp_item_image']?>" alt="">
                        </div>
                        <h2><a href="singleproduct.php?shpit=<?php echo $i['supp_item_id']?>"> <span class="glyphicon glyphicon-phone"></span> <?php echo $i['supp_item_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins> <span class="glyphicon glyphicon-ruble"></span>
                                <?php echo number_format($i['supp_item_price'],2) ; ?>
                            </ins>
                        </div>

                        <?php if(isset($_SESSION['USER'])){ ?>
                        <div class="product-option-shop">


                            <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <input type="hidden" name="itemId" value="<?php echo $i['supp_item_id']?>">
                                <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                <input type="hidden" name="itemName" value="<?php echo $i['supp_item_name']?>">
                                <input type="hidden" name="itemPrice" value="<?php echo $i['supp_item_price']?>">
                                <input type="hidden" name="itemCode" value="<?php echo $i['supp_item_code']?>">
                                <input type="hidden" name="itemImg" value="<?php echo $i['supp_item_image']?>">


                                <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                            </form>



                        </div>

                        <?php    }else{?>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                        </div>

                        <?php }

                    ?>


                    </div>
                </div>

                <?php }
                }

  // ----------------------------------------------- display items when you click the vistie button 
      
                else{
                    if(!isset($_GET['item_code'])){
                $itemslist = allitemList($conn,'A');
                foreach($itemslist as $key => $item_code){ ?>
                <div class="col-md-3 col-xs-6 col-sm-4 col-lg-3">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/<?php echo $item_code['item_image']?>" alt="">
                        </div>
                        <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_id']?>"> <span class="glyphicon glyphicon-phone"></span> <?php echo $item_code['item_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                <?php echo number_format($item_code['item_price']) ?>
                            </ins>
                        </div>

                        <?php if(isset($_SESSION['USER'])){ ?>
                        <div class="product-option-shop">


                            <form action="includes/processaddtocart.inc.php" class="cart" method="POST">
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <input type="hidden" name="itemId" value="<?php echo $item_code['item_id']?>">
                                <input type="hidden" name="itemSess" value="<?php echo $_SESSION['USER']?>">
                                <input type="hidden" name="itemName" value="<?php echo $item_code['item_name']?>">
                                <input type="hidden" name="itemPrice" value="<?php echo $item_code['item_price']?>">
                                <input type="hidden" name="itemCode" value="<?php echo $item_code['item_code']?>">
                                <input type="hidden" name="itemImg" value="<?php echo $item_code['item_image']?>">


                                <button class="add_to_cart_button" type="submit" name="addTocart">Add to cart</button>
                            </form>



                        </div>

                        <?php    }else{?>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="#popupmodal" data-toggle="modal" data-target="#popupmodal"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>

                        </div>

                        <?php }

                    ?>

                    </div>
                </div>
                <?php }
             
            }
                }?>

                <!-- -------------------------------------------------the default -->

            </div>
        </div>
    </div>


    <!--    --------------------------------- modals ---------------------------------------------------------------->

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

    <!--    ----------------------------------------------------------------------------->




    <?php
   //  include 'includes/product.inc.php';
    include 'footer.php';
    ?>



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
