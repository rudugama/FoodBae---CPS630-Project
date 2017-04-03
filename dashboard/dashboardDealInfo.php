<?php session_start();if(!isset($_SESSION['username'])){   header("Location:../login.php");} 
include "dealsAssistant.php";
include "parserV1.php";
$vendor_id = $mysqli->real_escape_string($_SESSION['vendor_id']);
$query = "SELECT * FROM deals WHERE vendor_id='$vendor_id' ORDER BY deal_id";
$result= mysqli_query($mysqli, $query); 

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

        <!--Load Bootstrap CDN-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!--Load custom css-->
        <link rel="stylesheet" href="../css/customCSS.css">
    </head>

    </head>


<body>

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
                <a class="navbar-brand" href="dashboard.php"><img src="../img/FOODBAE.png" width="130"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Contact Admin</a>
                    </li>
                    <li class="dropdown">
                        <a href="" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
                            <span class="caret"></span>
                            <ul class="dropdown-menu">
                                <li>
                                    <a>Logged in as
                                        <?= $_SESSION['username'] ?>
                                    </a>
                                </li>
                                <li>
                                    <a>Vendor ID#:
                                        <?= $_SESSION['vendor_id'] ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="account.php">Account</a>
                                </li>
                                <li>
                                    <a href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </a>



                    </li>

                </ul>
                </ul>
        </div>
        <!-- /.navbar-collapse -->
        </div>
    <!-- /.container -->
    </nav>


<!-- Page Content -->
<div class="container pageContent">

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
                                    <div align="right">  
                                    </div>  
                                    <br />  
                                    <div id="deal_table" class="panel-body table-responsive">  
                                        <table class="table table-hover table-striped table-users">
                                            <thead>
                                                <tr class="success">
                                                    <th>Deal Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Weekday</th>
                                                    <th>State</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <?php

                                            while($row = mysqli_fetch_array($result))  
                                            {
                                                $day = weekDay($row["day"]);
                                                $active = activeStat($row["isActive"]);
                                            ?>  
                                            <tr>  
                                                <td><?php echo $row["deal_name"]; ?></td>
                                                <td><?php echo $row["deal_desc"]; ?></td>
                                                <td><?php echo $row["price"]; ?></td>
                                                <td><?php echo $day; ?></td>
                                                <td><?php echo $active; ?></td>  
                                                <td><input type="button" name="edit" value="Edit" id="<?php echo $row["deal_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                            </tr>  
                                            <?php  
                                            }  
                                            ?>  
                                        </table>  
                                    </div> 

                                </div>
                                <hr>

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

                    </html>
                <div id="dataModal" class="modal fade">  
                    <div class="modal-dialog">  
                        <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h4 class="modal-title">Deal Details</h4>  
                            </div>  
                            <div class="modal-body" id="deal_detail">  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
                <div id="add_data_Modal" class="modal fade">  
                    <div class="modal-dialog">  
                        <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h4 class="modal-title">Add/Edit Deal</h4>  
                            </div>  
                            <div class="modal-body">  
                                <form method="post" id="insert_form">  
                                    <label>Enter Deal Name</label>  
                                    <input type="text" class="form-control" id="deal_name" name="deal_name" placeholder="Deal Name" required autofocus /> 
                                    <br />  
                                    <label>Enter Deal Description</label>  
                                    <input type="text" class="form-control" id="deal_desc" name="deal_desc" placeholder="Deal Description" required="">  
                                    <br />  
                                    <label>Deal Price</label>  
                                    <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Price" required="">
                                    <br />  
                                    <label>Day of Week</label>  
                                    <select class="form-control" id="day" name="day">
                                        <option selected="">Week Day</option>
                                        <option value="1">Monday</option>
                                        <option value="2">Tuesday</option>
                                        <option value="3">Wednesday</option>
                                        <option value="4">Thursday</option>
                                        <option value="5">Friday</option>
                                        <option value="6">Saturday</option>
                                        <option value="7">Sunday</option>
                                    </select>  
                                    <br />  
                                    <select class="form-control" id="active_deal" name="active_deal">
                                        <option selected="">Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option> 
                                    </select>  
                                    <br />  
                                    <input type="hidden" name="deal_id" id="deal_id" value="<?php echo $row["deal_id"]; ?>" />  
                                    <input type="hidden" name="vendor_id" id="vendor_id" value="<?= $_SESSION['vendor_id'] ?>" />  
                                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  

                                </form>  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
                <script src="dealsInfoScript.js"></script>