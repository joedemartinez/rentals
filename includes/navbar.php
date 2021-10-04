<?php
//check if user is active on page else logout
    include_once('Check_user.php');
?>
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Purple-Gold</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo 'assets/images/image3.png'; ?>" class="user-image" alt="Logo" style="width:100px; height:50px"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span style="padding: 15px"><?php date_default_timezone_set("GMT"); echo date('D, M-j-Y h:i:s a');?></span>

      </a>
      

      <div class="navbar-custom-menu" title="Profile">
        <ul class="nav navbar-nav">          
          <li class="dropdown user user-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">Welcome, 
              <img src="<?php echo 'assets/images/profile.jpg' ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $user['fullname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo 'assets/images/profile.jpg'; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user['fullname']; ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" title="Profile" id="admin_profile">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>