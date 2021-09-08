<?php

	include '../includes/session.php'; 

	if(isset($_POST['upload'])){
		$emp_id = $_POST['emp_id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/images/'.$filename);	
		}

			$sql = "UPDATE emp_table SET photo = '$filename' WHERE emp_id = '$emp_id'";
		 	if($conn->query($sql)){
		 		$_SESSION['success'] = 'Employee photo updated successfully';
		 	}
		 	else{
		 		$_SESSION['error'] = $conn->error;
		 	}

		}
		else{
		 	$_SESSION['error'] = 'Select employee to update photo first';
	}

	 header('location: '.$_SERVER['HTTP_REFERER']); // load the same page
?>