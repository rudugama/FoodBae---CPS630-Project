<?php session_start();if(!isset($_SESSION['username'])){   header("Location:../login.php");} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--HTML5 encoding -->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />


    <title>FoodBAE - Dashboard</title>
    <link rel="shortcut icon" href="#" />
    <!--mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FoodBAE Homepage">
    <meta name="author" content="Food, Daily Deals">

    <!--<link rel="stylesheet" href="css/mycss.css">-->
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


<body class="container" style="margin-top: 5%">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">FoodBAE Dashboard</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <p class="navbar-text">Logged in as
                        <?= $_SESSION['username'] ?>
                    </p>
                    <p class="navbar-text"> <a href="account.php">Account</a>
                    </p>

                    <p class="navbar-text"> <a href="logout.php">Log Out</a></p>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Welcome,
                    <?= $_SESSION['username'] ?>! </p>
                <div class="list-group">
                    <a href="dashboardStoreInfo.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Store Info<a>
                    <a href="dashboardDealInfo.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Deal Info<a>
                    <a href="" class="list-group-item">Feedback (Coming Soon) </a>
                    <a href="" class="list-group-item">Stats (Coming Soon)</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="text-center">Current Resources</h1>
                        <div class="row">
                            <iframe class="col-lg-12 col-md-12 col-sm-12" src="../database/select.php">
                        </iframe>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; FoodBAE 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
</body>
<script type="text/javascript">
    $('#timepicker1').timepicker();

</script>

</html>
