<?php
  include '../includes/session.php'; 

  //fetching details 
  if(isset($_POST['id']) && isset($_POST['name'])){

    $id = $_POST['id'];
    //for add payment
    if($_POST['name'] === 'apayment'){
      $sql = "SELECT * FROM rentals_table WHERE rental_id='$id'";
      $query = $conn->query($sql);
      $row = $query->fetch_assoc();

      //get fullname
        $clients = $conn->query("SELECT fullname FROM clients_table WHERE client_id = '$row[client_id]'");
        $row1 = $clients->fetch_row();

      //get vehicle price
        $vehicle = $conn->query("SELECT vehicle_price FROM vehicles WHERE vehicle_id = '$row[vehicle_id]'");
        $row2 = $vehicle->fetch_row();

      $row['clientName'] = $row1[0];
      $row['vehicle_price'] = $row2[0];


      echo json_encode($row);
      exit();
    }

    //for delete
    if($_POST['name'] === 'delete'){
      $sql = "DELETE FROM rentals_table WHERE rental_id = '$id'";
      if($conn->query($sql)){
        //update details
        $deletedby = $user['fullname'];
        $deletedat = date('Y-m-d');
        $conn->query("UPDATE vehicles SET deletedat = '$deletedat', deletedby = '$deletedby' WHERE rental_id = '$id'");

        $_SESSION['success'] = 'Deleted successfully';
      }
      else{
        $_SESSION['error'] = 'Unable to Delete '.$conn->error;
      }
      
      $row = array("delete"=>"Yes");
      echo json_encode($row);
      exit();
    }

    //show payment
    if($_POST['name'] === 'payment'){
      $sql = "SELECT * FROM payment_table WHERE rental_id='$id' ORDER BY payment_id";
      $query = $conn->query($sql);
      $i = 0;
      $table = "";
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          //get fullname
        $clients = $conn->query("SELECT * FROM rentals_table LEFT JOIN clients_table on clients_table.client_id=rentals_table.client_id WHERE rentals_table.rental_id='$row[rental_id]'");
        $row1 = $clients->fetch_row();

          $table .= '<tr>
                  <td>'. ++$i.'</td>
                  <td>'. $row['payment_date'].'</td>
                  <td>'. $row1[17].'</td>
                  <td>'. $row['payment_amount'].'</td>
                  <td>'. $row['commulative_amount'].'</td>
                  <td>'. $row['remaining_bal'].'</td>
                  <td>'. $row['opening_bal'].'</td>
                </tr>
                ';      
          $i++;
        }
        echo $table;
        exit();
      }else{
        echo "<tr>
            <td colspan='7'><center>No record available</center></td> 
            </tr>";
        exit();
      }
    }

  }

  //adding new rental details
  if(isset($_POST['addRental'])){
    $clientName = $_POST['client_name'];
    $vehicle = $_POST['vehicle'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $payment_date = $_POST['payment_date'];
    $rate = $_POST['rate'];
    $bank = $_POST['bank'];
    $account_no = $_POST['account_no'];
    $createdby = $user['fullname'];
    $createdat = date('Y-m-d');

    $sql = "INSERT INTO rentals_table (client_id, vehicle_id, start_date, end_date, payment_date, rate, bank, bank_account, createdby, createdat) VALUES ('$clientName', '$vehicle', '$start_date', '$end_date', '$payment_date', '$rate', '$bank', '$account_no','$createdby', '$createdat')";
     
      if($conn->query($sql)){
        $conn->query("UPDATE vehicles SET status = 1 WHERE vehicle_id = '$vehicle'");
        $_SESSION['success'] = 'New Rental added successfully';
      }
      else{
        $_SESSION['error'] = $conn->error;
      }
  
    header('location: ../addEditRentals.php');
    exit();

  } 


//adding new rental details
  if(isset($_POST['addPayment'])){
    $vehicle_price = $_POST['vehicle_price'];
    $payment = $_POST['payment'];
    $rentalID = $_POST['rentalID'];

    $createdby = $user['fullname'];
    $createdat = date('Y-m-d');

    $opening_bal = $vehicle_price;


    ///calculate cum bal & remaing abl
    $cum_bal = $conn->query("SELECT commulative_amount, remaining_bal FROM payment_table WHERE rental_id = '$rentalID' ORDER BY  payment_id DESC LIMIT 1");
      if($row1 = $cum_bal->fetch_row()){
        $cummulative_bal = $row1[0] + $payment;
        $remaining_bal = $row1[1] - $payment;
      }else {
        $cummulative_bal = $payment;
        $remaining_bal = $opening_bal - $payment;
      }

    $sql = "INSERT INTO payment_table (rental_id, payment_date, payment_amount, remaining_bal, opening_bal, commulative_amount, createdby, createdat) VALUES ('$rentalID', '$createdat', '$payment', '$remaining_bal', '$opening_bal', '$cummulative_bal','$createdby', '$createdat')";
     
      if($conn->query($sql)){
        $_SESSION['success'] = 'New Payment made successfully';
      }
      else{
        $_SESSION['error'] = $conn->error;
      }
  
    header('location: ../addEditRentals.php');
    exit();

  } 




  

?>