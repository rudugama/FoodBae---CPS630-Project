<?php  
 if(isset($_POST["deal_id"]))  
 {  
      
      $output = '';  
      require "connect.php";
     //    $connect = mysqli_connect("localhost", "root", "", "foodbae");  
 //   $connect = mysqli_connect("localhost","dhanbee", "foodbae123", "foodbaee");
      $query = "SELECT * FROM deals WHERE deal_id = '".$_POST["deal_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
     
      while($row = mysqli_fetch_array($result))  
      {  
         
          $day = weekDay($row["day"]);          
          $active = activeStat($row["isActive"]);
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["deal_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Description</label></td>  
                     <td width="70%">'.$row["deal_desc"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Price</label></td>  
                     <td width="70%">$'.$row["price"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Week Day</label></td>  
                     <td width="70%">'.$day.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">'.$active.'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output; 
     
     
     
     
 }  

function weekDay($dayNum){


    if($dayNum == 1){
        return 'Monday';
    }
    if($dayNum == 2){
        return 'Tuesday';
    }
    if($dayNum == 3){
        return 'Wednesday';
    }
    if($dayNum == 4){
        return 'Thursday';
    }
    if($dayNum == 5){
        return 'Friday';
    }
    if($dayNum == 6){
        return 'Saturday';
    }
    if($dayNum == 7){
        return 'Sunday';
    }

}



function activeStat($status){
    if($status == 0){
        return 'Inactive';
    }
    if($status == 1){
        return 'Active';
    }

}

 ?>
