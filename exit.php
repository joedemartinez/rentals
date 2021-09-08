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
        Exits
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Exits</li>
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
              <button class="btn btn-primary btn-sm btn-flat" onClick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh</button>
              <a href="#addnew" data-toggle="modal" title="Add Exit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Exit</a>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                  <th>#</th>
                  <th>Client ID</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Reason</th>
                  <?php if ($password['user_type'] == 'admin'): ?>
                  <th>CreatedOn</th>
                  <th>CreatedBy</th>
                  <th>Action</th>
                  <?php endif; ?>

                  <?php if ($password['user_type'] == 'user'): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </thead>
                <tbody>
                  <?php
                    $sql =  "SELECT * FROM exits_table ORDER BY CreatedOn DESC";
                    $query = $conn->query($sql);
                   //id auto increament in tables initiation
                    $i = 1;
                    while($row = $query->fetch_assoc()){
                      //getting emp name
                          $emp_id = $row['emp_id'];
                          $result = $conn->query("SELECT emp_firstname, emp_middlename, emp_surname FROM emp_table WHERE emp_id = '$emp_id'");
                          $row1 = $result->fetch_row();
                    ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td style='text-transform:uppercase'><?php echo $row['emp_id']; ?></td>
                          <td><?php echo $row1[0].' '.$row1[1].' '.$row1[2]; ?></td>
                          <td><?php echo $row['exit_date']; ?></td>
                          <td><?php echo $row['reason']; ?></td>
                
                    <?php    if ($password['user_type'] == 'admin'): ?>
                          
                          <td><?php echo $row['CreatedOn']; ?></td>
                          <td> <?php echo $row['CreatedBy']; ?></td>
                          <td>
                            <button title='Delete Unit' class='btn btn-danger btn-sm btn-flat delete' data-id="<?php echo $row['emp_id'] ?>"><i class='fa fa-trash'></i> Delete</button>
                          </td>
                    <?php    endif; ?>

                    <?php    if ($password['user_type'] == 'user'): ?>
                          <td>
                            <button title='Delete Unit' class='btn btn-danger btn-sm btn-flat delete' data-id="<?php echo $row['emp_id'] ?>"><i class='fa fa-trash'></i> Delete</button>
                          </td>
                    <?php    endif; ?>
                        </tr>
                    <?php 
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
  <?php include 'includes/exits_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
//other reason
 $("#reason").change(function( event ) {
  if( $('#reason').val() == "Other" ) {
    document.getElementById('other').style.display='block';
    event.preventDefault();
  }else{
    document.getElementById('other').style.display='none';
    event.preventDefault();

  }
});


  $(document).on("click", ".delete", function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'process/exit_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#employee_id').val(response.emp_id);
      $('#exitdate').val(response.exit_date);
      $('#exitreason').val(response.reason);
    }
  });
}
</script>
</body>
</html>
