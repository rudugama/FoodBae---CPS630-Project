<!DOCTYPE HTML>
<html>
<body>

<?php
$con = mysqli_connect("localhost","root","","test");

//if we do not connect
if(mysqli_connect_errno()){
    echo "Failed to connect!" . mysqli_connect_error();
}

//if we connect 
if(mysqli_ping($con)){
    echo "Connection OK!";
} else {
    echo "Error: " . mysqli_error($con);
}

// This is where we will chekc to see if the password entered was right or not and then return acttion to index.php
    
print_r($_POST);
$username = $_POST['user'];
$password = $_POST['pass'];
$login_result = mysqli_query($con,"SELECT `username`,`password`
                                     FROM `test`.`login_info`
                                    WHERE username = '$username'");
if($login_result->num_rows)
{
   $return_val= "Found user";
//    return true;
}
else {
    
   $return_val= "Did not find";
  //  return false;
}
    echo $return_val;              
    
mysqli_close($con);

?>

</body>
</html>