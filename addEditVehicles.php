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
        Vehicles
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vehicles</li>
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
                  <th>Vehicle Name</th>
                  <th>Brand</th>
                  <th>Color</th>
                  <th>Photo</th>
                  <th>Registration No</th>
                  <th>Price</th>
                  <th>Location</th>
                  <th>Insurance Date</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $sql =  "SELECT * FROM vehicles ORDER BY vehicle_id DESC";
                    $query = $conn->query($sql);
                   //id auto increament in tables initiation
                    $i = 1;
                    while($row = $query->fetch_assoc()){

                      echo "
                        <tr>
                          <td>". $i."</td>
                          <td>".$row['vehicle_type']."</td>
                          <td>".$row['vehicle_brand']."</td>
                          <td>".$row['vehicle_color']."</td>
                          <td><img width='50' height='40' src='assets/images/".$row['photo']."'></td>
                          <td>".$row['vehicle_reg_no']."</td>
                          <td>".$row['vehicle_price']."</td>
                          <td>".$row['vehicle_location']."</td>
                          <td>".$row['vehicle_insurance_date']."</td>
                          <td><button class='btn btn-warning btn-sm btn-flat edit' data-id='".$row['vehicle_id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button title='Delete Unit' class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['vehicle_id']."'><i class='fa fa-trash'></i> Delete</button>
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
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'modals/vehicleModal.php'; ?>

<script>
  $(document).on("click", ".edit", function(e){
    e.preventDefault();
    $('#edit').modal('show');
    let id = $(this).data('id');
    let name = "edit";
    getRow(id, name);
  });

  $(document).on("click", ".delete", function(e){
    e.preventDefault();
    confirm('Do you want to delete this vehicle?');
    let id = $(this).data('id');
    let name = "delete";
    getRow(id, name);
  });

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: 'process/Vehicles.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
      if("delete" in response){
        location.reload();
      }
      else{
        $('#vehicle').val(response.vehicle_id)
        $('#vehicle_type').val(response.vehicle_type);
        $('#vehicle_brand').val(response.vehicle_brand);
        $('#vehicle_reg_no').val(response.vehicle_reg_no);
        $('#vehicle_price').val(response.vehicle_price);
        $('#vehicle_color').val(response.vehicle_color);
        $('#vehicle_location').val(response.vehicle_location);
        $('#vehicle_insurance_date').val(response.vehicle_insurance_date);
      }
    }
  });
}
</script>

</body>
</html>
