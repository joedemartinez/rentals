<?php
  include '../includes/session.php'; 

  //fetching details 
  if(isset($_POST['id']) && isset($_POST['name'])){

    $id = $_POST['id'];
    //for edit
    if($_POST['name'] === 'edit'){
      $sql = "SELECT * FROM vehicles WHERE vehicle_id='$id'";
      $query = $conn->query($sql);
      $row = $query->fetch_assoc();

      echo json_encode($row);
      exit();
    }
    //for delete
    if($_POST['name'] === 'delete'){
      $sql = "DELETE FROM vehicles WHERE vehicle_id = '$id'";
      if($conn->query($sql)){
        //update details
        $deletedby = $user['fullname'];
            $deletedat = date('Y-m-d');
            $conn->query("UPDATE vehicles SET deletedat = '$deletedat', deletedby = '$deletedby' WHERE vehicle_id = '$id'");

        $_SESSION['success'] = 'Deleted successfully';
      }
      else{
        $_SESSION['error'] = 'Unable to Delete '.$conn->error;
      }
      
      $row = array("delete"=>"Yes");
      echo json_encode($row);
      exit();
    }

  }

  //adding new user details
  if(isset($_POST['addVehicle'])){
    $name = $_POST['vehicle_type'];
    $brand = $_POST['vehicle_brand'];
    $reg_no = $_POST['vehicle_reg_no'];
    $price = $_POST['vehicle_price'];
    $color = $_POST['vehicle_color'];
    $location = $_POST['vehicle_location'];
    $insurace = $_POST['vehicle_insurance_date'];
    $createdby = $user['fullname'];
    $createdat = date('Y-m-d');

    $sql = "INSERT INTO vehicles (vehicle_type, vehicle_brand, vehicle_reg_no, vehicle_price, vehicle_color, vehicle_location, vehicle_insurance_date, createdat, createdby) VALUES ('$name', '$brand', '$reg_no', '$price', '$color', '$location', '$insurace', '$createdat', '$createdby')";
    if($conn->query($sql)){
      $_SESSION['success'] = 'New Vehicle added successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
  
    header('location: ../addEditVehicles.php');
    exit();

  } 



  //update user details
  if(isset($_POST['editVehicle'])){
    $vehicle_id = $_POST['vehicle'];
    $name = $_POST['vehicle_type'];
    $brand = $_POST['vehicle_brand'];
    $reg_no = $_POST['vehicle_reg_no'];
    $price = $_POST['vehicle_price'];
    $color = $_POST['vehicle_color'];
    $location = $_POST['vehicle_location'];
    $insurace = $_POST['vehicle_insurance_date'];
    $updatedby = $user['fullname'];
    $updatedat = date('Y-m-d');

    $sql = "UPDATE vehicles SET vehicle_type = '$name', vehicle_brand = '$brand', vehicle_reg_no = '$reg_no', vehicle_price = '$price', vehicle_color = '$color', vehicle_location = '$location', vehicle_insurance_date = '$insurace', updatedat = '$updatedat', updatedby = '$updatedby' WHERE vehicle_id = '$vehicle_id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Vehicle details updated successfully';
    }
    else{
      $_SESSION['error'] = 'Unable to update '.$conn->error;
    }
  
    header('location: ../addEditVehicles.php');
    exit();

  }




  

?>