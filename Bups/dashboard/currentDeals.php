<?php
include "../database.php";


$vendor_id = $mysqli->real_escape_string($_SESSION['vendor_id']);

$sqlget = "SELECT * FROM deals WHERE vendor_id='$vendor_id'";
$sqldata = mysqli_query($mysqli, $sqlget);            

echo "<table class='table table-hover table-striped table-users'>";
echo "<tr class='success'>";
echo "<th>Deal Name</th>
                              <th>Description</th>
                              <th>Price</th>
                              <th>Weekday</th>
                              <th>State</th>
                              <th>Edit</th>";

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
    echo "<tr><td>";
    echo $row['deal_name'];
    echo "</td><td>";
    echo $row['deal_desc'];
    echo "</td><td>";
    echo $row['price'];
    echo "</td><td>";
    $dayNum = $row['day'];
    weekDay($dayNum);
    echo "</td><td>";
    $status = $row['isActive'];
    activeStat($status);
    echo "</td><td>";
    echo "<div class='btn-group'>
          <button type='button' class='btn btn-xs  btn-action'>Edit</button>
          <button type='button' class='btn btn-xs  btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          <span class='caret'></span>
          <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu'>
          <li><a href='#'>Delete</a></li>
         </ul>
         </div>";
    echo "</td></tr>";
}
echo "</table>";


function weekDay($dayNum){


    if($dayNum == 1){
        echo 'Monday';
    }
    if($dayNum == 2){
        echo 'Tuesday';
    }
    if($dayNum == 3){
        echo 'Wednesday';
    }
    if($dayNum == 4){
        echo 'Thursday';
    }
    if($dayNum == 5){
        echo 'Friday';
    }
    if($dayNum == 6){
        echo 'Saturday';
    }
    if($dayNum == 7){
        echo 'Sunday';
    }

}



function activeStat($status){
    if($status == 0){
        echo 'Inactive';
    }
    if($status == 1){
        echo 'Active';
    }

}

?>


