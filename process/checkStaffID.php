<?php
	include '../includes/session.php';

	if(isset($_POST['emp_id'])){
		$emp_id = $_POST['emp_id'];
		$sql = "SELECT * FROM emp_table WHERE emp_id='$emp_id'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
            echo '<div class="text-red">
          <p>Staff ID Already Exits!!!</p>
        </div>';
         }else  {  
         echo '<div class="text-green">
          <p>Staff ID Is Available For Use!! Please Proceed.!</p>
        </div>';  
        }
	}

?>