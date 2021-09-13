<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rentals
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rentals</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>Add New</a>
            </div>
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>#</th>
                  <th>Name of Client</th>
                  <th>Vehicle</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Rate</th>
                  <th>Bank</th>
                  <th>Payments</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $sql =  "SELECT * FROM rentals_table ORDER BY rental_id DESC";
                    $query = $conn->query($sql);
                   //id auto increament in tables initiation
                    $i = 1;
                    while($row = $query->fetch_assoc()){

                      $clients = $conn->query("SELECT * FROM clients_table WHERE client_id = '$row[client_id]'");
                      $vehicles = $conn->query("SELECT * FROM vehicles WHERE vehicle_id = '$row[vehicle_id]'");
                      $row1 = $clients->fetch_row();
                      $row2 = $vehicles->fetch_row();

                      echo "
                        <tr>
                          <td>". $i."</td>
                          <td>".$row1[1]."</td>
                          <td>".$row2[1]." - ".$row2[2]."</td>
                          <td>".$row['start_date']."</td>
                          <td>".$row['end_date']." </td>
                          <td>".$row['rate']."</td>
                          <td>".$row['bank']." - ".$row['bank_account']." </td>
                          <td>
                            <button title='Show Payment' class='btn btn-info btn-sm btn-flat spayment' data-id='".$row['rental_id']."'><i class='fa fa-eye'></i> Show Payment</button>
                            <button title='Add Payment' class='btn btn-secondary btn-sm btn-flat apayment' data-id='".$row['rental_id']."'><i class='fa fa-plus'></i> Add Payment</button>
                          </td>
                          <td>
                            <button title='Delete' class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['rental_id']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                      $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  <!-- <button class='btn btn-warning btn-sm btn-flat edit' data-id='".$row['rental_id']."'><i class='fa fa-edit'></i> Edit</button> -->

  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<?php include 'modals/rentalsModal.php'; ?>

<script>
  $(document).on("click", ".apayment", function(e){
    e.preventDefault();
    $('#apayment').modal('show');
    let id = $(this).data('id');
    let name = "apayment";
    getRow(id, name);
  });

  $(document).on("click", ".spayment", function(e){
    e.preventDefault();
    $('#payment').modal('show');
    let id = $(this).data('id');
    let name = "payment";
    getPay(id, name);
  });

  $(document).on("click", ".delete", function(e){
    e.preventDefault();
    confirm('Do you want to delete this rental?');
    let id = $(this).data('id');
    let name = "delete";
    getRow(id, name);
  });

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: 'process/Rentals.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
      if("delete" in response){
        location.reload();
      }
      else if("hello" in response){
        location.reload();
      }
      else{
        $('.clientName').html(response.clientName);
        $('#vehicle_price').val(response.vehicle_price);
        $('#rentalID').val(response.rental_id);
      }
    }
  });
}

//get all payments
function getPay(id, name){
  $.ajax({
    type: 'POST',
    url: 'process/Rentals.php', 
    data: {id:id, name:name},
    success: function(response){
      console.log(response);
        $('.payments').html(response);
    }
  });
}
</script>

</body>
</html>
