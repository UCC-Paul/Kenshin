<?php 
	// Include the database config file 
	include_once 'config.php';

	// Get country id through state name

	$provinceID = $_POST['provinceID'];

	if (!empty($provinceID)) {
		// Fetch city name base on province id
		$query = "SELECT * FROM city WHERE province_id = {$provinceID}";

		$result = $con->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>'; 
			}
		}else{
			echo '<option value="">State not available</option>'; 
		}
	}elseif (!empty($_POST['cityid'])) {
		$cityid = $_POST['cityid']; 
		// Fetch barangay name base on city id

		$query = "SELECT * FROM barangay WHERE city_id = {$cityid}";

		$result = $con->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				 echo '<option value="'.$row['id'].'">'.$row['barangay_name'].'</option>'; 
			}
		}else{
			echo '<option value="">barangay not available</option>'; 
		}
	}

?>