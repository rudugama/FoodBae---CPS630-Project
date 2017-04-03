<?php
include "../database.php";
$_SESSION['status'] = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['currentpassword'])){
        
    $currentpassword = md5($_POST['currentpassword']);
    $username = $_SESSION['username'];
    $query = "SELECT * FROM vendors WHERE username='$username' AND password='$currentpassword'";
    $result = mysqli_query($mysqli, $query);
    $numRow = mysqli_num_rows($result);
        
    if($numRow > 0){
        
        
        if ($_POST['newpassword'] == $_POST['confirmpassword']){
            
            $newpassword = md5($_POST['newpassword']);
            $updateQuery = "UPDATE vendors SET password='$newpassword' WHERE username='$username'";
            
            $stmt = $mysqli->prepare($updateQuery);
            
            $stmt->execute();
            
            if (mysqli_affected_rows($mysqli)> 0){
                $_SESSION['status'] = "Password Succesfully Updated";
            }
            
            else{
            $_SESSION['status'] = "Query Failed";
            }
            
        }
        
        else{
        $_SESSION['status'] = "New passwords do not match";
        }
        
        
        
    }
    
    else{
    $_SESSION['status'] = "Current password incorrect. Please Try Again.";    
    }
        
  }
}
?>