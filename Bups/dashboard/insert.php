<?php
$connect = mysqli_connect("localhost","root", "", "foodbae");
$vendor_id = $mysqli->real_escape_string($_SESSION['vendor_id']);

$sql = "INSERT INTO deals (vendor_id, price, deal_name, deal_desc, day, isActive) " 
    . "VALUES ('$vendor_id', '".$_POST["deal_price"]."', '".$_POST["deal_name"]."', '".$_POST["deal_desc"]."', '".$_POST["deal_day"]."', '".$_POST["deal_active"]."')";

if(mysqli_query($connect, $sql)){
    
    echo 'Data Inserted';
}



?>