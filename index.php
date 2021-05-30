<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Phonehub</title>

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
      $page = 'index'; include 'header.php';
    ?>
    <?php
    if(isset($_GET['error'])){
        if($_GET['error'] == "usrnameshoptaken")
        { ?>
    <div class="alert alert-danger alert-dismissible fade in text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong class="alert-text-danger"> Shop's Username is already taken</strong>
    </div>
    <?php    }
        else{
            echo " ";
        }
    } 
    
 
    ?>



    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <img src="img/h4-slide.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            iPhone <span class="primary">6 <strong>Plus</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Dual SIM</h4>
                        <a class="caption button-radius" href="shop.php?supplier_id"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="img/h4-slide2.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            by one, get one <span class="primary">50% <strong>off</strong></span>
                        </h2>
                        <h4 class="caption subtitle">school supplies & backpacks.*</h4>
                        <a class="caption button-radius" href="shop.php?supplier_id"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="img/h4-slide3.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Select Item</h4>
                        <a class="caption button-radius" href="shop.php?supplier_id"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="img/h4-slide4.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& Phone</h4>
                        <a class="caption button-radius" href="shop.php?supplier_id"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="single-promos promo3">
                        <i class="fa fa-home"></i>
                        <p><a href="shop.php?supplier_id" style="color: white"> Browse Shop</a></p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-4">
                    <div class="single-promos promo4">
                        <i class="fa fa-gift"></i>
                        <p><a href="shop.php" style="color: white"> New products</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>

                        <div class="product-carousel">
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


                            </div>
                            <?php }
             
            }
                ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->

    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">

                    <!-- -----------------------------------------------------------------------------------------------                     -->
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <?php
              if(!isset($_GET['supplier_id'])) {
                $supplist = getSuppliers($conn,'A');
                foreach($supplist as $key => $supp){ ?>
                            <ul>
                                <li>
                                    <a href="shop.php?shop_id=<?php echo $supp['supp_id'];?>"><img src="img/<?php echo $supp['supp_image']?>" alt=""></a>
                                </li>
                            </ul>


                            <?php
                     } }
                      ?>
                        </div>
                    </div>
                    <!-- --------------------------------------------------------------------------------------------------                     -->

                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">




                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">New Arrivals</h2>
                        <a href="shop.php" class="wid-view-more">View All</a>

                        <?php  if(!isset($_GET['disitem'])){
                $itemslist = DisplayEachItemBythree($conn);
                foreach($itemslist as $key => $item_code){ 


                     { ?>
                        <div class="col-md-6 col-sm-3 col-xs-3">
                            <div class="single-wid-product">
                                <img src="img/<?php echo $item_code['item_image']?>" alt="" class="product-thumb">
                                  <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_id']?>"><?php echo $item_code['item_name']?></a></h2>

                                <div class="product-wid-price">
                                    <ins><?php echo "Php. " . number_format($item_code['item_price'])?></ins>
                                </div>
                            </div>
                        </div>

                        <?php    }
                        ?>



                        <?php   } } ?>

                    </div>
                </div>


                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">New Arrivals in Shop</h2>
                        <a href="shop.php?supplier_id" class="wid-view-more">View All</a>

                        <?php  if(!isset($_GET['shpItm'])){
                $itemslist = DisplayEachItemSHOPbythree($conn);
                foreach($itemslist as $key => $item_code){ ?>
                        <div class="col-md-6 col-sm-3 col-xs-3">
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/<?php echo $item_code['supp_item_image']?>" alt="" class="product-thumb"></a>
                                <h2><a href="singleproduct.php?shpit=<?php echo $item_code['supp_item_id']?>"><?php echo $item_code['supp_item_name']?></a></h2>

                                <div class="product-wid-price">
                                    <ins><?php echo "Php. " . number_format($item_code['supp_item_price'])?></ins>
                                </div>
                            </div>
                        </div>

                        <?php    }
                           }  ?>

                    </div>
                </div>








            </div>
        </div>
    </div> <!-- End product widget area -->

    <?php
      include 'footer.php';
      ?>
    <script src="bootstrap.min.js"></script>

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

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
</body>

</html>
