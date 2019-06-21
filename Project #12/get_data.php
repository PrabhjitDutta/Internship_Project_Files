<?php
	$S_NO = $_GET["S_NO"];

	$conn = mysqli_connect("localhost", "id10015019_admin", "secret", "id10015019_sensor_data_station");
	if (!$conn) {
    	die('Could not connect: ' . mysqli_connect_error());
	}

	$q="select * from data_table where SENSOR_NO = '#".$S_NO."' order by DATE desc, TIME desc limit 1;";
    $result = mysqli_query($conn, $q);
  
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$msg_str = $row["SENSOR_NO"]." ".$row["DATE"]." ".$row["TIME"]." ".$row["TEMPERATURE"]." ".$row["HUMIDITY"];
	echo "$msg_str";
?>