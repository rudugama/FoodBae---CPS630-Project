<!DOCTYPE html>
<html>
<head>
<style>
table,th,td{
	border : 1px solid black;
	}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "rudugama";
$password = "Stingray#3";
$dbname = "foodbaee";

//create connection
$con = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($con -> connect_error){
	die ("connection failed: " . $con -> connect_error); 	
}


$sql = "SELECT * FROM `deals`";

$result = $con ->query($sql);

if ($result-> num_rows){

	echo "<table><tr><th>Deal ID</th><th>Restaurant</th><th>Day</th><th>Date</th><th>Description</th></tr>";
	while($row = $result -> fetch_assoc())
	{
	    extract($row);
	    $fetch_array[] = $row;
	    echo"<tr><td>" . $deal_id . "</td><td>" . $row["place_id"] . "</td><td>" . $row["day"] . "</td><td>" . $row["date"] . "</td><td>" . $row["deal_name"] . "</td></tr>";
	}
	echo "<pre>";
	print_r($fetch_array);
	echo "</pre>";	
	
	foreach($fetch_array as $field)
	{
	   foreach($field as $fiel => $val)
	   echo "Field: " . $fiel . " -> Value: " . $val . "<br>";    
	}
	echo"</table>";
	echo "Hello. Today is ". date("Y-m-d") . ". Today's deal is: ..." . $fetch_array[0]['deal_name'];

}else{
	echo"0 results";
}



//close connection
$con -> close();
?>


<p>
Suk yo muddah!
<p>

</body>
</html>
