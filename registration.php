<?php
include "database.php";
session_start();
$_SESSION['message'] = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //If the passwords equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']){

        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); // md5 hashed password.. maybe use SHA52..
        $admin = 0;
        
        //This below code checks if the username already exists!
        
        if(isset($_POST['username']))
        {   
            $username = $_POST['username'];

            $query = "SELECT * FROM vendors WHERE username='$username'";
            
            $result = mysqli_query($mysqli, $query);
            
            $numRow = mysqli_num_rows($result);
            
            if($numRow > 0){
            $_SESSION['message'] = "$username is taken, please try again!";
            }

            else{
                //Inserting into database....
                
                $_SESSION['username'] = $username;

                //create SQL query string for inserting data into the database
                $sql = "INSERT INTO vendors (username, email, password, isAdmin) "
                    . "VALUES ('$username', '$email', '$password', '$admin')";
                
                
                
                if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "Thank you $username for Registering!";
                    header("location: login.php");  //<--- HAVE TO MAKE A VENDOR LANDING PAGE!
                }
                else{
                    $_SESSION['message'] = "$username could not be added to the database";
                }
            }


        }

    }else{
        $_SESSION['message'] = "Passwords do not match, please re-enter.";
    }
}


?>