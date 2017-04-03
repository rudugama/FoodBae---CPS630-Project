<?php  
//fetch.php 
if(!isset($_POST["vendor_id"])){   header("Location:../login.php");}
require "connect.php";
if(isset($_POST["deal_id"])) 
{  
  $query = "SELECT * FROM deals WHERE deal_id = '".$_POST["deal_id"]."'";   
  $result = mysqli_query($connect, $query);  
  $row = mysqli_fetch_array($result);  
  echo json_encode($row);  
}  
?>