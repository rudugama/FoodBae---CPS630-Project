<?php
$connect = mysqli_connect("localhost","root", "", "foodbae");

$vendor_id = $mysqli->real_escape_string($_SESSION['vendor_id']);
$output ='';
$sql = "SELECT * FROM deals ORDER BY deal_id ASC";
$result = mysqli_query($connect, $sql);

$output .= '
<div class="table-responsive">
    <table class="table table-bordered">
    <tr>
        <th>Deal Name</th>
        <th>Deal Desc</th>
        <th>Price</th>
        <th>Day</th>
        <th>Active</th>
        <th>Remove</th>
    </tr>';

if(mysqli_num_rows($result)> 0){
    
    while($row = mysqli_fetch_array($result)){
        $output .= '<td class="deal_name" data-id1="'.$row["deal_id"].'" contenteditable>'.$row["deal_name"].'</td>
                    <td class="deal_desc" data-id2="'.$row["deal_id"].'" contenteditable>'.$row["deal_desc"].'</td>
                    <td class="deal_price" data-id3="'.$row["deal_id"].'" contenteditable>'.$row["price"].'</td>
                    <td class="deal_day" data-id4="'.$row["deal_id"].'" contenteditable>'.$row["day"].'</td>
                    <td class="deal_active" data-id5="'.$row["deal_id"].'" contenteditable>'.$row["isActive"].'</td>
                    <td><button name="btn_delete" id="btn_delete" data-id6="'.$row["deal_id"].'">X</button></td>
                    ';
    }
    $output .= '<tr>
                <td></td>
                <td id="deal_name" contenteditable></td>
                <td id="deal_desc" contenteditable></td>
                <td id="deal_price" contenteditable></td>
                <td id="deal_day" contenteditable></td>
                <td id="deal_active" contenteditable></td>
                <td><button name="btn_add" id="btn_add" class="btn btn-xs bt-success">+</button></td>
                </tr>';
    
}
else{
  
    $output .= '<tr>
                    <td colspan="4">No Entries Found</td>
                <tr/>';
     
}

$output .= '</table>
        </div>';


?>