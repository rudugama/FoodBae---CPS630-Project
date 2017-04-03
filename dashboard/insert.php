<?php  
require "connect.php";
include "parserV1.php";
if(!isset($_POST["vendor_id"])){   header("Location:../login.php");}
if(!empty($_POST))  
{  
    $output = '';  
    $message = '';  
    $deal_name = mysqli_real_escape_string($connect, $_POST["deal_name"]);  
    $deal_desc = mysqli_real_escape_string($connect, $_POST["deal_desc"]);  
    $price = mysqli_real_escape_string($connect, $_POST["price"]);  
    $day = mysqli_real_escape_string($connect, $_POST["day"]);  
    $isActive = mysqli_real_escape_string($connect, $_POST["active_deal"]);  
    $deal_id = mysqli_real_escape_string($connect, $_POST["deal_id"]);  
    $vendor_id = mysqli_real_escape_string($connect, $_POST["vendor_id"]);  
   
    if($deal_id != '')  
    {  
        $query = "  
           UPDATE deals   
           SET deal_name='$deal_name',   
           deal_desc='$deal_desc',   
           price='$price',   
           day = '$day',   
           isActive = '$isActive'   
           WHERE deal_id='$deal_id'";  
        $message = 'Data Updated';  
    }  
    else  
    {  
        $query = "  
           INSERT INTO deals(deal_name, deal_desc, price, day, isActive)  
           VALUES('$deal_name', '$deal_desc', '$price', '$day', '$isActive');  
           ";  
        $message = 'Data Inserted';  
    }  
    if(mysqli_query($connect, $query))  
    {  
        $output .= '<label class="text-success">' . $message . '</label>';  
        $select_query = "SELECT * FROM deals WHERE vendor_id='$vendor_id' ORDER BY deal_id";  
        $result = mysqli_query($connect, $select_query);  
        $output .= '  
                <table class="table table-hover table-striped table-users">
                    <thead>
                        <tr class="success">
                            <th>Deal Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Weekday</th>
                            <th>State</th>
                            <th>Edit</th>
                        </tr>
                    </thead> 
           ';  
        while($row = mysqli_fetch_array($result))  
        {  
            $day = weekDay($row["day"]);          
            $active = activeStat($row["isActive"]);   
            $output .= '  
                     <tr>  
                          <td>' . $row["deal_name"] . '</td>  
                          <td>' . $row["deal_desc"] . '</td>  
                          <td>$'. $row["price"] . '</td>  
                          <td>' .$day. '</td>  
                          <td>' .$active. '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["deal_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                     </tr>  
                ';  
        }  
        $output .= '</table>';  
    }  
    echo $output;  
}




?>
