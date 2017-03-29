<!doctype html>
<?php
//Connecting to the database
$servername = "localhost";
$username = "displayOnly";
$password = "Ryerson2017";
$dbname = "foodbaee";

//create connection
$con = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($con -> connect_error){
	die ("connection failed: " . $con -> connect_error); 	
}

?>
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
        <a class="navbar-brand" href="">Food&Beta;&Alpha;&Epsilon;</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#login-modal" ><span class="glyphicon glyphicon-user"></span> Vender Login</a></li>
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

        </div><!-- /.navbar-collapse -->
    </nav>
    <!--LOGIN MODAL-->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <h1>Vender Account</h1><br>
                    <form>
                        <input type="text" name="user" placeholder="Username">
                        <input type="password" name="pass" placeholder="Password">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>
                        
                    <div class="login-help text-center">
                        <a href="registration/form.php">Register</a> - <a href="#">Forgot Password</a>
                    </div>
                    </div>
            </div>
    </div>
    <!--End Nav Bar-->
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
                <h3 class="panel-heading panel-title text-center">NEARBY DEALS OF THE DAY</h3>
                <!-- Default panel contents -->
                <div class="panel-heading panel-info">
                    <h4 class="text-center"> Name 1</h4>
                    <div class="panel-body">
                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item">ITS LIT BRO</li>
                            <li class="list-group-item">NUGGETS HERE</li>
                        </ul>
                    </div>
                </div>
                <div class="panel-heading panel-info">
                    <h4 class="text-center"> Name 2</h4>
                    <div class="panel-body">
                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item">ITS LIT BRO</li>
                            <li class="list-group-item">NUGGETS HERE</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End Side-->
        <?php
        // $sql = "SELECT * FROM `deals`";

        // $result = $con ->query($sql);

        // if ($result-> num_rows){

        // echo "<table><tr><th>Deal ID</th><th>Restaurant</th><th>Day</th><th>Date</th><th>Description</th></tr>";
        // while($row = $result -> fetch_assoc())
        // {
        //     extract($row);
        //     $fetch_array[] = $row;
        //     echo"<tr><td>" . $deal_id . "</td><td>" . $row["place_id"] . "</td><td>" . $row["day"] . "</td><td>" . $row["date"] . "</td><td>" . $row["deal_name"] . "</td></tr>";
        // }
        // echo "<pre>";
        // print_r($fetch_array);
        // echo "</pre>";	
        
        // foreach($fetch_array as $field)
        // {
        // foreach($field as $fiel => $val)
        // echo "Field: " . $fiel . " -> Value: " . $val . "<br>";    
        // }
        // echo"</table>";
        // echo "Hello. Today is ". date("Y-m-d") . ". Today's deal is: ..." . $fetch_array[0]['deal_name'];

        // }else{
        //     echo"0 results";
        // }

        ?>
    </div>
    <script src="js/scripts.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwGeuImGWUoz8UApDG0afCYt89UQfB9Q&callback=initMap"></script>  
</body>
</html>