<?php
	include '../includes/session.php'; 

	//fetching details 
	if(isset($_POST['id']) && isset($_POST['name'])){

		$id = $_POST['id'];
		//for edit
		if($_POST['name'] === 'edit'){
			$sql = "SELECT * FROM clients_table WHERE client_id='$id'";
			$query = $conn->query($sql);
			$row = $query->fetch_assoc();

			echo json_encode($row);
			exit();
		}
		//for delete
		if($_POST['name'] === 'delete'){
			$sql = "DELETE FROM clients_table WHERE client_id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Deleted successfully';
			}
			else{
				$_SESSION['error'] = 'Unable to Delete '.$conn->error;
			}
			
			$row = array("delete"=>"Yes");
			echo json_encode($row);
			exit();
		}
		//for activate
		if($_POST['name'] === 'activate'){
			$sql = "UPDATE clients_table SET status = 0 WHERE client_id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Activation successfully';
			}
			else{
				$_SESSION['error'] = 'Unable to Activate '.$conn->error;
			}
			
			$row = array("aactivate"=>"Yes");
			echo json_encode($row);
			exit();
		}

		//for deactivate
		if($_POST['name'] === 'deactivate'){
			$sql = "UPDATE clients_table SET status = 1 WHERE client_id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Deactivation successfully';
			}
			else{
				$_SESSION['error'] = 'Unable to Deactivate '.$conn->error;
			}
			
			$row = array("deactivate"=>"Yes");
			echo json_encode($row);
			exit();
		}

	}

	//adding new client details
	if(isset($_POST['addClient'])){
		$fullname = $_POST['fullname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$id_type = $_POST['id_type'];
		$id_number = $_POST['id_number'];
		$createdby = $user['fullname'];
        $createdat = date('Y-m-d');

		$sql = "INSERT INTO clients_table (fullname, address, contact, email, identification_type, identification_number, createdat, createdby) VALUES ('$fullname', '$address', '$contact', '$email', '$id_type', '$id_number', '$createdat', '$createdby')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New Client added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	
		header('location: ../addEditClients.php');
		exit();

	}	



	//update client details
	if(isset($_POST['editClient'])){
		$client_id = $_POST['client'];
		$fullname = $_POST['fullname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$id_type = $_POST['id_type'];
		$id_number = $_POST['id_number'];
		$updatedby = $user['fullname'];
        $updatedat = date('Y-m-d');

		$sql = "UPDATE clients_table SET fullname = '$fullname', address = '$address', contact = '$contact', email = '$email', identification_type = '$id_type', identification_number = '$id_number', updatedat = '$updatedat', updatedby = '$updatedby' WHERE client_id = '$client_id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Client details updated successfully';
		}
		else{
			$_SESSION['error'] = 'Unable to update '.$conn->error;
		}
	
		header('location: ../addEditClients.php');
		exit();

	}




	

?>