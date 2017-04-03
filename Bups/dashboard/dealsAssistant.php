<?php
include "../database.php";
$_SESSION['message'] = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
if(isset($_POST['dealName']))
{   
    $vendor_id = $mysqli->real_escape_string($_POST['vendor_id']);
    $price = $mysqli->real_escape_string($_POST['dealPrice']);
    $deal_name = $mysqli->real_escape_string($_POST['dealName']);    
    $desc = $mysqli->real_escape_string($_POST['desc']);
    $day = $mysqli->real_escape_string($_POST['day']);
    $isActive = $mysqli->real_escape_string($_POST['active_deal']);
    

    

    
    $sql = "INSERT INTO deals (vendor_id, price, deal_name, deal_desc, day, isActive) " 
        . "VALUES ('$vendor_id', '$price', '$deal_name', '$desc', '$day', '$isActive')";

    if ($mysqli->query($sql) === true) {
        $_SESSION['message'] = "Added!";
    }
    else{
        $_SESSION['message'] = "no good";
    }


}

else{
    $_SESSION['message'] = "Deal name not set.";

}
}

?>