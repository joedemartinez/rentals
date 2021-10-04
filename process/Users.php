<?php
  include '../includes/session.php'; 

  //fetching details 
  if(isset($_POST['id']) && isset($_POST['name'])){

    $id = $_POST['id'];
    //for edit
    if($_POST['name'] === 'edit'){
      $sql = "SELECT * FROM users_table WHERE user_id='$id'";
      $query = $conn->query($sql);
      $row = $query->fetch_assoc();

      echo json_encode($row);
      exit();
    }
    //for delete
    if($_POST['name'] === 'delete'){
      //delete == 2
      // $sql = "DELETE FROM users_table WHERE user_id = '$id'";
      $sql = "UPDATE users_table SET status = 2 WHERE user_id = '$id'";
      if($conn->query($sql)){
        //update details
        $deletedby = $user['fullname'];
            $deletedat = date('Y-m-d');
            $conn->query("UPDATE users_table SET deletedat = '$deletedat', deletedby = '$deletedby' WHERE user_id = '$id'");

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
      $sql = "UPDATE users_table SET status = 0 WHERE user_id = '$id'";
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

      $reason = $_POST['reason'];
      
      $sql = "UPDATE users_table SET status = 1, deactivation_reason =  '$reason' WHERE user_id = '$id'";
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

  //adding new user details
  if(isset($_POST['addUser'])){
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $username = $_POST['username'];
    $password = password_hash("password", PASSWORD_DEFAULT);
    $createdby = $user['fullname'];
    $createdat = date('Y-m-d');

    $sql = "INSERT INTO users_table (fullname, address, phoneno, username, password, dob, createdat, createdby) VALUES ('$fullname', '$address', '$contact', '$username', '$password', '$dob', '$createdat', '$createdby')";
    if($conn->query($sql)){
      $_SESSION['success'] = 'New User added successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
  
    header('location: ../addEditUsers.php');
    exit();

  } 



  //update user details
  if(isset($_POST['editUser'])){
    $user_id = $_POST['user'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $updatedby = $user['fullname'];
    $updatedat = date('Y-m-d');

    $sql = "UPDATE users_table SET fullname = '$fullname', address = '$address', phoneno = '$contact', updatedat = '$updatedat', updatedby = '$updatedby' WHERE user_id = '$user_id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'User details updated successfully';
    }
    else{
      $_SESSION['error'] = 'Unable to update '.$conn->error;
    }
  
    header('location: ../addEditUsers.php');
    exit();

  }




  

?>