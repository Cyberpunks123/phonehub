<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart Page - Phonehub</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <?php
      $page = 'cart'; include 'header.php';
    ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="cart.php" method="GET">
                            <input id="searchbar" name="searchkey" type="text" placeholder="Search..">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <!-- --------------------------------------------------------------------------                     -->
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <div class="srollable">
                                <div class="scrollable-cart">


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
                                                <img src="img/<?php echo $val['item_image']?>" class="recent-thumb" alt="">
                                            </div>
                                            <h2><a href="singleproduct.php?disitem=<?php echo $val['item_id']?>"> <?php echo $val['item_name'] ; ?> </a></h2>
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
                                                <img src="img/<?php echo $item_code['item_image']?>" class="recent-thumb" alt="">
                                            </div>
                                            <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_id']?>"> <?php echo $item_code['item_name'] ; ?> </a></h2>
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

                    <!-- -------------------------------------------------------- -->
                    <!-- <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div> -->



                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <?php 
                    if(isset($_GET['add']) == "success"){ ?>
                            <div class="alert alert-success alert-dismissible fade in text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong class="alert-text-success">Item added to cart Successfully!</strong>
                            </div>

                            <?php   }


                ?>

                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>

                                <?php

                                    $cartlist = displayCartByUser($conn, $_SESSION['USER']);
                                       if(empty($cartlist)) { ?>
                                <table cellspacing="0" class="shop_table cart">

                                    <tbody>
                                        <tr>
                                            <div class="alert alert-info alert-dismissible fade in text-center">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong class="alert-text-info">Empty Cart!</strong>
                                            </div>
                                        </tr>

                                    </tbody>
                                </table>

                                <?php   }
                        
                                     $total_price = 0;
                                        foreach($cartlist as $key => $item_code){
                                     $item_price = $item_code["order_qty"]*$item_code["order_item_price"];
                                    ?>


                                <tbody>
                                    <tr class="cart_item">



                                        <td class="product-remove">


                                            <form action="includes/deleteCartItem.inc.php" method="POST">
                                                <input type="hidden" name="cartORid" value="<?php echo$item_code['order_id']?>">

                                                <button type="submit" name="Itmdelete" class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </button>
                                            </form>


                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="single-product.html"><img width="145" height="145" class="shop_thumbnail" src="img/<?php echo $item_code['order_item_image']?>"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="single-product.html"><?php echo $item_code['order_item_name']?></a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount"><?php echo "Php. " . number_format($item_code['order_item_price'])?></span>
                                        </td>

                                        <td class="product-quantity">
                                            <span class="amount"><?php echo $item_code['order_qty']?></span>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount"><?php echo "Php ". number_format($item_price,2); ?></span>
                                        </td>

                                        <?php 
                                           
                                            
                                            $total_price += ($item_code["order_item_price"]*$item_code["order_qty"]);
                                            ?>



                                        <?php    } ?>

                                    </tr>

                                </tbody>


                            </table>


                            <div class="cart-collaterals">


                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>





                                            <!--
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">£15.00</span></td>
                                            </tr>

                                           
                                           
                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>Free Shipping</td>
                                            </tr>
-->

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount"><?php echo "Php. ".number_format($total_price, 2); ?></span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                            <div class="related-products-wrapper">
                                <h2 class="related-products-title"> You may add this item to your cart</h2>





                                <div class="related-products-carousel">


                                    <!-- ------------------------------------------------------------------------------------------                               -->
                                    <?php  if(!isset($_GET['item_code'])){
                $itemslist = allitemList($conn,'A');
                foreach($itemslist as $key => $item_code){ ?>
                                    <div class="single-product">

                                        <div class="product-f-image">
                                            <img src="img/<?php echo $item_code['item_image']?>" alt="">

                                        </div>

                                        <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_id']?>"> <?php echo $item_code['item_name'] ; ?> </a></h2>

                                        <div class="product-carousel-price">
                                            <ins> <span class="glyphicon glyphicon glyphicon-ruble"></span>
                                                <?php echo number_format($item_code['item_price']) ?>
                                            </ins>
                                        </div>

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
                                    <?php }
             
            }
                ?>


                                    <!-- ----------------------------------------------------------------------------------------                               -->



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
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
