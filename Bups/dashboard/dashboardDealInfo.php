<?php session_start();if(!isset($_SESSION['username'])){   header("Location:../login.php");} 
include "dealsAssistant.php";
?>


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


<body onload="viewData()" class="container" style="margin-top: 5%">

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
                    <li>
                        <p class="navbar-text">Logged in as
                            <?= $_SESSION['username'] ?>
                        </p>
                    </li>
                    <li>
                        <p class="navbar-text">Vendor ID#:
                            <?= $_SESSION['vendor_id'] ?>
                        </p>
                    </li>
                    </li>
                    <li>
                        <p class="navbar-text"><a href="account.php">Account</a>
                        </p>
                    </li>
                    <li>
                        <p class="navbar-text"> <a href="logout.php">Log Out</a></p>
                    </li>
                </ul>
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
                    <a href="dashboardStoreInfo.php" class="list-group-item "><span class="glyphicon glyphicon-pencil"></span> Store Info<a>                    <a href="dashboardDealInfo.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil"></span> Deal Info<a>					
                    <a href="" class="list-group-item">Feedback (Coming Soon) </a>
                    <a href="" class="list-group-item">Stats (Coming Soon)</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <h3 class="text-center">Add a new deal</h3>
                    <hr>
                    <div class="panel-body">

                        <form id="myForm" action="dashboardDealInfo.php" method="post" enctype="multipart/form-data" autocomplete="off" class="form-group">
                            <!--DEAL NAME-->
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="dealName" name="dealName" placeholder="Deal Name" required autofocus/>
                            </div>
                            <!--DEAL DESCRIPTION-->
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="desc" name="desc" placeholder="Deal Description" required/>
                            </div>
                            <!--PRICE-->
                            <div class="col-md-2">
                                <input type="number" step="any" class="form-control" id="dealPrice" name="dealPrice" placeholder="Price" required/>
                            </div>
                            <!--DROP DOWN MENU FOR WEEKDAY-->
                            <div class="col-md-3">
                                <select class="form-control" id="daySelect" name="day">
                                <option selected>Week Day</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select>
                            </div>

                            <!--CHECKBOX TO LET USER ACTIVATE DEAL RIGHT AWAY-->
                            <div class="col-md-12 text-center">
                                <label class="checkbox-inline text-center ">
                                <br/>
                                <input name="active_deal" id="active_deal" value="0" type="hidden" />
                                <input name="active_deal" id="active_deal" type="checkbox" value="1"/>Activate
                            </label>
                            </div>

                            <!--HIDDEN INPUT FIELD TO PASS VENDOR ID TO BACKEND PROCESSOR THEN TO SQL TABLE-->
                            <input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo $_SESSION['vendor_id']; ?>" />

                            <div class="col-md-12 text-center">
                                <br/>
                                <input type="submit" value="Add Deal" class="btn btn-primary" />
                            </div>

                        </form>
                        <!--End of Form-->
                        
                        
                    <div class="panel-body table-responsive">
                        <h3 class="text-center">Current Deals on the Database</h3>
                        <?php
                        include "currentDeals.php";
                        ?>
                    </div>
                    <hr>
                    
                    
                    <!-- SEMIRS TABLE.. WILL USE WHEN CAN.
                    <div class="panel-body table-responsive">
                        <h3 class="text-center">Current Deals on the Database</h3>
                        <table class="table table-hover table-striped table-users">
                            <thead>
                                <tr class="success">
                                    <th>Deal Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Weekday</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Some</td>
                                    <td>$$$</td>
                                    <td>Weekday</td>
                                    <td>Either Active or non</td>
                                    <th><a class="btn mini btn-primary">Edit</a></th>
                                    <th><a class="btn mini btn-primary">Delete</a></th>
                                </tr>
                            </tbody>
                        </table>
                        -->
                        <!-- PAGINATION... FIGURE IT OUT..
                            <div class="text-center">
                                <ul class="pagination center">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                            </div>
                        
                        -->

                    </div>

                    <!--Test

                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Mail
                                        </th>
                                        <th class="text-center">
                                            Mobile
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <input type="text" name='name0' placeholder='Name' class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name='mail0' placeholder='Mail' class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name='mobile0' placeholder='Mobile' class="form-control" />
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
                    <!--end of panel-body-->
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
        <script src="../js/dealForm.js"></script>
  
</body>

</html>