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
        Clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clients</li>
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
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>ID No.</th>
                  <th>Bank 1</th>
                  <th>Bank 2</th>
                  <th>Bank 3</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $sql =  "SELECT * FROM clients_table WHERE status = 0 ORDER BY client_id DESC";
                    $query = $conn->query($sql);
                   //id auto increament in tables initiation
                    $i = 1;
                    while($row = $query->fetch_assoc()){
                      // <td><img width='50' height='40' src='assets/images/".$row['photo']."'></td>
                      echo "
                        <tr>
                          <td>". $i."</td>
                          <td>".$row['fullname']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['contact']."</td>
                          <td>".$row['identification_type']." : ".$row['identification_number']."</td>
                          <td>".$row['bank1']." : ".$row['bank_number1']."</td>
                          <td>".$row['bank2']." : ".$row['bank_number2']."</td>
                          <td>".$row['bank3']." : ".$row['bank_number3']."</td>
                          <td><button class='btn btn-warning btn-sm btn-flat edit' data-id='".$row['client_id']."'><i class='fa fa-edit'></i> Edit</button>
                          <button class='btn btn-secondary btn-sm btn-flat deactivate' data-id='".$row['client_id']."'><i class='fa fa-toggle-off'></i> Deactivate</button>
                            <button title='Delete' class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['client_id']."'  <i class='fa fa-trash'></i> Delete</button>
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
<?php include 'modals/clientsModal.php'; ?>

<script>
  //edit
  $(document).on("click", ".edit", function(e){
    e.preventDefault();
    $('#edit').modal('show');
    let id = $(this).data('id');
    let name = "edit";
    getRow(id, name);
  });


//deactivate
  $(document).on("click", ".deactivate", function(e){
    e.preventDefault();
    $('#deactivation').modal('show');
    let id = $(this).data('id');
    $('#deID').val(id);
    
  });
  $(document).on("click", ".deactivation", function(e){
    e.preventDefault();
    let id = $('#deID').val();
    let name = "deactivate";
    let reason = $('#reason').val();
    getDeactivate(id, name, reason);
  });


//delete
  $(document).on("click", ".delete", function(e){
    e.preventDefault();
    if (confirm('Do you want to delete this client?')){
      let id = $(this).data('id');
      let name = "delete";
      getRow(id, name);
    }
  });

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: 'process/Clients.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
      if("delete" in response){
        location.reload();
      }
      else{
        $('#client').val(response.client_id)
        $('#fullname').val(response.fullname);
        $('#address').val(response.address);
        $('#contact').val(response.contact);
        $('#email').val(response.email);
        $('#id_type').val(response.identification_type);
        $('#id_number').val(response.identification_number);
        $('#bank1').val(response.bank1);
        $('#account_no1').val(response.bank_number1);
        $('#bank2').val(response.bank2);
        $('#account_no2').val(response.bank_number2);
        $('#bank3').val(response.bank3);
        $('#account_no3').val(response.bank_number3);
      }
    }
  });
}

function getDeactivate(id, name, reason){
  $.ajax({
    type: 'POST',
    url: 'process/Clients.php',
    data: {id:id, name:name, reason: reason},
    dataType: 'json',
    success: function(response){
       // if("deactivate" in response){
        location.reload();
      // }
    }
  });
}
</script>

</body>
</html>
