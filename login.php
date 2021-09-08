<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users_table WHERE username = '$username'";
		$query = $conn->query($sql);


		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with this username - See Your Admin.';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['user'] = $row['user_id'];
				$_SESSION['lastActive'] = time();
				$_SESSION['success'] = 'You have logged in successfully!!';
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Username/Password is Incorrect';
	}

	header('location: index.php');

?>