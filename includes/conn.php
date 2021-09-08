<?php
	$conn = new mysqli('localhost', 'root', '', 'car_rentals');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>