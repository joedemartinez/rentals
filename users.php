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
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
                  <th>Address</th>
                  <th>Contact</th>
                </thead>
                <tbody>
                  <?php
                    $sql =  "SELECT * FROM users_table WHERE status = 0 ORDER BY user_id DESC";
                    $query = $conn->query($sql);
                   //id auto increament in tables initiation
                    $i = 1;
                    while($row = $query->fetch_assoc()){

                      echo "
                        <tr>
                          <td>". $i."</td>
                          <td style='text-transform:uppercase'>".$row['username']."</td>
                          <td><img width='50' height='40' src='assets/images/".$row['photo']."'></td>
                          <td>".$row['fullname']."</td>
                          <td>".$row['dob']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['phoneno']."</td>
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

</body>
</html>
