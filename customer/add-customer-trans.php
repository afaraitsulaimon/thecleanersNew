
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
   <div id="theAddCustTransactionPage">
   	         <div class="container">
   	               <div class="row">
   	                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2" >


                        <?php
                          
                        ?>

   	                     <h1>Add Customer Transaction</h1>
                           <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class='form-group'>
                              
                       <label>Customer Name:</label>
                       <input type="text" name="" class="form-control">

                       <label>Customer Address:</label>
                       <textarea class="form-control"></textarea>

                       <label>Phone:</label>
                       <input type="text" name="" class="form-control">
                        
                        <!-- WHERE THE NEW TRANSACTION IS SHOWN AFTER THE CLICK OF THE + TO ADD NEW TRANSACTION-->

                        <div id="theNewTransact" style="display:none;">
                           <label>Product Type:</label>
                           <select class="form-control"><option></option></select>

                           <label>Quantity:</label>
                           <input type="text" name="" class="form-control">

                           <label>Price:</label>
                           <input type="text" name="" class="form-control">

                           <label>Total</label>
                           <input type="text" name="" class="form-control">

                           <button>X</button>


                        </div>
             <!--WHERE TO DIPLAY THE TRANSACTION FORM AFTER THE CLIKC OF + -->
                    <div id="toDisplayTransactForm"><button>shows</button></div>

                       
                    <abbr title="Add Transaction"><button class="btn transactButton" id="addForm" >+</button></abbr>  <br>

                    <button>Add Transaction</button> 
                        <button><a href="view-all-customer.php">Return</a></button>



                           </form>

   	                    	
   	                    </div>
   	               	
   	               </div>
   	         	
   	         </div>
   	     	

   	     </div>



   	     <script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>

   	     <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

         <!--MY OWN JAVASCRIPT -->

   <script type="text/javascript" src="../jsfile/jquery.js"></script>
    <script type="text/javascript" src="../jsfile/script.js"></script>


   </div>
</body>
</html>