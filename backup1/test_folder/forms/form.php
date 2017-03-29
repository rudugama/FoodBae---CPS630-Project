<?php
session_start();
$_SESSION['message'] = '';


$mysqli = new mysqli('localhost', 'root', '', 'accounts');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //If the passwords equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']){

        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); // md5 hashed password.. maybe use SHA52..


        //Inserting into database....

        $_SESSION['username'] = $username;


        //create SQL query string for inserting data into the database
        $sql = "INSERT INTO users (username, email, password) "
            . "VALUES ('$username', '$email', '$password')";


        //if the query is succesful, redirect to welcome.php page, done!
        if ($mysqli->query($sql) === true) {
            $_SESSION['message'] = "Registration Succesful! $username added to the database!";
           header("location: welcome.php");  //<--- HAVE TO MAKE A VENDOR LANDING PAGE!
        }
        else{
            $_SESSION['message'] = "$username could not be added to the database";
        }
    }
    
    
    else{
        $_SESSION['message'] = "Passwords do not match, please re-enter.";
    }
}


?>


<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
    <div class="module">
        <h1>Vendor Registration</h1>
        <hr></br>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error">
            <?= $_SESSION['message'] ?>
        </div>

        <input type="text" placeholder="Vendor Name" name="username" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
        <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
</div>
</div>

