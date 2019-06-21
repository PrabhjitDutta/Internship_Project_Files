<?php
	$S_NO = $_GET["S_NO"];
	$DATE = $_GET["DATE"];
	$TIME = $_GET["TIME"];
	$TEMPERATURE = $_GET["TEMPERATURE"];
	$HUMIDITY = $_GET["HUMIDITY"];

	$conn = mysqli_connect("localhost", "id10015019_admin", "secret", "id10015019_sensor_data_station");
	if (!$conn) {
    	die('Could not connect: ' . mysqli_connect_error());
	}

	$query = "INSERT INTO data_table VALUES('".$S_NO."', '".$DATE."', '".$TIME."', ".$TEMPERATURE.", ".$HUMIDITY.")";
	
	if(mysqli_query($conn, $query) === TRUE){
	    echo "Inserted Successfully";
	}
	else{
	    echo mysqli_error($conn);
	}

	mysqli_close($conn);
?>