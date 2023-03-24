<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$teamname = $_POST['teamname'];
		$teamshop = $_POST['position'];
		// $address = $_POST['address'];
		// $birthdate = $_POST['birthdate'];
		// $contact = $_POST['contact'];
		// $gender = $_POST['gender'];
		// $position = $_POST['position'];
		// $schedule = $_POST['schedule'];
		// $filename = $_FILES['photo']['name'];
		// if(!empty($filename)){
		// 	move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		// }
		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO team (teamName, teamShop ) VALUES ('$employee_id', '$teamname', '$teamshop')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Team added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: team.php');
?>