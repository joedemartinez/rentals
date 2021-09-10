<?php include 'includes/session.php'; ?>
<?php 

?>
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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM clients_table";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <ul class="small-box-footer">
              <li>Active Clients : 
                <?php
                $sql = "SELECT * FROM clients_table WHERE status = 0";
                $query = $conn->query($sql);

                echo $query->num_rows;
              ?>
              </li>
              <li>Deactived Clients: <?php
                $sql = "SELECT * FROM clients_table WHERE status = 1";
                $query = $conn->query($sql);

                echo $query->num_rows;
              ?></li>
            </ul>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM vehicles";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Vehicles</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <ul class="small-box-footer">
              <li>Rented Out Vehicles : <?php
                $sql = "SELECT * FROM vehicles WHERE status = 1";
                $query = $conn->query($sql);

                echo $query->num_rows;
              ?></li>
              <li>Vehicles at shop: <?php
                $sql = "SELECT * FROM vehicles WHERE status = 0";
                $query = $conn->query($sql);

                echo $query->num_rows;
              ?></li>
            </ul>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM users_table";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <ul class="small-box-footer">
              <li>Active Users : 
                <?php
                $sql = "SELECT * FROM users_table WHERE status = 0";
                $query = $conn->query($sql);

                echo $query->num_rows;
              ?></li>
              <li>Deactived Users: 
              <?php
                $sql = "SELECT * FROM users_table WHERE status = 1";
                $query = $conn->query($sql);

                echo $query->num_rows;
              ?></li>
            </ul>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <!-- <?php
                $sql = "SELECT * FROM emp_table WHERE exit_id = 0 AND status = 0";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?> -->
              <h3>8</h3>
              <p>Locations</p>
            </div>
            <div class="icon">
              <i class="ion ion-map"></i>
            </div>
            <ul class="small-box-footer">
              <li>.</li>
              <li>.</li>
            </ul>
          </div>
        </div>


      </div>
     

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>
