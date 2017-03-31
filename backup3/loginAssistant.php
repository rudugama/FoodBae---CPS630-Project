<?php
include "database.php";
session_start();
$_SESSION['message'] = '';
$_SESSION["logged_in"] = false;
$_SESSION["username"] = $username;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //If the passwords equal to each other
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = md5($_POST['password']); // md5 hashed password.. maybe use SHA52..

        
        if(isset($_POST['username']))
        {   
			$username = $_POST['username'];
			
			// This query needs to make sure that both password and username is set
	        //$query = "SELECT * FROM users WHERE username='$username'";
	        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            
            $result = mysqli_query($mysqli, $query);
            
            $numRow = mysqli_num_rows($result);
            
            if($numRow > 0){
            //IF THE USER FOUND IN DB.. LOG THEM INTO DASHBOARD
				// Figure out what session variables need to be sent over as well....
				$_SESSION['message'] = "Login Succesful";
				$_SESSION["logged_in"] = true;
				$_SESSION["username"] = $username;
				header("location: dashboard/dashboard.php");
				
				if ($mysqli->query($sql) === true) {
				//$_SESSION['message'] = "Thank you $username for Registering!";
				//header("location: login.php");  //<--- HAVE TO MAKE A VENDOR LANDING PAGE!
                }
				 	
			//$_SESSION['message'] = "$username is taken, please try again!";
            }

            else{
				
				
				$_SESSION['message'] = "Login Failed, Try Again, or Create an Account";
				
				/*
                //Inserting into database....
                
                $_SESSION['username'] = $username;

                //create SQL query string for inserting data into the database
                $sql = "INSERT INTO users (username, email, password, isAdmin) "
                    . "VALUES ('$username', '$email', '$password', '$admin')";
                
                
                
                if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "Thank you $username for Registering!";
                    header("location: login.php");  //<--- HAVE TO MAKE A VENDOR LANDING PAGE!
                }
                else{
                    $_SESSION['message'] = "$username could not be added to the database";
                }
				
				*/
            }


        }
}


?>