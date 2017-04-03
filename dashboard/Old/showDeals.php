<?php
include "../database.php";

$vendor_id = $mysqli->real_escape_string($_SESSION['vendor_id']);

$query = "SELECT * FROM deals WHERE vendor_id='$vendor_id'";
$result= mysqli_query($mysqli, $query);   

while ($row = mysqli_fetch_array($result)){
    
    
    
}




?>