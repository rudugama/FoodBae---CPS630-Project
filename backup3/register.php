<?php
include "registration.php";
?>

<!doctype html>
<html lang="en">

    <head>
        <!--HTML5 encoding -->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content="140">

        <title>FoodBAE</title>
        <link rel="shortcut icon" href="#" />
        <!--mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="FoodBAE Homepage">
        <meta name="author" content="Food, Daily Deals">

        <link rel="stylesheet" href="css/mycss.css">
        <link rel="stylesheet" href="login.css">
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

        <!--Load Bootstrap CDN-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>

    <body class="container">

        <!--Nav Bar-->
        <nav class="navbar navbar-default navbar-fixed-top container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Food&Beta;&Alpha;&Epsilon;</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Vendor Login</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn ">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!--End Nav Bar-->
        <div class="row container">

            <!--Map Side-->
            <section class="col-md-12">



                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4">
                            <h1 class="text-center login-title">Vendor Registration</h1>
                            <div class="alert alert-success"> <?= $_SESSION['message'] ?></div>
                            <div class="account-wall">
                                <img class="profile-img" src="https://68.media.tumblr.com/7e152caeef76f51b8e1921e8b2438012/tumblr_nwfs7sY5lj1twrdf3o1_1280.jpg"
                                     alt="">
                                <form class="form-signin" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off"/>
                                    <input type="text" class="form-control" placeholder="VendorName" name="username" required autofocus/>
                                    <input type="email" class="form-control" placeholder="Email" name="email" required />
                                    <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" required />
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
                                    <input type="submit" value="Register" name="register" class="btn btn-lg btn-primary btn-block"/>
                                     
                                 <a href="registration/form.php" class="text-center new-account">Create an account </a>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>




            </section>
            <!--End Side-->
        </div>
    </body>

</html>


<!-- This page uses sources from http://bootsnipp.com/snippets/featured/google-style-login -->