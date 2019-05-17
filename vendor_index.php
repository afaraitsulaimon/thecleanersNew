<!-- vendors landing page -->
<?php
  
  require_once("db.php");
  require_once("functions/dbandler.php");
require_once("login-process.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>


   <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


</head>
<body>



 <div class="container-fluid">
     <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
<?php
   require_once('template/vendor-header.php');
?>

          </div>
       
     </div>   
 </div>





<!--THE VENDOR ENVINRONMENT -->


<div class="container-fluid">

       <div class="row">

<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 bg bg-danger">
             
                 <?php
         require_once('template/sidebar-login.php');
      ?>



</div>
  


      <a href="#"> <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 noOfCustomers">
              <p>
                    Numbers Of Customers
              </p>

        </div>
         </a>


       <a href="#">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 noOfPendingTrans">
         <p>
           Pending Transactions
         </p>

        </div>
        </a>
         

         <a href="customer/view-all-customer.php">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 viewAllCust">
         <p>
           View All Customers
         </p>

        </div>
        </a>






      <a href="customer/add_customer.php"> <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 addCust1">
              <p>
                    Add New Customer
              </p>

        </div>
         </a>


       <a href="view-all-transact.php">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 viewallTrans">
         <p>
           View All Transaction
         </p>

        </div>
        </a>
         

         <a href="customer/add-inventory.php">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 vendorAddInvent">
         <p>
              Add Inventory
         </p>

        </div>
        </a>


        <a href="customer/add-inventory.php">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 vendorViewInvent">
         <p>
              View Inventory
         </p>

        </div>
        </a>

         <a href="logout.php">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 logOut">
         <p>
           Logout
         </p>

        </div>
        </a>




       
 </div>
 </div>
     

          



  


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>