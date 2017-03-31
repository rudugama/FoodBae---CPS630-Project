<?echo "<br><br>";?>
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
                    <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Vender Login</a></li>
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
        <!--LOGIN MODAL Gonna disable this feature for now
        
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <h1>Vender Account</h1><br>
<form id="login_form" method = "POST" action = 'bae.php'>
                        <input type="text" id = 'asd' name="user" placeholder="Username">
                        <input type="password" name="pass" placeholder="Password">
                        <input type="submit" id = 'submit' value="Login">
</form>
                        <div class="login-help text-center">
                            <a href="registration/form.php">Register</a> - <a href="#">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
         -->
        <!--End Nav Bar-->

        
<!-------------------------------------------------------------------------------------------------------------START PHPSCRIPT---------------------------------------------------------------------------------------------------------------------------->
	<?php
	$servername = "localhost";
	$username = "rudugama";
	$password = "Stingray#3";
	$dbname = "foodbaee";

	//create connection
	$con = new mysqli($servername, $username, $password, $dbname);

	//check connection
	if ($con->connect_error){ 
	die ("connection failed: " . $con -> connect_error); }

	 $sql = "SELECT id,name,address,lat,lng, ( 6371 * acos( cos( radians(43.6542599) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(-79.3606359) ) + sin( radians(43.6542599) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 25 ORDER BY distance LIMIT 0 , 20";
    date_default_timezone_set('America/Toronto');
    $current_day = date(w);
    $deal_res = $con->query($query = "SELECT `deal_name`,`price`
                                        FROM deals
                                       WHERE day = $current_day");

    while($deal_obj = $deal_res->fetch_obj)
    {
        $deal_name[] = $deal_obj->deal_name;
        $price[] = $deal_obj->price;
    }                            	
	$result = $con ->query($sql);
	
	$rowcount=mysqli_num_rows($result);				
	
	//check if there are no empty rows
	if ($result-> num_rows){
		
	//fetch loop for all elements from table into an array
	while($row = $result -> fetch_assoc())
	{
		extract($row);
	    	$fetch_array[] = $row;
	}
	
	}else{
	echo"0 results";
	}
	
	//close connection
	$con -> close();
	?>
<!------------------------------------------------------FINISH PHPSCRIPT-------------------------------------------->	

        <div class="row container">

            <!--Map Side-->
            <section class="col-md-8">
                <div class="panel panel-default" id="map">
                </div>
            </section>
            <!--End of Map-->
            <!--Side-->
            <section class="col-md-4">
                <div class="panel panel-default">
                    <h3 class="panel-heading panel-title text-center">NEARBY DEALS</h3>
                    <!-- Default panel contents -->
                    <div class="panel-heading panel-info">
                        <div class="panel-body">
                            <!-- List group -->
                            <ul class="list-group">
                            <?php
                            	foreach($fetch_array as $field){
                                   $lat = $field['lat'];
                                   $lng = $field['lng'];
                                   $name = $field['name'];
                            	echo "<li class=\"list-group-item\" lat = $lat lng = $lng table_name = $name><a id = 'modal_id'  href=#> " . $field['name'] . "</a></li>";   
                                }          ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Side-->         
        </div>

      <!-- Modal -->
        <div class="modal fade" id="popup" role="dialog">
            <div class="modal-dialog">
           
                <!-- Modal content -->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id = "desc"></h4> Restraunt
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-8">Deal 1</div>
                    <div class="col-md-4">Price</div>
                    </div>    
                    <div class="">Description</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default"><img src="img/navi.png" width="20"/></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
           
            </div>
       
        </div>
  
        
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
        <script src="js/scripts.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwGeuImGWUoz8UApDG0afCYt89UQfB9Q&callback=initMap"></script>
        
 	       
        
    </body>

</html>
