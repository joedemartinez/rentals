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
        Deactivated Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Deactivated Users</li>
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
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>#</th>
                  <th>Username</th>
                  <th>Photo</th>
                  <th>Fullname</th>
                  <th>DoB</th>
                  <th>Contact</th>
                  <th>Reason</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $sql =  "SELECT * FROM users_table WHERE status = 1 ORDER BY user_id DESC";
                    $query = $conn->query($sql);
                   //id auto increament in tables initiation
                    $i = 1;
                    while($row = $query->fetch_assoc()){

                      echo "
                        <tr>
                          <td>". $i."</td>
                          <td style='text-transform:uppercase'>".$row['username']."</td>
                          <td><img width='40' height='40' src='assets/images/".$row['photo']."'></td>
                          <td>".$row['fullname']."</td>
                          <td>".$row['dob']."</td>
                          <td>".$row['phoneno']."</td>
                          <td>".$row['deactivation_reason']."</td>
                          <td><button class='btn btn-warning btn-sm btn-flat activate' data-id='".$row['user_id']."'><i class='fa fa-toggle-on'></i> Activate</button> 
                            <button title='Delete' class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['user_id']."'><i class='fa fa-trash'></i> Delete</button>
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

<script>
  $(document).on("click", ".activate", function(e){
    e.preventDefault();
    if (confirm('Do you want to activate this user?')){
      let id = $(this).data('id');
      let name = "activate";
      getRow(id, name);
    }
  });

  $(document).on("click", ".delete", function(e){
    e.preventDefault();
    if (confirm('Do you want to delete this user?')){
      let id = $(this).data('id');
      let name = "delete";
      getRow(id, name);
    }
  });

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: 'process/Users.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
      
        location.reload();
    }
  });
}
</script>

</body>
</html>
