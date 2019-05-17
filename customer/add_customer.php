

<?php
	require_once('../db.php');
	require_once('../functions/dbandler.php');
    require_once('process-add-new-customer.php');	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	 <link rel="stylesheet" type="text/css" href="../style.css">

	  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- REGISTRATION FORM FOR CUSTOMER ..ONLY TO BE USED BY VENDOR IF THEY WANT TO ADD NEW CUSTOMERS-->
<div id="addNewCustBackground">
    

	  <div class="container">
	       <div class="row">
	             <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 bg bg-danger theCustReg">

	          <!-- DISPLAYING THE RESULT AFTER REGISTRATION-->

	         <?php

	         if (isset($_GET['status']) && $_GET['status'] == 'successReg') {
	         	
	         	echo "<div class='alert alert-success'> REGISTRATION SUCCESSFUL </div>";

	         }elseif (isset($errorDetails)) {
	         	
	         	echo "<div class='alert alert-danger'>$errorDetails</div>";
	         }
	         
	         ?>    
	             	  <h2>CUSTOMER REGISTRATION</h2>

	       <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form-group">
	             	  	
	             	  	<label>First Name:</label>
	             	  	<input type="text" name="customerFirstName" placeholder="Enter Customer First Name" class="form-control">

	             	  	<label>Last Name:</label>
	             	  	<input type="text" name="customerLastName" placeholder="Enter Customer Surname" class="form-control">


	             	  	<label>Male:</label>
	             	  	<input type="radio" name="gender" value="male">

	             	  	<label>Female:</label>
	             	  	<input type="radio" name="gender" value="female"> <br>

	             	  	<label>Email:</label>
	             	  	<input type="text" name="customerEmail" placeholder="Enter Customer Email" class="form-control">

	             	  	<label>Phone Number:</label>
	             	  	<input type="text" name="customerPhoneNo" placeholder="Enter Customer Mobile Number" class="form-control">
 
                       <label>Date Of Birth:</label>
                       <input type="date" name="customerDOB" class="form-control">

	             	  	<label>Address:</label>
	             	  	<textarea class="form-control" name="customerAddress"></textarea>

                       <button type="submit" class="btn" name="customerReg">Register</button>

                      <div class="goBackToIndex">
                       <a href="../vendor_index.php">Back</a>

                       </div>
	             	  </form>

	             </div>
	       	

	       </div>
	  	

	  </div>

</div>







 <!--LINKING BOOTSTRAP JQUERY AND JAVASCRIPT -->
     <script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>
		 <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		 
		 <!--LINKING MY JQUERY AND JAVASCRIPT -->
		 <script type="text/javascript" src="../jsfile/jquery.js"></script>
		 <script type="text/javascript" src="../jsfile/script.js"></script>


</body>
</html>
