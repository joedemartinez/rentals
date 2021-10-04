<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? 'assets/images/'.$user['photo'] : 'assets/images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['fullname']?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a></li>
        <li class="header">MANAGE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="clients.php"><i class="fa fa-users"></i> Clients list</a></li>
            <li><a href="addEditClients.php"><i class="fa fa-users"></i> Add/Edit </a></li>
            <li><a href="deactivatedclients.php"><i class="fa fa-toggle-off"></i>Deactivated Clients</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Rentals</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="rentals.php"><i class="fa fa-users"></i> Rentals list</a></li>
            <li><a href="addEditRentals.php"><i class="fa fa-users"></i> Add/Edit </a></li>
          </ul>
        </li>
        <li class="header">SETUP</li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>Vehicles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="vehicles.php"><i class="fa fa-users"></i> Vehicles list</a></li>
            <li><a href="addEditVehicles.php"><i class="fa fa-users"></i> Add/Edit </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="users.php"><i class="fa fa-users"></i> Users list</a></li>
            <li><a href="addEditUsers.php"><i class="fa fa-users"></i> Add/Edit </a></li>
            <li><a href="deactivatedusers.php"><i class="fa fa-toggle-off"></i>Deactivated Users</a></li>
          </ul>
        </li>
        <!-- <li class="header">REPORTS</li>
        <li><a href="#"><i class="fa fa-files-o"></i> <span>Reports</span></a></li> -->
        <li class="header">SIGN OUT</li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> <span>Sign out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>