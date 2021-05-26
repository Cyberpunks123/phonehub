<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Page - Phonehub</title>

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

</head>

<body>
    <?php
    $page = 'checkout'; include 'header.php';
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
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">


                           <?php 
                    if(isset($_GET['chckout']) == "success"){ ?>
                <div class="alert alert-success alert-dismissible fade in text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong class="alert-text-success">Checkout Successful!</strong>
                </div>

             <?php   }


                ?>


                <div class="chkoutdetatils">
                    <table cellspacing="0" class="shop_table cart">
                        <thead>
                            <tr>
                                <th class="product-remove">Order Id</th>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-subtotal">Product Status</th>
                            </tr>
                        </thead>

                        <?php

                                    $cartlist = displayCartByUser($conn, $_SESSION['USER']);
                                        
                                     $total_price = 0;
                                        foreach($cartlist as $key => $item_code){
                                     $item_price = $item_code["order_qty"]*$item_code["order_item_price"];
                                    ?>


                        <tbody>
                            <tr class="cart_item">

                                <td class="product-name">
                                    <h4><?php echo $item_code['order_id']?></h4>
                                </td>



                                <td class="product-thumbnail">
                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $item_code['order_item_image']?>">
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
                                        
                                        
                                        
                                <td class="product-subtotal">
                          
                                    <h4> Pending Order</h4>
                                     </td>

                                <?php 
                                           
                                            
                                            $total_price += ($item_code["order_item_price"]*$item_code["order_qty"]);
                                            



                                    }
                                
                                 if (isset($_GET['chckout']) == "success"){ 
                                
                                 $cartlist = displayCartByUserOP($conn, $_SESSION['USER']);
                                        
                                     $total_price = 0;
                                        foreach($cartlist as $key => $item_code){
                                     $item_price = $item_code["order_qty"]*$item_code["order_item_price"];
                                    ?>


                        
                            <tr class="cart_item">

                                <td class="product-name">
                                    <h4><?php echo $item_code['order_id']?></h4>
                                </td>



                                <td class="product-thumbnail">
                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $item_code['order_item_image']?>">
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
                                        
                                        
                                        
                                <td class="product-subtotal">
                            <?php 
                                if(isset($_GET['chckout']) == "success"){ ?>
                                                                   
                                    <h4>Waiting to recieve</h4>
                               
                                    
                                <?php }
                                    else{ ?>
                                        <h4> Pending Order</h4>
                                <?php    }
                                
                                ?>
                                     </td>

                                <?php 
                                           
                                            
                                            $total_price += ($item_code["order_item_price"]*$item_code["order_qty"]);
                                            ?>



                                <?php    }
                                
                                } ?>

               
               
               
               


                            </tr>

                        </tbody>


                    </table>
                </div>

                <div class="cart-collaterals">


                    <div class="cart_totals ">
                        <h2>Total Amount of items</h2>

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
                        <br>
                        <a href="#paynowMod" data-toggle="modal" data-target="#paynowMod"><button type="button" class="btn btn-primary">Pay now</button></a>
                    </div>

                </div>




            </div>
        </div>
    </div>



    <!-------------------------modals------------------------------------------->
    <div class="modal fade" id="paynowMod" tabindex="-1" role="dialog" aria-labelledby="paynowMod" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 mt-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Payment Details
                                    </h3>

                                </div>
                                <form action="includes/updateCrtStat.inc.php" method="POST">

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label for="usrNme">Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="usrNme" placeholder="Account Username" required pattern="[@a-zA-Z0-9]+" />
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cvCode">Password</label>
                                            <input type="password" class="form-control" name="passW" placeholder="" required />
                                        </div>

                                        <input type="hidden" name="cartStat" value="<?php echo $item_code['order_status']?>">
                                        <input type="hidden" name="netAmt" value="<?php echo $item_price?>">


                                    </div>


                                    <div class="panel-footer">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><strong><span class="amount"><?php echo "Php. ".number_format($total_price, 2); ?></span></strong></span> Final Payment</a>
                                            </li>
                                        </ul>

                                        <br />


                                        <button type="submit" name="checkout" class="btn btn-success btn-lg btn-block">Process Payment</button>

                                        <br>
                                    </div>
                                </form>


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
