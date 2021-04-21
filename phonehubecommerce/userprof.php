<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Userprofile - Phonehub</title>
   
    <link rel="stylesheet" href="style.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>

    <!-- dipa po tapos ito sir -->

    <?php
    include 'header.php';
    ?>
    <div class="accounts-profile">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-3">
                    <div class="userProfileInfo">
                        <div class="image text-center">
                            <img src="img/useravatar.png" alt="#" class="img-responsive">
                            <a href="#" title="#" class="editImage">
                                <i class="fa fa-camera"></i>
                            </a>
                        </div>

                        <div class="box">
                            <div class="name"><strong>Jhun Paul
                                    <span class="lname">Moratalla </span></strong></div>

                            <div class="info">
                                <div class="usrname">
                                    <span><i class="fa fa-fw fa-list-alt"></i> <a href="#" title="#">@jpmoratalla</a></span>
                                </div>
                                <hr>
                                <div class="more-info">
                                    <div class="address">
                                        <span>
                                            <i class="fa fa-address-card"></i><span class="street"> Purok 5 San Pascual, Nale</span>
                                            <span class="muni"> Oas</span>
                                            <span class="prov">Albay</span>
                                            <hr>

                                            <span id="dots">...</span>
                                        </span>
                                    </div>


                                    <span id="more">
                                        <p class="gender"> <i class="fa fa-male"></i> Male </p>
                                        <hr>
                                        <p class="pwd"> <i class="fa fa-lock"></i> Password </p>
                                        <hr>
                                        <p class="usrstat"> <i class="fa fa-male"></i> Active </p>
                                        <hr>
                                        <p class="usrtype"> <i class="fa fa-male"></i> Both </p>
                                        <hr>
                                    </span>
                                    <button onclick="myFunction()" id="myBtn">Read more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-8 col-lg-9">
                    <div class="box">
                        <h2 class="boxTitle"> User Profile</h2>
                        <!-- Tabs -->
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Order History</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Posted items</a></li>
                                        </ul>
                                        
                                    <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <div class="container bootdey">
                                    <div class="panel panel-default panel-order">
                                        <div class="panel-heading">
                                          
                                            <div class="btn-group pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Filter history <i class="fa fa-filter"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#">Approved orders</a></li>
                                                        <li><a href="#">Pending orders</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail" /></div>
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pull-right"><label class="label label-danger">rejected</label></div>
                                                            <span><strong>Order name</strong></span> <span class="label label-info">group name</span><br />
                                                            Quantity : 2, cost: $323.13 <br />
                                                            <a data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>
                                                            <a data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="#" title="Danger"></a>
                                                            <a data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a>
                                                        </div>
                                                        <div class="col-md-12">order made on: 05/31/2014 by <a href="#">Jane Doe </a></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_1.jpg" class="media-object img-thumbnail" /></div>
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pull-right"><label class="label label-info">pending</label></div>
                                                            <span><strong>Order name</strong></span> <span class="label label-info">group name</span><br />
                                                            Quantity : 12, cost: $12623.13<br />
                                                            <a data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>
                                                            <a data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="#" title="Danger"></a>
                                                            <a data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a>
                                                        </div>
                                                        <div class="col-md-12">order made on: 06/12/2014 by <a href="#">Jane Doe </a></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail" /></div>
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pull-right"><label class="label label-success">Approved</label></div>
                                                            <span><strong>Order name</strong></span> <span class="label label-info">group name</span><br />
                                                            Quantity : 4, cost: $523.13<br />
                                                            <a data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>
                                                            <a data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="#" title="Danger"></a>
                                                            <a data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a>
                                                        </div>
                                                        <div class="col-md-12">order made on: 06/20/2014 by <a href="#">Jane Doe</a></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_2.jpg" class="media-object img-thumbnail" /></div>
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pull-right"><label class="label label-info">pending</label></div>
                                                            <span><strong>Order name</strong></span> <span class="label label-info">group name</span><br />
                                                            Quantity : 4, cost: $523.13<br />
                                                            <a data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>
                                                            <a data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="#" title="Danger"></a>
                                                            <a data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a>
                                                        </div>
                                                        <div class="col-md-12">order made on: 06/20/2014 by <a href="#">Jane Doe</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }

    </script>

</body>

</html>
