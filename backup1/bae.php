<!DOCTYPE HTML>
<html>
<body>

<?php
$con = mysqli_connect("localhost","rudugama","Stingray#3","foodbaee");

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

mysqli_close($con);
?>

</body>
</hmtl>