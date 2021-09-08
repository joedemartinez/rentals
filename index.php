<?php
  session_start();
  if(isset($_SESSION['user'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  
  	<div class="login-box-body" style="background: rgba(0, 0, 0, 0.3);">
      <div class="login-logo"><img src="assets/images/icon.png" style="width: 260px; height: 200px;"></div>
      <center><h2 style="color: white; margin-bottom: 30px"><b>Car Rental - IMS</b></h2></center>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autosave="">
            <span title="Show Password" toggle="#password" class="fa fa-fw fa-eye toggle-password" style="float: right;margin-right: 30px;margin-bottom: 0px;margin-top: -23px; position: relative; z-index: 2; cursor:pointer"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4 pull-right">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>

  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>