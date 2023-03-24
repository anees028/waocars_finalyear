<?php
	$conn = new mysqli('localhost:3306', 'wacarsco_wa_user', 'v#[dp]qL(.q)', 'wacarsco_mergetesting');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>