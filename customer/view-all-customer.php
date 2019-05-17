
<?php
     require_once("../db.php");
     require_once("../functions/dbandler.php");
     require_once("../login-process.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>



<div id="viewCustomers">
    <div class="container">
          <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg bg-danger" style="margin-top:100px;">

               <h2>All Customers</h2>

                 <?php

                   //SELECT THE SUBMITTED CUSTOMERS DETAILS BY THE LOGGED IN VENDOR
                 $id = loggedIn();

                   $vendCustomers = "SELECT * FROM customer_registration WHERE cust_vend_id = $id";

                   $queryVendCust = mysqli_query($db_connect,$vendCustomers);

                   if (!$queryVendCust) {
                   	
                   	die("could not query queryVendCust" .mysqli_error($db_connect));
                   }



                     $table = "<table class='table table-bordered table-striped'>";
                     $table .="<tr>";
                     $table .= "<th>First Name</th>";
                     $table .= "<th>Last Name</th>";
                     $table .= "<th>Email</th>";
                     $table .= "<th>Phone Number</th>";
                     $table .= "<th>Address</th>";
                     $table .= "<th>DOB</th>";
                     $table .= "<th>Gender</th>";
                     $table .= "<th>Regitered Date</th>";
                     $table .= "<th>Delete</th>";
                     $table .= "<th>Edit</th>";
                     $table .= "<th>Add Transaction</th>";
                     $table .= "</tr>";

                     while ($fetchCust = mysqli_fetch_assoc($queryVendCust)) {
                     	

                     	$table .= "<tr>";
                     	$table .= "<td>{$fetchCust['cust_first_name']}</td>";
                     	$table .= "<td>{$fetchCust['cust_last_name']}</td>";
                     	$table .= "<td>{$fetchCust['cust_email']}</td>";
                     	$table .= "<td>{$fetchCust['cust_phone']}</td>";
                     	$table .= "<td>{$fetchCust['cust_address']}</td>";
                     	$table .= "<td>{$fetchCust['cust_dob']}</td>";
                     	$table .= "<td>{$fetchCust['cust_gender']}</td>";
                     	$table .= "<td>{$fetchCust['cust_reg_date']}</td>";

                     	$table .= "<td><button class='delCust'>Delete</button></td>";
                     	$table .= "<td><button class='editCust'>Edit</button></td>";
 
                      $table .= "<td><button> <a href='add-customer-trans.php'>+</a> </button></td>";
                        $table .= "</tr>";

                     }

                     $table .= "</table>";
                     echo "$table";


                 ?>


                 <a href="../vendor_index.php"><button class="btn btn-primary">Back</button></a>
               	
               </div>
          	
          </div>
    	
    </div>
	

</div>



<script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
